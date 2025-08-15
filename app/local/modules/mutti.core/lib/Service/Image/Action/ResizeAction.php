<?php

namespace Mutti\Service\Image\Action;

use Mutti\Service\AbstractAction;

class ResizeAction extends AbstractAction
{
    private array $file;
    private array $size;

    public function execute()
    {
        $arFileTmp = \CFile::ResizeImageGet($this->file['ID'], $this->size, BX_RESIZE_IMAGE_EXACT, true);
        $source = $_SERVER['DOCUMENT_ROOT'] . $arFileTmp['src'];

        if (!$arFileTmp || !file_exists($source)) {
            return null;
        }

        $webpPath = preg_replace('/\.(jpe?g|png)$/i', '.webp', $source);
        $webpUrl = preg_replace('/\.(jpe?g|png)$/i', '.webp', $arFileTmp['src']);

        if (!file_exists($webpPath)) {
            if ($this->createWebpWithImagick($source, $webpPath)) {
                chmod($webpPath, 0644);
            }
        }

        if (file_exists($webpPath) && is_readable($webpPath) && filesize($webpPath) > 0) {
            return $webpUrl;
        }

        return $arFileTmp['src'];
    }

    private function createWebpWithImagick($source, $webpPath)
    {
        if (!extension_loaded('imagick')) {
            error_log('Imagick extension не установлен');
            return false;
        }

        if (!in_array('WEBP', \Imagick::queryFormats())) {
            error_log('Imagick не поддерживает WebP формат');
            return false;
        }

        try {
            $imagick = new \Imagick($source);

            $imagick->setImageCompressionQuality(40);

            $imagick->setImageFormat('webp');

            $result = $imagick->writeImage($webpPath);

            $imagick->clear();
            $imagick->destroy();

            return $result;

        } catch (\ImagickException $e) {
            error_log('Imagick error: ' . $e->getMessage());
            return false;
        }
    }


    public function setFile(array $file): static
    {
        $this->file = $file;
        return $this;
    }

    public function setSize(array $size): static
    {
        $this->size = $size;
        return $this;
    }
}
