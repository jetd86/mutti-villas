<?php
header("Content-Type: text/html; charset=utf-8");
//header("Content-type:text/html; charset=windows-1251");

use \Bitrix\Main\Loader;
use \Bitrix\Main\Text\Converter;
use \Bitrix\Main\Application;

##################################
define('BUSTEST_VERSION', '1.0.0');
##################################

define("NO_AGENT_STATISTIC", true);
define("NO_KEEP_STATISTIC", true);

//if(function_exists('mb_internal_encoding'))
//	mb_internal_encoding('ISO-8859-1');


require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$context = Application::getInstance()->getContext();
$request = $context->getRequest();
$server  = $context->getServer();

$connection = Application::getConnection();
$helper     = $connection->getSqlHelper();


#**********************************************************
#                     VARS
#**********************************************************

$bTest = $request['test'] ? true : false;

$title = 'БУСТЕСТ ' . BUSTEST_VERSION;

$host   = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : 'localhost';
$port   = $_SERVER['SERVER_PORT'] ? $_SERVER['SERVER_PORT'] : 80;
$socket = function_exists('fsockopen');

//SysInfo
$meminfo = getSysInfo('/proc/meminfo');

//exec()
$hostname = getExec('hostname'); //hostname | hostname -i | hostname -d | hostname -s
$whoami   = getExec('whoami');
$uname    = getExec('uname -a');
$free     = getExec('free -m');


#**********************************************************
#                     FUNCTIONS
#**********************************************************
function xmktime()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}

function pingDomain($domain)
{
	$starttime = microtime(true);
	$file      = fsockopen($domain, 80, $errno, $errstr, 10);
	$stoptime  = microtime(true);
	$status    = 0;
	if(!$file)
		$status = -1;
	else {
		fclose($file);
		$status = ($stoptime - $starttime) * 1000;
		$status = number_format($status, 3, ',', ',');
	}

	return round($status, 1) . 'мс';
}

function getHttpResponse($res, $strRequest)
{
	fputs($res, $strRequest);

	$bChunked = false;
	while(($line = fgets($res, 4096)) && $line != "\r\n") {
		if(@preg_match("/Transfer-Encoding: +chunked/i", $line))
			$bChunked = true;
		elseif(@preg_match("/Content-Length: +([0-9]+)/i", $line, $regs))
			$length = $regs[1];
	}

	$strRes = "";
	if($bChunked) {
		$maxReadSize = 4096;

		$length = 0;
		$line   = FGets($res, $maxReadSize);
		$line   = StrToLower($line);

		$strChunkSize = "";
		$i            = 0;
		while($i < StrLen($line) && in_array($line[ $i ], array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"))) {
			$strChunkSize .= $line[ $i ];
			$i++;
		}

		$chunkSize = hexdec($strChunkSize);

		while($chunkSize > 0) {
			$processedSize = 0;
			$readSize      = (($chunkSize > $maxReadSize) ? $maxReadSize : $chunkSize);

			while($readSize > 0 && $line = fread($res, $readSize)) {
				$strRes        .= $line;
				$processedSize += StrLen($line);
				$newSize       = $chunkSize - $processedSize;
				$readSize      = (($newSize > $maxReadSize) ? $maxReadSize : $newSize);
			}
			$length += $chunkSize;

			$line = FGets($res, $maxReadSize);

			$line = FGets($res, $maxReadSize);
			$line = StrToLower($line);

			$strChunkSize = "";
			$i            = 0;
			while($i < StrLen($line) && in_array($line[ $i ], array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "a", "b", "c", "d", "e", "f"))) {
				$strChunkSize .= $line[ $i ];
				$i++;
			}
			$chunkSize = hexdec($strChunkSize);
		}
	}
	elseif($length)
		$strRes = fread($res, $length);
	else
		while($line = fread($res, 4096))
			$strRes .= $line;

	return $strRes;
}

function getSysInfo($command)
{
	$data   = explode("\n", file_get_contents($command));
	$result = array();
	foreach($data as $line) {
		list($key, $val) = explode(":", $line);
		if($val <> '') {
			$result[ trim($key) ] = trim($val);
		}
	}
	return $result;
}

function exec_enabled()
{
	$disabled = explode(', ', ini_get('disable_functions'));
	return !in_array('exec', $disabled);
}

function getExec($cmd)
{
	$result = null;
	if(exec_enabled()) {
		exec($cmd, $result);
		if(is_array($result) && count($result) == 1) {
			$result = $result[0];
		}
	}
	else
		$result = GM('NO');

	return $result;
}

function getRemoteFile()
{
	$speed   = 0;
	$file    = 'Contents-amd64.gz';
	$bx_host = 'mirror.yandex.ru';
	$bx_url  = '/debian/dists/Debian9.2/main/' . $file;
	$t       = xmktime();
	$res     = fsockopen($bx_host, 80, $errno, $errstr, 3);
	if($res) {
		$str = file_get_contents('http://' . $bx_host . $bx_url);
		if($str) {
			file_put_contents($file, $str);
		}
	}

	$time = round(xmktime() - $t, 2);
	if(!empty($time)) {
		if(@file_exists($file)) {
			$speed = filesize($file) / $time;
			@unlink($file);
		}
	}

	return CFile::FormatSize($speed) . '/сек';
}

function getPhpDisableFunctions($default = false)
{
	$result = ($default === false ? ini_get("disable_functions") : 'exec,system,shell_exec,passthru,popen,pclose,dl,apache_note,apache_setenv,define_syslog_variables,pcntl_exec,syslog,posix_kill,posix_mkfifo,posix_setpgid,posix_setsid,posix_setuid,posix_setgid,apache_child_terminate,posix_getpwuid');

	return str_replace(',', ', ', $result);
}

function GV($value, $bool)
{
	$result = null;
	if($bool) {
		$result = '<span class="badge badge-success">' . $value . '</span>';
	}
	else {
		$result = '<span class="badge badge-danger">' . $value . '</span>';
	}

	return $result;
}

function GM($name)
{
	return GetMessage($name);
}


#**********************************************************
#                     $MESS
#**********************************************************
$MESS = [
	 'YES'        => '<i class="icon-check text-success"></i>',
	 'NO'         => '<i class="icon-close text-danger"></i>',
	 //'ERROR'      => '<span class="text-danger">Ошибка</span>',
	 'NOT_TESTED' => '<span class="text-secondary">не тестировалось</span>',
	 'WRONG_ANS'  => '<span class="text-danger">Неверный ответ</span>',
	 'NO_CONNECT' => '<span class="text-danger">Нет подключения</span>',
	 'SERVER_ANS' => 'Ответ сервера',
	 'TESTING'    => 'тестируем...',
	 'LIMIT'      => 'лимит:',
];



#**********************************************************
#                     TEST
#**********************************************************
if(@$_GET['auth_test']) {
	$remote_user = $_SERVER["REMOTE_USER"] ? $_SERVER["REMOTE_USER"] : $_SERVER["REDIRECT_REMOTE_USER"];

	$strTmp = base64_decode(substr($remote_user, 6));
	if($strTmp)
		list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', $strTmp);

	if($_SERVER['PHP_AUTH_USER'] == 'test_user' && $_SERVER['PHP_AUTH_PW'] == 'test_password')
		die('SUCCESS');
	else {
		header('HTTP/1.x 401 Authorization required');
		header('WWW-Authenticate: Basic realm="Restricted area"');
		die('<h1>401 Authorization required</h1>');
	}
}
elseif(@$_GET['session_test']) {
	session_start();
	if($_SESSION['session_test'] == 'ok')
		die('SUCCESS');
	else
		die('Fault');
}
elseif(@$_GET['image']) {
	header("Content-type: image/gif");
	echo file_get_contents($image_file);
	@unlink($image_file);
	die();
}
elseif(@$_GET['phpinfo']) {
	phpinfo();
	die();
}
elseif(@$_GET['time_test']) {
	@set_time_limit(30);
	@ini_set('max_execution_time', 30);
	$t = time();
	while(time() - $t < 30) {
		if($_GET['max_cpu'])
			date('Y-m-d H:i:s');
		else
			sleep(1);
	}
	die("SUCCESS");
}
elseif(@$_GET['memory_test']) {
	$max = intval($_GET['max']);
	if(!$max)
		$max = 255;
	for($i = 1; $i <= $max; $i++)
		$a[] = str_repeat(chr($i), 1024 * 1024); // 1 Mb
	die("SUCCESS");
}
elseif(@$_GET['killme'] == 'Y') {
	unlink(__FILE__);
	echo file_exists(__FILE__) ? 'ERROR!' : 'OK';
	die();
}

session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=Windows-1251">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css?v=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css?v=1">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js?v=1"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js?v=1"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js?v=1"></script>
	<style>
		*{ margin: 0; padding: 0 }
		body{ background: #EEF1F5; color: #222; }
		/* table */
		table{ width: 100%; font-size: 0.8rem; /*box-shadow: 1px 2px 3px #ccc;*/ }
		table thead th{ font-weight: 700; }
		table thead th h3{ margin: 0 }
		table + table{ margin-top: 2rem }
		table tbody td:first-child{ width: 25%; font-weight: bold; }
		table tbody td:last-child{ width: 45%; overflow-x: auto; word-wrap: break-word; }
		table tbody [colspan]{ background: #e9ecef; font-weight: 700; font-size: 1rem; }
		/* .sidebar */
		.sidebar{
			position: fixed;
			top: 0;
			bottom: 0;
			left: 0;
			z-index: 1000;
			padding: 0;
			overflow-x: hidden;
			overflow-y: auto;
			border-right: 1px solid #eee;
			color: #7793a7;
			background-color: #1c2b36;
		}
		.sidebar a{ color: #869fb1; }
		.sidebar .brand{
			padding: 1rem 1rem 0;
			font-size: 20px;
			font-weight: 700;
			line-height: 50px;
			color: #c4d0d9;
			text-transform: uppercase;
		}
		.sidebar .brand span{ margin-left: 0.7rem }
		.sidebar .divider{ margin: 1em 0; background-color: #131e26; height: 2px; }
		.sidebar .info{ padding: 0 1rem; font-size: 0.8rem }
		.sidebar li:hover a{ color: #fff; background-color: #131e26; }
		/* .box */
		.box{ margin-bottom: 2rem; background: #fff; }
		.box .box-title{ padding: 0.8rem; color: #FFF; font-size: 18px; line-height: 18px; }
		.box .box-body{ padding: 1rem; }
		.box .box-body > table{ margin: 0 }
		.box-green{ border: 1px solid #5cd1db; border-top: 0; }
		.box-green .box-title{ background-color: #32c5d2; }
		.box-blue{ border: 1px solid #3598dc; border-top: 0; }
		.box-blue .box-title{ background-color: #3598dc; }
		.box-blue-steel{ border: 1px solid #8892BF; border-top: 0; }
		.box-blue-steel .box-title{ background-color: #8892BF; }
		.box-blue-hoki{ border: 1px solid #67809F; border-top: 0; }
		.box-blue-hoki .box-title{ background-color: #67809F; }
		.box-purple{ border: 1px solid #8E44AD; border-top: 0; }
		.box-purple .box-title{ background-color: #8E44AD; }
		.sidebar [href="#memory"] i{ color: #5cd1db }
		.sidebar [href="#php"] i{ color: #8892BF }
		.sidebar [href="#mysql"] i{ color: #67809F }
		.sidebar [href="#hosts"] i{ color: #8E44AD }
		.sidebar [href="#cpu"] i{ color: #3598dc }
		#memory .box-body > pre{ margin: 0 }
	</style>
</head>
<body>
<div id="wrapper" class="container-fluid">

	<div class="row">
		<nav class="col-2 sidebar">
			<div class="brand">
				<i class="icon-speedometer"></i><span><?=$title?></span>
			</div>
			<div class="divider"></div>
			<ul class="nav flex-column">
				<li class="nav-item">
					<a class="nav-link active" href="#memory"><i class="icon-layers"></i> Память</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#php"><i class="icon-puzzle"></i> PHP</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#mysql"><i class="icon-rocket"></i> MySQL</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#hosts"><i class="icon-organization"></i> Hosts</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="#cpu"><i class="icon-energy"></i> Процессор</a>
				</li>
			</ul>
			<div class="divider"></div>
			<p class="text-center">
				<a class="btn btn-sm btn-outline-light" href="?test=Y">Запуск тестов</a>
			</p>
			<div class="divider"></div>
			<div class="info">
				<p>
					Некоторые тесты не сработают без следующих функций:<br> exec <?=exec_enabled() ? GM('YES') : GM('NO')?>
					<br> fsockopen <?=$socket ? GM('YES') : GM('NO')?>
					<br> allow_url_fopen <?=in_array(ini_get('allow_url_fopen'), array(1, 'ON')) ? GM('YES') : GM('NO')?><br>
				</p>
				<p>
					1M = 1МБ = 1 Мегабайт<br> ON = 1<br> OFF = 0<br>
				</p>
			</div>
		</nav>

		<main class="col-10 ml-auto" role="main">

			<h1 class="h5 py-3 text-center"><strong><?=$uname?></strong></h1>

			<?
			/********************************************************
			 * Memory
			 ********************************************************/
			?>
			<? if($free): ?>
				<div id="memory" class="box box-green">
					<div class="box-title">Память, MB</div>
					<div class="box-body">
						<pre><?=implode("\n", $free)?></pre>
					</div>
				</div>
			<? endif ?>

			<?
			/********************************************************
			 * PHP
			 ********************************************************/
			?>
			<div id="php" class="box box-blue-steel">
				<div class="box-title">PHP <?=phpversion()?></div>
				<div class="box-body">
					<table class="php table table-sm">
						<thead class="thead-light">
						<tr>
							<th>Параметр</th>
							<th>Значение</th>
							<th>Рекомендации</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Имя домена</td>
							<td><?=$_SERVER['SERVER_NAME']?></td>
							<td></td>
						</tr>
						<tr>
							<td>Имя сервера (hostname)</td>
							<td><?=$hostname?></td>
							<td></td>
						</tr>
						<tr>
							<td>IP-адрес</td>
							<td><?=$_SERVER['SERVER_ADDR']?></td>
							<td></td>
						</tr>
						<tr>
							<td>Дата</td>
							<td><?=date('d-m-Y H:i:s')?></td>
							<td></td>
						</tr>
						<tr>
							<td>Пользователь Unix</td>
							<td><?=$whoami;?></td>
							<td></td>
						</tr>
						<tr>
							<td>Пользователь php</td>
							<td><?=$_SERVER['USER'];?></td>
							<td>
								Пользователь, под которым запускаются php-скрипты.<br> Если пользователь PHP отличается от пользоваетеля в системе Linux, то возможны проблемы с редактированием файлов и доступами
							</td>
						</tr>
						<tr>
							<td>HOME</td>
							<td><?=$_SERVER['HOME']?></td>
							<td></td>
						</tr>
						<tr>
							<td>DOCUMENT_ROOT</td>
							<td><?=$_SERVER['DOCUMENT_ROOT']?></td>
							<td></td>
						</tr>
						<tr>
							<td>php.ini</td>
							<td>
								<?=PHP_CONFIG_FILE_PATH?><br>
								<?=php_ini_loaded_file()?><br>
								<?=PHP_EXTENSION_DIR?><br>
							</td>
							<td></td>
						</tr>

						<tr>
							<td colspan="3">
								<h4 class="text-center">Требования 1С-Битрикс</h4>
							</td>
						</tr>
						<tr>
							<td>Веб-сервер Apache</td>
							<td><?=$_SERVER['SERVER_SOFTWARE']?></td>
							<td>Apache 1.3+ | nginx | php-fpm</td>
						</tr>
						<tr>
							<td>Интерфейс php</td>
							<td><?=PHP_SAPI?></td>
							<td></td>
						</tr>
						<tr>
							<td>Версия php</td>
							<td><?=GV(PHP_VERSION, version_compare(PHP_VERSION, '5.6.0', '>='))?></td>
							<td>Минимум 5.6+, рекомендуется 7.0+</td>
						</tr>

						<tr>
							<td>error_reporting</td>
							<td><?=ini_get('error_reporting')?></td>
							<td>E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED</td>
						</tr>
						<tr>
							<td>safe_mode</td>
							<td><?=GV(ini_get('safe_mode'), ini_get('safe_mode') == 0)?></td>
							<td>OFF</td>
						</tr>
						<tr>
							<td>short_open_tag</td>
							<td><?=GV(ini_get('short_open_tag'), ini_get('short_open_tag') == 1)?></td>
							<td>ON</td>
						</tr>
						<tr>
							<td>memory_limit</td>
							<td><?=GV(ini_get('memory_limit'), ini_get('memory_limit') > 64 && ini_get('memory_limit') > ini_get('post_max_size'))?></td>
							<td>
								Не менее 64Мб для визиток, не менее 250-300Мб для интернет-магазинов.<br> Должно быть больше
								<code>post_max_size</code>.<br>
							</td>
						</tr>
						<tr>
							<td>max_execution_time</td>
							<td><?=GV(ini_get('max_execution_time'), ini_get('max_execution_time') >= 30)?></td>
							<td>30-300</td>
						</tr>
						<tr>
							<td>max_input_vars</td>
							<td><?=GV(ini_get("max_input_vars"), ini_get("max_input_vars") >= 10000);?></td>
							<td>10000+. Для отправки больших форм в настрофках интернет-магазина</td>
						</tr>
						<tr>
							<td>max_input_nesting_level</td>
							<td><?=GV(ini_get("max_input_nesting_level"), ini_get("max_input_nesting_level") >= 100000)?></td>
							<td>100000+. Для больших рекурсий, деревьев, меню.</td>
						</tr>
						<tr>
							<td>session.use_trans_sid</td>
							<td><?=GV(ini_get("session.use_trans_sid"), ini_get("session.use_trans_sid") == 0)?></td>
							<td>OFF</td>
						</tr>
						<tr>
							<td>display_errors</td>
							<td><?=GV(ini_get('display_errors'), in_array(ini_get('display_errors'), array(1, 'stderr')))?></td>
							<td>ON</td>
						</tr>
						<tr>
							<td>post_max_size</td>
							<td><?=GV(ini_get('post_max_size'), intval(ini_get('post_max_size')) >= 100)?></td>
							<td>100M+. Размер <code>POST</code> должен быть больше <code>upload_max_filesize</code></td>
						</tr>
						<tr>
							<td>upload_max_filesize</td>
							<td><?=GV(ini_get('upload_max_filesize'), intval(ini_get('upload_max_filesize')) >= 10)?></td>
							<td>10M+. Максимальный размер одного загружаемого файла</td>
						</tr>
						<tr>
							<td>max_file_uploads</td>
							<td><?=GV(ini_get('max_file_uploads'), ini_get('max_file_uploads') >= 10)?></td>
							<td>10+. Количество файлов разрешенных к загрузке за раз</td>
						</tr>
						<tr>
							<td>output_buffering</td>
							<td><?=GV(ini_get('output_buffering'), ini_get('output_buffering') >= 4096)?></td>
							<td>4096+</td>
						</tr>
						<tr>
							<td>default_socket_timeout</td>
							<td><?=GV(ini_get('default_socket_timeout'), ini_get('default_socket_timeout') >= 60)?></td>
							<td>60+</td>
						</tr>
						<tr>
							<td>allow_url_fopen</td>
							<td><?=GV(ini_get('allow_url_fopen'), ini_get('allow_url_fopen') == 1)?></td>
							<td>ON. Разрешает доступ к внешним файлам/доменам/платежным системам и т.д.</td>
						</tr>
						<tr>
							<td>mail.add_x_header</td>
							<td><?=GV(ini_get('mail.add_x_header'), ini_get('mail.add_x_header') == 0)?></td>
							<td>OFF. Удаляет заголовок X-PHP-Originating-Script, который будет содержать UID скрипта и имя файла в отправленных письмах</td>
						</tr>
						<tr>
							<td>realpath_cache_size</td>
							<td><?=GV(ini_get('realpath_cache_size'), ini_get('realpath_cache_size') >= 4096)?></td>
							<td>4096k+</td>
						</tr>
						<tr>
							<td>session.gc_probability</td>
							<td><?=GV(ini_get('session.gc_probability'), ini_get('session.gc_probability') == 1)?></td>
							<td>1</td>
						</tr>
						<tr>
							<td>session.gc_divisor</td>
							<td><?=GV(ini_get('session.gc_divisor'), ini_get('session.gc_divisor') >= 1000)?></td>
							<td>1000</td>
						</tr>
						<tr>
							<td>session.gc_maxlifetime</td>
							<td><?=GV(ini_get('session.gc_maxlifetime'), ini_get('session.gc_maxlifetime') >= 1440)?></td>
							<td>1440</td>
						</tr>
						<tr>
							<td>mbstring.func_overload</td>
							<td><?=GV(ini_get('mbstring.func_overload'), ini_get('mbstring.func_overload') == 2)?></td>
							<td>2</td>
						</tr>
						<tr>
							<td>mbstring.internal_encoding</td>
							<td><?=GV(ini_get('mbstring.internal_encoding'), ini_get('mbstring.internal_encoding') == 'UTF-8')?></td>
							<td>UTF-8</td>
						</tr>
						<tr>
							<td>expose_php</td>
							<td><?=GV(ini_get('expose_php'), ini_get('expose_php') == 0)?></td>
							<td>OFF - отключает передачу версии PHP в HTTP-заголовке типа "X-Powered-By: PHP/5.3.7"</td>
						</tr>
						<tr>
							<td>report_memleaks</td>
							<td><?=GV(ini_get('report_memleaks'), ini_get('report_memleaks') == 0)?></td>
							<td>OFF</td>
						</tr>
						<tr>
							<td>report_zend_debug</td>
							<td><?=GV(ini_get('report_zend_debug'), ini_get('report_zend_debug') == 0)?></td>
							<td>OFF</td>
						</tr>
						<tr>
							<td>variables_order</td>
							<td><?=GV(ini_get('variables_order'), in_array(ini_get('variables_order'), array('GPCS', 'EGPCS')))?></td>
							<td>GPCS</td>
						</tr>
						<tr>
							<td>date.timezone</td>
							<td><?=GV(ini_get('date.timezone'), ini_get('date.timezone') <> '')?></td>
							<td>Europe/Moscow</td>
						</tr>
						<tr>
							<td>session.save_path</td>
							<td><?=ini_get("session.save_path")?></td>
							<td></td>
						</tr>
						<tr>
							<td>sendmail_path</td>
							<td><?=ini_get("sendmail_path")?></td>
							<td></td>
						</tr>
						<tr>
							<td>log_errors</td>
							<td><?=ini_get("log_errors")?></td>
							<td>ON</td>
						</tr>
						<tr>
							<td>error_log</td>
							<td><?=ini_get("error_log")?></td>
							<td><?=($_SERVER['HOME'] ? $_SERVER['HOME'] . '/php_errors.log' : '/var/log/php/php_errors.log')?></td>
						</tr>
						<tr>
							<td>disable_functions</td>
							<td><?=getPhpDisableFunctions()?></td>
							<td>
								<p>Эта директива позволяет отключить некоторые функции php в целях безопасности</p>
								<p>
									Пример отключенных функций:<br>
									<?=getPhpDisableFunctions(1)?>
								</p>
							</td>
						</tr>

						<tr>
							<td colspan="3">
								<h4 class="text-center">Необходимые расширения</h4>
							</td>
						</tr>
						<tr>
							<td>Регулярные выражения Php/Perl</td>
							<td><?=function_exists("preg_match") ? GM('YES') : GM('NO')?></td>
							<td></td>
						</tr>
						<tr>
							<td>Zlib extension</td>
							<td><?=(extension_loaded('zlib') && function_exists("gzcompress")) ? GM('YES') : GM('NO')?></td>
							<td>Требуется для работы модуля компрессии и быстрой загрузки обновлений</td>
						</tr>
						<tr>
							<td>GD lib extension</td>
							<td><?=function_exists("imagecreate") ? GM('YES') : GM('NO')?></td>
							<td>Отображение графиков в статистике, работа с изображениями</td>
						</tr>
						<tr>
							<td>Free Type extension</td>
							<td><?=function_exists("imagettftext") ? GM('YES') : GM('NO')?></td>
							<td>Необходима для работы CAPTCHA</td>
						</tr>
						<tr>
							<td>Модули шифрования</td>
							<td><?=function_exists('mcrypt_encrypt') ? GM('YES') . ' ' . 'mcrypt' : (function_exists('openssl_encrypt') ? GM('YES') . ' ' . 'openssl_encrypt' : GM('NO'));?></td>
							<td>Требуется резервного копирования в облако</td>
						</tr>
						<tr>
							<td>Модуль Hash</td>
							<td><?=function_exists("hash") ? GM('YES') : GM('NO')?></td>
							<td>Требуется резервного копирования в облако</td>
						</tr>
						<tr>
							<td>XML</td>
							<td><?=function_exists("xml_parser_create") ? GM('YES') : GM('NO')?></td>
							<td></td>
						</tr>
						<tr>
							<td>JSON</td>
							<td><?=function_exists("json_encode") ? GM('YES') : GM('NO')?></td>
							<td></td>
						</tr>
						<tr>
							<td>Поддержка SSL</td>
							<td>
								<?
								$f   = fsockopen("ssl://www.bitrixsoft.com", 443, $errno, $errstr, 10);
								$val = $f ? 1 : 0;
								echo $val ? GM('YES') : GM('NO');
								@fclose($f);
								?>
							</td>
							<td>Необходима для работы интернет-магазина с подключением внешних платёжных систем</td>
						</tr>
						<tr>
							<td>Поддержка mbstring</td>
							<td>
								<?
								if(function_exists("mb_substr")) {
									$utf = false !== strpos(strtolower(ini_get('mbstring.internal_encoding')), 'utf') && ini_get('mbstring.func_overload') == 2;
									echo $utf ? GM('YES') : GM('NO');
								}
								?>
							</td>
							<td>Необходима для работы продукта в кодировке UTF-8</td>
						</tr>

						<tr>
							<td colspan="3">
								<h4 class="text-center">Необходимые тесты</h4>
							</td>
						</tr>
						<?
						// Accelerator
						$res = "";
						if($val = function_exists("eaccelerator_info")) {
							$res = "EAccelerator";
							$val = false;
						}
						elseif($val = function_exists("accelerator_reset")) {
							$res = 'Zend Accelerator <a href="http://dev.1c-bitrix.ru/community/blogs/howto/the-problem-of-performance-in-version-12.php" target=_blank>есть проблема</a>';
							$val = false;
						}
						elseif($val = function_exists("apc_fetch"))
							$res = "APC";
						elseif($val = function_exists("xcache_get"))
							$res = "XCache";
						elseif(($val = function_exists("opcache_reset")) && ini_get('opcache.enable'))
							$res = "OPcache";
						?>
						<tr>
							<td>Акселератор php</td>
							<td>
								<?=$res ? GM('YES') . ' ' . $res : 'Не найден'?>
							</td>
							<td>
								Рекомендуется наличие акселератора PHP (APC, XCache или любого другого кроме устаревшего EAccelerator), это позволяет снизить нагрузку на CPU в несколько раз и уменьшить время выполнения PHP кода. Желательно, чтобы памяти акселератора было достаточно для размещения всех часто используемых PHP страниц. Рекомендуется установить фильтры, например (для eA): eaccelerator.filter !*/help/* !*/admin/* !*/bitrix/*cache/* */bitrix/* */.*.php Если акселератор не обнаружен, требуется анализ phpinfo()
							</td>
						</tr>
						<tr>
							<td>Отправка почты</td>
							<td>
								<?
								if($bTest) {
									$t   = time();
									$val = mail("hosting_test@bitrix.ru", "Bitrix server test", "This is test message. Delete it.");
									$tt  = time() - $t;

									echo ($val ? GM('YES') : GM('NO')) . ($tt ? " (" . 'Время' . ": $tt " . 'сек.' . ")" : "");
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td>
								Отправка почты функцией mail()
							</td>
						</tr>
						<tr>
							<td>Работа с сокетами</td>
							<td>
								<?=function_exists('fsockopen') ? GM('YES') : GM('NO');?>
								<?
								/*$socket = function_exists('fsockopen');
								if($socket) {
									$fp = fsockopen(($port == 443 ? 'ssl://' : '') . $host, $port, $errno, $errstr, 30);
									if(!$fp) {
										echo "$errstr ($errno)<br />\n";
									}
									else {
										fclose($fp);
										echo 'Да';
									}
								}
								else {
									echo 'Нет';
								}*/
								?>
							</td>
							<td>
								<p>
									fsockopen() необходим для работы системы обновлений
								</p>
							</td>
						</tr>
						<tr>
							<td>Сохранение сессии</td>
							<td>
								<?
								if($bTest) {
									//echo PHP_SESSION_ACTIVE ? GM('YES'): GM('NO');
									echo session_status() === PHP_SESSION_ACTIVE ? GM('YES') : GM('NO');
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td>
								Необходимо для сохранения авторизации, корзины и др. сессионных данных пользователя.
							</td>
						</tr>
						<tr>
							<td>Система обновлений</td>
							<td>
								<?
								if($bTest) {
									if($socket)
										$res = fsockopen("www.bitrixsoft.com", "80", $errno, $errstr, 3);
									else
										$res = false;

									if($res) {
										$strRequest = "POST /bitrix/updates/sysserver.php HTTP/1.1\r\n";
										$strRequest .= "User-Agent: BitrixSMUpdater\r\n";
										$strRequest .= "Accept: */*\r\n";
										$strRequest .= "Host: www.bitrixsoft.com\r\n";
										$strRequest .= "Accept-Language: en\r\n";
										$strRequest .= "Content-type: application/x-www-form-urlencoded\r\n";
										$strRequest .= "Content-length: 7\r\n\r\n";
										$strRequest .= "lang=en";
										$strRequest .= "\r\n";

										$strRes = getHttpResponse($res, $strRequest);
										fclose($res);

										if(strtolower(strip_tags($strRes)) == "license key is invalid")
											$val = GM('YES');
										else
											$val = GM('WRONG_ANS') . " <a href='javascript:alert(\"" . addslashes($strRes) . "\")' title='" . GM('SERVER_ANS') . "'>&gt;&gt;</a>";
									}
									else
										$val = GM('NO_CONNECT');

									echo $val;
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td>
								Осуществляется попытка подключиться к серверу www.bitrixsoft.ru на порт 80
							</td>
						</tr>
						<tr>
							<td>HTTP авторизация</td>
							<td>
								<?
								if($bTest) {

									if($socket)
										$res = fsockopen(($port == 443 ? 'ssl://' : '') . $host, $port, $errno, $errstr, 3);
									else
										$res = false;

									if($res) {
										$url        = parse_url($_SERVER['REQUEST_URI']);
										$strRequest = "GET " . $url['path'] . "?auth_test=Y HTTP/1.1\r\n";
										$strRequest .= "Host: " . $host . "\r\n";
										$strRequest .= "Authorization: Basic dGVzdF91c2VyOnRlc3RfcGFzc3dvcmQ=\r\n";
										$strRequest .= "\r\n";

										$strRes = getHttpResponse($res, $strRequest);
										fclose($res);

										if(trim($strRes) == "SUCCESS") {
											$val = $ok = GM('YES');
											if($_SERVER['REMOTE_USER'])
												$val .= ' ($_SERVER["REMOTE_USER"])';
											elseif($_SERVER['REDIRECT_REMOTE_USER'])
												$val .= ' ($_SERVER["REDIRECT_REMOTE_USER"])';
										}
										else
											$val = GM('NO');
									}
									else
										$val = GM('NO_CONNECT');

									echo $val;
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td>
								Требуется для интеграции с 1С и MS Outlook.<br> Подключение к
								<code><?=($port == 443 ? 'ssl://' : '') . $host?>:<?=$port?></code><br> Ошибка возможна и когда сервер отдает 301 редирект.
							</td>
						</tr>
						<tr>
							<td>Тест на время</td>
							<td>
								<div id=time_test><?=GM('NOT_TESTED')?></div>
							</td>
							<td>
								Попытка выполнять скрипт в течение 30 секунд
							</td>
						</tr>
						<tr>
							<td>Скорость загрузки файла на сервер</td>
							<td>
								<?
								if($bTest) {
									$speed = getRemoteFile();
									echo $speed ? GM('YES') . ' ' . $speed : GM('NO');
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td>
								Размер файла 30MB скачивается с зеркала yandex.ru
							</td>
						</tr>
						<tr>
							<td>Пинг до yandex.ru</td>
							<td>
								<?
								if($bTest) {
									echo pingDomain('yandex.ru');
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td><100</td>
						</tr>
						<tr>
							<td>Пинг до google.com</td>
							<td>
								<?
								if($bTest) {
									echo pingDomain('www.google.com');
								}
								else {
									echo GM('NOT_TESTED');
								}
								?>
							</td>
							<td><100</td>
						</tr>

						</tbody>
					</table>
				</div>
			</div>

			<div id="mysql" class="box box-blue-hoki">
				<?
				/********************************************************
				 * MySQL
				 ********************************************************/

				$formatVars = ['Qcache_free_memory'];

				$globalVars = [];
				$sql        = $connection->query("SHOW GLOBAL VARIABLES");
				while($row = $sql->fetch()) {
					$globalVars[ $row['Variable_name'] ] = $row['Value'];
				}
				?>
				<div class="box-title">MySQL <?=$globalVars['version']?>, <?=$globalVars['version_compile_machine']?>, <?=$globalVars['version_compile_os']?></div>
				<div class="box-body">
					<table class="mysql table table-sm">
						<thead class="thead-light">
						<tr>
							<th>Параметр</th>
							<th>Значение</th>
							<th>Рекомендации</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td colspan="3">Система</td>
						</tr>
						<tr>
							<td>
								<?
								//$sql = $connection->query("SHOW TABLES FROM " . $connection->getDatabase());
								//echo $sql->getSelectedRowsCount();

								$mysqlTotal = [];
								$query      = 'SELECT  ENGINE,
						        ROUND(SUM(data_length) /1024/1024, 1) AS "Data_MB",
						        ROUND(SUM(index_length)/1024/1024, 1) AS "Index_MB",
						        ROUND(SUM(data_length + index_length)/1024/1024, 1) AS "Total_MB",
						        COUNT(*) "Num_tables"
							    FROM  INFORMATION_SCHEMA.TABLES
							    WHERE  table_schema NOT IN ("information_schema", "PERFORMANCE_SCHEMA", "SYS_SCHEMA", "ndbinfo")
							    GROUP BY  ENGINE;';
								$sql        = $connection->query($query);
								if($mysqlTotal = $sql->fetch()) {
									foreach($mysqlTotal as $key => $val) {
										echo $key . ' = ' . $val . '<br>';
									}
								}
								?>
							</td>
							<td></td>
							<td></td>
						</tr>

						<!--collation-->
						<?
						$recCollation = [
							 'character_set_server' => 'utf8',
							 'collation_server'     => 'utf8_unicode_ci',
							 'init_connect'         => 'SET NAMES utf8',
						];
						?>
						<tr>
							<td colspan="3">Collation</td>
						</tr>
						<? foreach($recCollation as $key => $val): ?>
							<tr>
								<td><?=str_replace('_', '-', $key)?></td>
								<td><?=$globalVars[ $key ]?></td>
								<td><?=$val?></td>
							</tr>
						<? endforeach; ?>

						<!--cache-->
						<?
						$recCache = [
							 'query_cache_type'  => 1,
							 'query_cache_limit' => '1M',
							 'table_open_cache'  => '4096, table_open_cache = innodb_open_files',
							 'thread_cache_size' => 32,
						];
						?>
						<tr>
							<td colspan="3">Cache</td>
						</tr>
						<? foreach($recCache as $key => $val): ?>
							<tr>
								<td><?=str_replace('_', '-', $key)?></td>
								<td>
									<? if(preg_match('/^([0-9]+(K|M|G|T))/', $val)): ?>
										<?=CFile::FormatSize($globalVars[ $key ])?>
									<? else: ?>
										<?=$globalVars[ $key ]?>
									<? endif ?>
								</td>
								<td><?=$val?></td>
							</tr>
						<? endforeach; ?>
						<?
						$cacheVars = [];
						$sql       = $connection->query("SHOW VARIABLES LIKE '%query_cache%'");
						while($row = $sql->fetch()) {
							$cacheVars[ $row['Variable_name'] ] = $row['Value'];
						}

						$sql  = $connection->query("SHOW STATUS LIKE 'qcache%'");
						$rows = $sql->fetchAll(Converter::getHtmlConverter());
						foreach($rows as $row) {
							$cacheVars[ $row['Variable_name'] ] = $row['Value'];
						}
						?>
						<tr>
							<td>query_cache_size</td>
							<td>
								<?=CFile::FormatSize($cacheVars['query_cache_size'])?>, Занято: <?=roundEx((($cacheVars['query_cache_size'] - $cacheVars['Qcache_free_memory']) / $cacheVars['query_cache_size']) * 100, 1)?>%
							</td>
							<td>50M, max 128M</td>
						</tr>
						<tr>
							<td>query_cache_hit_rate</td>
							<td><?=roundEx(($cacheVars['Qcache_hits'] / ($cacheVars['Qcache_hits'] + $cacheVars['Qcache_inserts'] + $cacheVars['Qcache_not_cached'])) * 100, 1)?>%</td>
							<td>Если значение менее 50% – можно увеличить размер кеша query_cache_size.</td>
						</tr>

						<!--InnoDB-->
						<tr>
							<td colspan="3">InnoDB</td>
						</tr>
						<?
						$query = "SELECT CONCAT(CEILING(RIBPS/POWER(1024,pw)),SUBSTR(' KMGT',pw+1,1)) Value FROM (SELECT RIBPS,FLOOR(LOG(RIBPS)/LOG(1024)) pw FROM (SELECT SUM(data_length+index_length)*1.1*growth RIBPS FROM information_schema.tables AAA, (SELECT 1 growth) BBB WHERE ENGINE='InnoDB') AA) A";
						$sql   = $connection->query($query);
						if($row = $sql->fetch()) {
							$mysqlTotal['Total_P'] = $row['Value'];
						}

						if($meminfo['MemTotal'])
							$mysqlTotal['Total_MT'] = CFile::FormatSize((str_replace('kB', '', $meminfo['MemTotal']) * 1024 * 50) / 100);

						$hint_innodb_buffer_pool_size = $mysqlTotal['Total_P'] . ' или ' . $mysqlTotal['Total_MB'] . 'M или ' . $mysqlTotal['Total_MT'];


						$recInnoDb = [
							 'innodb_defragment'               => 'ON',
							 'innodb_file_per_table'           => 'ON',
							 'default_storage_engine'          => 'InnoDB',
							 'innodb_open_files'               => 4096,
							 'key_buffer_size'                 => '32M',
							 'max_allowed_packet'              => '1M',
							 'sort_buffer_size'                => '32M',
							 'read_buffer_size'                => '256K',
							 'read_rnd_buffer_size'            => '1M',
							 'thread_stack'                    => '128K',
							 'max_heap_table_size'             => '128M',
							 'tmp_table_size'                  => '128M',
							 'innodb_buffer_pool_size'         => $hint_innodb_buffer_pool_size,
							 'innodb_buffer_pool_instances'    => 4,
							 'innodb_additional_mem_pool_size' => '16M-32M',
							 'innodb_log_file_size'            => '128M',
							 'innodb_log_buffer_size'          => '16M',
							 'innodb_flush_log_at_trx_commit'  => 2,
							 'innodb_read_io_threads'          => 8,
							 'innodb_write_io_threads'         => 8,
							 'innodb_stats_on_metadata'        => 'OFF',
						];
						?>
						<? foreach($recInnoDb as $key => $val): ?>
							<tr>
								<td><?=str_replace('_', '-', $key)?></td>
								<td>
									<? if(preg_match('/^([0-9]+(K|M|G|T))/', $val)): ?>
										<?=CFile::FormatSize($globalVars[ $key ])?>
									<? else: ?>
										<?=$globalVars[ $key ]?>
									<? endif ?>
								</td>
								<td><?=$val?></td>
							</tr>
						<? endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>

			<?
			/********************************************************
			 * hosts
			 ********************************************************/
			$hosts = getExec('cat /etc/hosts');
			if($hosts) {
				?>
				<div id="hosts" class="box box-purple">
					<div class="box-title">/etc/hosts</div>
					<div class="box-body">
						<table class="free table table-sm">
							<tbody>
							<tr>
								<td>
									<pre><? foreach($hosts as $key => $val): ?><?=$val . "\n"?><? endforeach; ?></pre>
								</td>
								<td>
									<strong>Пример корректного hostname/FQDN для IPv4</strong><br>
									<pre>127.0.0.1     localhost <br><?=$_SERVER['SERVER_ADDR']?> server.example.com server</pre>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?
			}


			/********************************************************
			 * cpuinfo
			 ********************************************************/
			$cpuinfo = getExec('cat /proc/cpuinfo');

			if($cpuinfo) {
				$arCpus = [];
				foreach($cpuinfo as $line) {
					static $proc;

					list($key, $val) = explode(":", $line);

					$key = trim($key);
					$val = trim($val);

					if($val <> '') {
						if($key == 'processor') {
							$proc = $val;
						}
						$arCpus[ $proc ][ $key ] = $val;
					}
				}
				?>
				<div id="cpu" class="box box-blue">
					<div class="box-title">Процессоры: <?=count($arCpus)?></div>
					<div class="box-body">
						<div id="accordion" role="tablist">
							<?
							foreach($arCpus as $key => $arCpu): ?>
								<div class="card">
									<div class="card-header" role="tab" id="heading<?=$key?>">
										<h5 class="mb-0">
											<a data-toggle="collapse" href="#collapse<?=$key?>" aria-expanded="true" aria-controls="collapse<?=$key?>"><?=$arCpu['model name']?></a>
										</h5>
									</div>
									<div id="collapse<?=$key?>" class="collapse" role="tabpanel" aria-labelledby="heading<?=$key?>" data-parent="#accordion">
										<div class="card-body">
											<table class="table table-sm">
												<tbody>
												<? foreach($arCpu as $k => $v): ?>
													<tr>
														<td><?=$k?></td>
														<td><?=$v?></td>
													</tr>
												<? endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<? endforeach; ?>
						</div>
					</div>
				</div>
				<?
			}
			?>
		</main>
	</div>
</div>

<? if($bTest) { ?>
	<script language=JavaScript>

		var last_mem = 8;
		var max_success = 0;
		var memory_errors = 5;
		var absolute_max = 999;

		var tmr = 0;
		var tmr1 = 0;
		var time_test = document.getElementById('time_test');
		var time_test_cpu = document.getElementById('time_test_cpu');

		function NewXML() {
			if (window.XMLHttpRequest) {
				try {
					xml = new XMLHttpRequest();
				} catch (e) {
				}
			} else if (window.ActiveXObject) {
				try {
					xml = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try {
						xml = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {
					}
				}
			}
			return xml;
		}

		function AjaxSend(xml, url, callback) {
			if (null != callback)
				xml.onreadystatechange = function () {
					if (xml.readyState == 4 || xml.readyState == "complete")
						callback(xml.responseText);
				}

			xml.open("GET", url, true);
			xml.send("");
		}

		function memory_test(max_mem) {
			xml = NewXML();
			callback = function (a) {
				if (a == 'SUCCESS') {
					max_success = last_mem;
					last_mem *= 2;
					if (last_mem > absolute_max)
						last_mem = parseInt((max_success + absolute_max) / 2);

					if (max_success == last_mem) {
						memory_errors = 0;
						last_mem += 1;
					}

					if (max_success < 256) {
						document.getElementById('memory_limit').innerHTML = max_success + '...';
						memory_test(last_mem - 1);
					}
					else
						document.getElementById('memory_limit').innerHTML = '&gt;256';
				}
				else if (memory_errors > 0) {
					absolute_max = last_mem;
					last_mem = parseInt((max_success + last_mem) / 2);
					memory_test(last_mem - 1);
					memory_errors--;
				}
				else {
					link = " <a href='?memory_test=Y&debug=Y&max=" + last_mem + "' target=_blank title='<?php echo GM('OPEN_RESULT')?>'>&gt;&gt;</a>";
					if (max_success == 0)
						res = '<font color=red>N/A</font>' + link;
					else
						res = max_success + link;

					document.getElementById('memory_limit').innerHTML = res;
				}
			}
			AjaxSend(xml, '?memory_test=Y&debug=Y&max=' + max_mem, callback);
		}

		function my_timer() {
			tmr++;
			tmr1++;
			if (tmr > 30) {
				res = '<?=GM('NO');?>';
				clearInterval(my_interval);
			}
			else {
				res = '<div class="progress">\n' +
					 '<div class="progress-bar" role="progressbar" aria-valuenow="' + tmr + '" aria-valuemin="0" aria-valuemax="30" style="width:' + ((tmr * 100) / 30) + '%">' + tmr + ' сек</div>\n' +
					 '</div>';
			}

			time_test.innerHTML = res;
		}

		function start_test() {

			var my_interval = setInterval(my_timer, 1000);

			// time test
			xml = NewXML();
			callback = function (a) {
				if (a == 'SUCCESS')
					res = '<?=GM('YES');?>';
				else
					res = '<?=GM('NO');?> (<?=GM('LIMIT');?> ' + tmr1 + ")  <a href='javascript:alert(\"" + escape(xml.responseText.substr(0, 100)) + "\")' title='<?=GM('SERVER_ANS');?>'>&gt;&gt;</a>";

				time_test.innerHTML = res;

				clearInterval(my_interval);
			}
			AjaxSend(xml, "?time_test=Y", callback);

			// time test with max cpu
			xml = NewXML();
			callback = function (a) {
				if (a == 'SUCCESS')
					res = '<font color=green><?php echo GM('YES');?></font>';
				else
					res = '<font color=red><?php echo GM('NO');?></font> ' + "<a href='javascript:alert(\"" + escape(a.substr(0, 100)) + "\")' title='<?php echo GM('SERVER_ANS');?>'>&gt;&gt;</a>";
				time_test_cpu.innerHTML = res;
			}
			AjaxSend(xml, "?time_test=Y&max_cpu=Y", callback);

			// session test
			xml = NewXML();
			callback = function (a) {
				if (a == 'SUCCESS')
					res = '<font color=green><?php echo GM('YES');?></font>';
				else
					res = '<font color=red><?php echo GM('NO');?></font>';

				document.getElementById('session').innerHTML = res;
			}
			AjaxSend(xml, '?session_test=Y', callback);

			// memory test
			memory_test(last_mem);
		}

		<?if($bTest):?>
		$(function () {

			var my_interval = setInterval(my_timer, 1000);

			// time test
			$.get("", {time_test: 'Y'}, function (response) {

				if (response === 'SUCCESS')
					res = '<?=GM('YES');?> (<?=GM('LIMIT');?> ' + tmr1 + ')';
				else
					res = '<?=GM('NO');?> (<?=GM('LIMIT');?> ' + tmr1 + ")  <a href='javascript:alert(\"" + escape(response.substr(0, 100)) + "\")' title='<?=GM('SERVER_ANS');?>'>&gt;&gt;</a>";

				console.log(response);

				time_test.innerHTML = res;
				clearInterval(my_interval);

			});

		});
		<?endif?>

		<?//=$bTest ? 'start_test();' : ''?>
	</script>
<? } ?>
</body>
</html>