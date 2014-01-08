
<?php

$path = "com_rda";

function getDirectory($path = '.') {
	
	$toReplace = "helloworld";
	$withString = "rda";
	
	$ignore = array ('cgi-bin','.','..');
	$dh = @opendir ( $path );
	$toReadString="";
	$toWriteString="";
	
	while ( false !== ($file = readdir ( $dh )) ) {
		if (! in_array ( $file, $ignore )) {
			$newFile = str_replace ( $toReplace, $withString, $file );
			rename ($path . "\\" . $file, ($path . "\\" . $newFile));
			if (is_dir("$path/$file")){
				getDirectory ( "$path/$file");			
			}
			else{
				$toReadString = file_get_contents("$path/$newFile");
				$toWriteString = str_replace($toReplace,$withString,$toReadString);
				
				$toReplace1 = strtoupper($toReplace);
				$withString1 = strtoupper($withString);
				$toWriteString = str_replace($toReplace1,$withString1,$toWriteString);

				$toReplace2 = ucfirst($toReplace);
				$withString2 = ucfirst($withString);
				$toWriteString = str_replace($toReplace2,$withString2,$toWriteString);
				
				file_put_contents("$path/$file",$toWriteString);
			}
		}
	}
	closedir ( $dh );
}
getDirectory ( $path)?>

