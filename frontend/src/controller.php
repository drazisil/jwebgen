<?php
/*
 * JWebGen Controller
 *
 * Main Code Block
 * Processes all requests requiring pony-related operations
 */
\date_default_timezone_set('America/Chicago');

spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register();

require('./config.php');
require('./includes/utility.php');

// Save Button Pressed
if (filter_input(INPUT_POST, 'SaveImg') !== NULL ) {
    $fp1 = fopen(filter_input(INPUT_POST, 'ImgURL'), "r");
    $imageFile = '';
    while ($info = fread($fp1, 8192)) {
        $imageFile .= $info;
    }
    fclose($fp1);

    $tmpfname = tempnam ("/home/jwbecher/public_html/pony/", "IMG");

    $fp2 = fopen($tmpfname, "w");
    fwrite($fp2, $imageFile);
    fclose($fp2);

    $im = imagecreatefromjpeg ($tmpfname);

    unlink($tmpfname);

    if (!$im) {
        print "Could not create JPEG image $imgURL";
    }

    $filename=filter_input(INPUT_POST, 'PonyName');
    $file_type = "image/jpeg";
    $file_ending = "jpeg";
    $filename="\"".$filename.".".$file_ending."\"";
    header("Content-Type: $file_type");
    header("Content-Disposition: attachment; filename=".$filename);
    header("Pragma: no-cache");
    header("Expires: 0");
    imagejpeg($im);
    exit();
}

    /*
*
*	What flows can we expect when calling this file?
*
*	Starter pony
*	Breed pony
*	Save pony
*	Lookup pony
*
*	/breed.php		26,686	 36.13%
*	/starter.php	16,977	 22.98%
*	/index.php		11,669	 15.80%
*	/generate.php	9,327	 12.63%
*	/lookup.php		8,703	 11.78%
*
*/
/*
*	Currently, 36% of all visits are breed
*/

        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');

switch (filter_input(INPUT_GET, 'nextAction')) {
	case 'ponyBreed':
		require('doPonyBreed.php');
		exit;
	case 'ponyBreedOO':
		require('doPonyBreedOO.php');
		exit;
	case 'ponyStarter':
		require('doPonyStarter.php');
		exit;
	case 'ponyStarterOO':
		require('doPonyStarterOO.php');
		exit;
	case 'ponyGenerate':					// This is not currently called
		require('doPonyGenerate.php');
		exit;
	case 'ponyLookup':
		require('doPonyLookup.php');
		exit;
	default:
		// This should never happen
		// TODO: Probably want to put a error checker/message here
		exit;
}

/*
* End of page
*/





