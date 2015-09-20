<?php
    
	include dirname(__FILE__).'/php/csrf_protection/csrf-token.php';
	include dirname(__FILE__).'/php/csrf_protection/csrf-class.php';
    
	include dirname(__FILE__).'/php/config/config.php';
	include dirname(__FILE__).'/php/config/functions.php';
	
	$language = array('en' => 'en','pt' => 'pt');

	if (isset($_GET['lang']) AND array_key_exists($_GET['lang'], $language)){
		include dirname(__FILE__).'/php/language/'.$language[$_GET['lang']].'.php';
	} else {
		include dirname(__FILE__).'/php/language/en.php';
	}

	error_reporting(E_ALL & ~E_NOTICE);

	// $filename = 

	/*$source_dir = '/var/www/vhosts/jbims.edu/public_html/admission/secure/application/document/go/documents/';
	$zip_file = '/var/www/vhosts/jbims.edu/public_html/admission/secure/application/document/go/zip/pdfs.zip';
	// $source_dir = 'C:\\Users\\Archit\\Downloads\\JBIMS\Development\\admission\secure\\application\\document\\go\\documents\\';
	// $zip_file = 'C:\\Users\\Archit\\Downloads\\JBIMS\Development\\admission\secure\\application\\document\\go\\documents\\pdfs.zip';
	$file_list = Utils::listDirectory($source_dir);
	 
	$zip = new ZipArchive();
	if ($zip->open($zip_file, ZIPARCHIVE::CREATE) === true) {
		foreach ($file_list as $file) {
			if ($file !== $zip_file) {
				$zip->addFile($file, substr($file, strlen($source_dir)));
			}
		}
		$zip->close();
		echo 'Success';
	} else {
		echo 'failed';
	}*/

	$zip = new ZipArchive();
	$filename = "./test112.zip";

	if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
	    exit("cannot open <$filename>\n");
	}

	$zip->addFromString("testfilephp.txt" . time(), "#1 This is a test string added as testfilephp.txt.\n");
	$zip->addFromString("testfilephp2.txt" . time(), "#2 This is a test string added as testfilephp2.txt.\n");
	$zip->addFile($thisdir . "/too.php","/testfromfile.php");
	echo "numfiles: " . $zip->numFiles . "\n";
	echo "status:" . $zip->status . "\n";
	$zip->close();

?>