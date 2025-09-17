<?php

namespace App\Helper;

class ViteImage
{
    /**
     * Возвращает путь к изображению с параметрами для vite-imagetools.
     *
     * @param string $path Относительный путь от frontend, например '/images/bg.jpg'
     * @param array $params Параметры: ['w' => 768, 'format' => 'webp', 'as' => 'src']
     * @return string URL для вставки в <img src="..."> или background-image
     */
    public static function src(string $path, array $params = [], bool $local = true): string
    {
        $query = http_build_query($params);
        return ($local ? '/local/assets/assets/images/generated/' : null) . $path . ($query ? '?' . $query : '');
    }

}
