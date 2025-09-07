<?php
header('Content-Type: text/html; charset=utf-8');

//$target_dir = "db/";
$target_dir = "";

if(isset($_GET["delfile"])){
			$file = $_GET["delfile"] ;
			//$delFile = iconv('utf-8','tis-620',$file);
			$delFile = $file;			
			$fullPathFile=$target_dir.$delFile; 
			if( file_exists($fullPathFile) ){
					//echo  $fullPathFile ;
					$del=unlink($fullPathFile);
					echo "OK=";
			}
}
 
 
 ?>