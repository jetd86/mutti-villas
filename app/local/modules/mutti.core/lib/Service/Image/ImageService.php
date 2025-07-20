<?php

namespace Mutti\Service\Image;

class ImageService
{
    public function getWebpImage(array $file): array
    {
        return Action\GetAction::getInstance()
            ->setFile($file)
            ->execute();
    }

    public function getResizedWebpSrc(array $file, array $size = ['width' => 800, 'height' => 600]): ?string
    {
        return Action\ResizeAction::getInstance()
            ->setFile($file)
            ->setSize($size)
            ->execute();
    }
}
