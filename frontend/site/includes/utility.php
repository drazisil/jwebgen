<?php

/**
 * Takes two RGB values and return the color difference as a decimal value
 * @see http://www.w3.org/WAI/ER/WD-AERT/#color-contrast
 * @param hex $color1
 * @param hex $color2
 * @return int 
 */
function colorDiffRGB($color1, $color2) {
    /*
     * Convert the color1 RGB to an array containing the decimal values 
     */
    $tmp1 = str_split($color1, 2);
    $r1 = hexdec($tmp1[0]);
    $g1 = hexdec($tmp1[1]);
    $b1 = hexdec($tmp1[2]);

    /*
     * Convert the color2RGB to an array containing the decimal values 
     */
    $tmp2 = str_split($color2, 2);
    $r2 = hexdec($tmp2[0]);
    $g2 = hexdec($tmp2[1]);
    $b2 = hexdec($tmp2[2]);

    /*
     * Calculate the difference
     */
    $diff = (max($r1, $r2) - min($r1, $r2)) + (max($g1, $g2) - min($g1, $g2)) + (max($b1, $b2) - min($b1, $b2));
    return $diff;
}

/**
 * Takes a RGB background color and chooses either white or black 
 * based on highest contrast
 * @uses colorDiffRGB()
 * @param type $backgroundColorRGB
 * @return string 
 */
function fontColorContrast($backgroundColorRGB) {
    /*
     * Convert the RGB to an array containing the decimal values 
     */
//    $tmp = str_split($backgroundColorRGB, 2);
//    $r = hexdec($tmp[0]);
//    $g = hexdec($tmp[1]);
//    $b = hexdec($tmp[2]);

    /*
     * http://www.w3.org/WAI/ER/WD-AERT/#color-contrast
     */

    $diff[0] = colorDiffRGB('ffffff', $backgroundColorRGB);
    $diff[1] = colorDiffRGB('000000', $backgroundColorRGB);

    if ($diff[0] > $diff[1]) {
        $fontColorRGB = 'ffffff';
    } else {
        $fontColorRGB = '000000';
    }
    return $fontColorRGB;
}


function ExportHexToLong ( $colorR, $colorG, $colorB ) {
	// B, G, R
	$long = hexdec( $colorB.$colorG.$colorR );
	//return $colorB.dechex($colorG).dechex($colorR);
	return $long;
}

function ExportGeneBodyToNumber ( $Gene ) {
	switch ( $Gene ) {
		case 'none':					return 0;
		case 'Paint':					return 1;
		case 'ZigZag':					return 2;
		case 'Colorized Paint':			return 3;
		case 'Colorized ZigZag':		return 4;
		case 'Colorized Faded':			return 5;
	}
}

function ExportGeneLegToNumber ( $Gene ) {
	switch ( $Gene ) {
		case 'none':					return 0;
		case 'Socks':					return 1;
		case 'Stockings':				return 2;
		case 'Faded':					return 3;
		case 'Colorized Socks':			return 4;
		case 'Colorized Stockings':		return 5;
		case 'Colorized Faded':			return 6;
	}
}

function ExportGeneHairToNumber ( $Gene ) {
	switch ( $Gene ) {
		case 'none':					return 0;
		case 'Stripe':					return 1;
		case 'Rainbow':					return 2;
		case 'Tips':					return 3;
		case 'MStripes':				return 4;
		case 'QStripes':				return 5;
	}
}

function ExportGeneFaceToNumber ( $Gene ) {
	switch ( $Gene ) {
		case 'none':					return 0;
		case 'Star':					return 1;
		case 'Freckles':				return 2;
		case 'Blaze':					return 3;
		case 'Faded':					return 4;
		case 'Colorized Star':			return 5;
		case 'Colorized Freckles':		return 6;
		case 'Colorized Blaze':			return 7;
		case 'Colorized Faded':			return 8;
	}
}

function ExportGenderToNumber ( $Gender ) {
	switch ( $Gender ) {
		case "Male":					return 0;
		case "Female":					return 1;
	}
}

function ExportBreedToNumber ( $Breed ) {
	switch ( $Breed ) {
		case "EarthPony":				return 0;
		case "Unicorn":					return 1;
		case "MerPony":					return 2;
		case "SeaPony":					return 3;
		case "ShellPony":				return 4;
		case "FairyPony":				return 5;
		case "FlutterPony":				return 6;
		case "Pegasus":					return 7;
		case "WingedUnicorn":			return 8;
		case "DragonPony":				return 9;
		case "PhoenixPony":				return 10;
		case "Valkyrie":				return 11;
		case "KirinPony":				return 12;
		case "MerDragon":				return 13;
		case "WishingPony":				return 14;
		case "ReindeerPony":			return 15;
	}
}