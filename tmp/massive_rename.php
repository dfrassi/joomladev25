
<?php

$path = "com_rda";




function renameDirectory($path = '.') {
	
	$toReplace = "helloworld";
	$withString = "rda";
	
	$ignore = array ('cgi-bin','.','..');
	$dh = @opendir ( $path );
	
	while ( false !== ($file = readdir ( $dh )) ) {
		if (! in_array ( $file, $ignore )) {
			$newFile = str_replace ( $toReplace, $withString, $file );
			rename ($path . "\\" . $file, ($path . "\\" . $newFile));
			if (is_dir("$path/$file"))	renameDirectory ( "$path/$file");						
		}
	}
	closedir ( $dh );
}


function replaceDirectory($path = '.') {

	$toReplace = "helloworld";
	$toReplaceEx = "HelloWorld";
	$toReplaceEx = "Hello World";
	$withString = "rda";

	$ignore = array ('cgi-bin','.','..');
	$dh = @opendir ( $path );


	while ( false !== ($file = readdir ( $dh )) ) {
		if (! in_array ( $file, $ignore )) {
			
			if (is_dir("$path/$file")){
				replaceDirectory ( "$path/$file");
			}
			else{
				$toReadString = file_get_contents("$path/$file");
				$toWriteString = str_replace($toReplace,$withString,$toReadString);
				$toWriteString = str_replace(strtoupper($toReplace),strtoupper($withString),$toWriteString);
				$toWriteString = str_replace(ucfirst($toReplace),ucfirst($withString),$toWriteString);
				$toWriteString = str_replace($toReplaceEx,$withString,$toWriteString);
				file_put_contents("$path/$file",$toWriteString);				
			}
		}
	}
	closedir ( $dh );
}



renameDirectory ($path);
replaceDirectory ($path);

?>

