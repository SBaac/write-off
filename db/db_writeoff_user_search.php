<?php  
header('Content-Type: text/html; charset=utf-8');
$brn_code = "" ; $brn_code = filter_input(INPUT_GET, "brn_code");

if($brn_code == ""){
	exit();
}
				
include ("db_writeoff_connect_user_inc.php"); 
 
$sql =   " SELECT * FROM  user WHERE brn_code = ". $brn_code ; 

$results = $db->query($sql);

if (!$results) {
		echo "โปรแกรม error<hr>" ;
		echo $sql ;
		echo  "<hr>" .  mysql_error();
		exit();
}
 
//https://codeamend.com/blog/how-to-convert-mysql-data-to-json-using-php/
//create an array
$n =0 ;
$techarray = array();
while($row=$results->fetchArray()){				 
				$techarray[] = $row;
				$n++;
}
if($n > 0 ){ 
		echo "OK=";
		echo json_encode($techarray);
		}else{
		echo "ค้นหา สาขา : " . $brn_code . "  ไม่พบข้อมูล";
}
?>