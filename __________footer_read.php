<?php
//session_start();
//ob_start();
header('Content-Type: text/html; charset=utf-8');

$prov_id = filter_input(INPUT_GET, "prov_id");

include("connect_db.php");
$sql = " SELECT  * 
			FROM  tb_footer
			WHERE prov_id=$prov_id			
			";   

$results = $db->query($sql);
if (!$results) {
		echo "โปรแกรม error" ;
		echo  "\n" . mysql_error();
		exit();
}

$techarray = array();
while($row=$results->fetchArray()){
		//echo fReplace($row['footer']) ;
		$techarray[] = fReplace($row);
		//exit(); //  เอาบรรทัดเดียว
}	
echo "OK=";
echo json_encode($techarray);





 function fReplace($str) {
	 $str = str_replace("|","<br>",$str);
	 $str = str_replace(";","=",$str);
	 $str = str_replace("$","&nbsp;",$str);
	 
	 return $str ;
 }
 
 
 
/* 
if (file_exists($filename))
{
		$file=fopen($filename,"r") or die("Unable to open file!");   // เขียนอย่างเดียว  
		$str = fgets($file); 
		echo fReplace($str) ;
		 
		fclose($file);
		}else{
			
		echo "<br><br><br><br><br>";
}
*/
?>
