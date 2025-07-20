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
        if (!file_exists($webpPath)) {
            exec("cwebp -q 80 {$source} -o {$webpPath}");
        }

        return file_exists($webpPath)
            ? preg_replace('/\.(jpe?g|png)$/i', '.webp', $arFileTmp['src'])
            : $arFileTmp['src']; // fallback на оригинал
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
