<?php
use Bitrix\Main\Application;
$result = Application::getConnection()->query(
    "SELECT * FROM b_option WHERE MODULE_ID = 'mutti.core'"
);


$mutti_core = [];
while ($row = $result->fetch()) {
    $mutti_core[$row['NAME']] =
        [
           'VALUE' => $row['VALUE'],
        ];

}
