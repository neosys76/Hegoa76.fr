<?php

namespace Libertribes\Component\Image;

/**
 * @property-read int $width width
 * @property-read int $height height
 */
class Image {

    private $mImage = null;
    private $mWidth = null;
    private $mHeight = null;

    public static
    function create($width, $height) {
        $image = @imagecreatetruecolor($width, $height);
        if (!$image) {
            throw new \Exception('" imagecreatetruecolor " fail');
        }
        if (!@imagesavealpha($image, true)) {
            throw new \Exception('" imagesavealpha " fail');
        }
        if (!@imagefill($image, 0, 0, @imagecolorallocatealpha($image, 0, 0, 0, 127))) {
            throw new \Exception('" imagefill " fail');
        }
        return new Image($image, $width, $height);
    }

    public static
    function createFromFile($path) {
        $infos = @getimagesize($path);
        if (!$infos || !is_array($infos)) {
            throw new \Exception('"getimagesize" fail');
        }
        if ($infos[2] != 3) {
            throw new \Exception("image isn't a PNG");
        }
        $image = @imagecreatefrompng($path);
        if (!$image) {
            throw new \Exception('"imagecreatefrompng" fail');
        }
        return new Image($image, $infos[0], $infos[1]);
    }

    public static
    function createFromImage(Image $from, $width, $height) {
        $image = self::create($width, $height);
        if (!@imagecopyresampled($image->mImage, $from->mImage, 0, 0, 0, 0, $width, $height, $from->mWidth, $from->mHeight)) {
            throw new \Exception();
        }
        return $image;
    }

    private
    function __construct($image, $width, $height) {
        $this->mImage = $image;
        $this->mWidth = $width;
        $this->mHeight = $height;
    }

    public
    function __destruct() {
        if ($this->mImage) {
            @imagedestroy($this->mImage);
        }
        $this->mImage = null;
    }

    public
    function render() {
        if (@imagepng($this->mImage) !== true) {
            throw new \Exception();
        }
    }

    public
    function save($path) {
        if (@imagepng($this->mImage, $path) !== true) {
            throw new \Exception(' " imagepng " fail');
        }
    }

    public
    function getColorAt($x, $y) {
        if (($x < 0) || ($x > ($this->mWidth - 1)) || ($y < 0) || ($y > ($this->mHeight - 1))) {
            return null;
        }
        $color = @imagecolorsforindex(
                        $this->mImage, @imagecolorat($this->mImage, $x, $y));
        return Color::createFromRGBA(
                        $color['red'], $color['green'], $color['blue'], $color['alpha']
        );
    }

    public
    function drawImage($x, $y, Image $image) {
        if (@imagecopyresampled($this->mImage, $image->mImage, $x, $y, 0, 0, $image->mWidth, $image->mHeight, $image->mWidth, $image->mHeight) !== true) {
            throw new \Exception();
        }
    }

    public
    function fill(Color $color) {
        if (@imagefill($this->mImage, 0, 0, @imagecolorallocatealpha($this->mImage, $color->red, $color->green, $color->blue, $color->alpha)) !== true) {
            throw new \Exception();
        }
    }

    public function __get($name) {
        switch ($name) {
            case 'width': return $this->mWidth;
            case 'height': return $this->mHeight;
        }
    }

}