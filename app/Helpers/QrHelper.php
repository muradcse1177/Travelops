<?php

namespace App\Helpers;

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;
use chillerlan\QRCode\Data\QRMatrix;

class QrHelper
{
    /**
     * QR code as a base64 PNG data URI — works in normal views and in DomPDF.
     * Usage: <img src="{{ \App\Helpers\QrHelper::png($text) }}" width="90">
     */
    public static function png(string $text, int $scale = 5, bool $quietZone = true): string
    {
        $options = new QROptions([
            'outputType'  => QRCode::OUTPUT_IMAGE_PNG,
            'eccLevel'    => QRCode::ECC_M,
            'scale'       => $scale,
            'imageBase64' => true,
            'dataModeOverride' => '',
            'addQuietzone' => $quietZone,
        ]);

        return (new QRCode($options))->render($text);
    }

    /**
     * Dotted-style QR as a base64 PNG data URI: the 3 corner finder patterns stay
     * solid squares, every other dark module is drawn as a small dot.
     * Rendered large and downscaled by the <img> so the dots look smooth.
     */
    public static function dottedPng(string $text, float $dotRatio = 0.85, int $version = 6, bool $quietZone = false): string
    {
        $options = new QROptions([
            'version'      => $version,
            'eccLevel'     => QRCode::ECC_H,
            'addQuietzone' => $quietZone,
        ]);

        $matrix = (new QRCode($options))->getMatrix($text);
        $size   = $matrix->size();
        $cell   = 24;
        $dot    = (int) round($cell * $dotRatio);

        $img   = imagecreatetruecolor($size * $cell, $size * $cell);
        $white = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0, 0, 0);
        imagefill($img, 0, 0, $white);

        for ($y = 0; $y < $size; $y++) {
            for ($x = 0; $x < $size; $x++) {
                if (!$matrix->check($x, $y)) {
                    continue;
                }

                $type = $matrix->get($x, $y) >> 8;

                if ($type === QRMatrix::M_FINDER || $type === QRMatrix::M_FINDER_DOT) {
                    imagefilledrectangle($img, $x * $cell, $y * $cell, ($x + 1) * $cell - 1, ($y + 1) * $cell - 1, $black);
                } else {
                    imagefilledellipse($img, (int) ($x * $cell + $cell / 2), (int) ($y * $cell + $cell / 2), $dot, $dot, $black);
                }
            }
        }

        ob_start();
        imagepng($img);
        $png = ob_get_clean();
        imagedestroy($img);

        return 'data:image/png;base64,' . base64_encode($png);
    }
}
