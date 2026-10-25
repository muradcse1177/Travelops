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
     * $dotRatio >= 1 draws plain square modules instead of dots.
     * $squareDots draws the shrunken modules as small squares instead of circles.
     * $finderScale > 1 enlarges the 3 corner finder boxes around their own centre.
     */
    public static function dottedPng(string $text, float $dotRatio = 0.85, int $version = QRCode::VERSION_AUTO, bool $quietZone = false, int $eccLevel = QRCode::ECC_H, bool $squareDots = false, float $finderScale = 1.0): string
    {
        $options = new QROptions([
            'version'      => $version,
            'eccLevel'     => $eccLevel,
            'addQuietzone' => $quietZone,
        ]);

        $matrix = (new QRCode($options))->getMatrix($text);
        $size   = $matrix->size();
        $cell   = 24;
        $dot    = (int) round($cell * $dotRatio);
        // Enlarged finders grow outward too, so leave room for them on the edges.
        $pad    = (int) ceil(max(0, $finderScale - 1) * 3.5 * $cell);

        $img   = imagecreatetruecolor($size * $cell + 2 * $pad, $size * $cell + 2 * $pad);
        $white = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0, 0, 0);
        imagefill($img, 0, 0, $white);

        for ($y = 0; $y < $size; $y++) {
            for ($x = 0; $x < $size; $x++) {
                if (!$matrix->check($x, $y)) {
                    continue;
                }

                $type = $matrix->get($x, $y) >> 8;
                $px   = $pad + $x * $cell;
                $py   = $pad + $y * $cell;

                if ($type === QRMatrix::M_FINDER || $type === QRMatrix::M_FINDER_DOT) {
                    if ($finderScale == 1.0) {
                        imagefilledrectangle($img, $px, $py, $px + $cell - 1, $py + $cell - 1, $black);
                    }
                } elseif ($dotRatio >= 1) {
                    imagefilledrectangle($img, $px, $py, $px + $cell - 1, $py + $cell - 1, $black);
                } elseif ($squareDots) {
                    $off = (int) (($cell - $dot) / 2);
                    imagefilledrectangle($img, $px + $off, $py + $off, $px + $off + $dot - 1, $py + $off + $dot - 1, $black);
                } else {
                    imagefilledellipse($img, (int) ($px + $cell / 2), (int) ($py + $cell / 2), $dot, $dot, $black);
                }
            }
        }

        // Enlarged finders: 7/5/3-module concentric squares, scaled around each finder's centre.
        if ($finderScale != 1.0) {
            foreach ([[3.5, 3.5], [$size - 3.5, 3.5], [3.5, $size - 3.5]] as [$cx, $cy]) {
                foreach ([[7, $black], [5, $white], [3, $black]] as [$modules, $color]) {
                    $half = $modules * $finderScale * $cell / 2;
                    imagefilledrectangle(
                        $img,
                        (int) round($pad + $cx * $cell - $half),
                        (int) round($pad + $cy * $cell - $half),
                        (int) round($pad + $cx * $cell + $half) - 1,
                        (int) round($pad + $cy * $cell + $half) - 1,
                        $color
                    );
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
