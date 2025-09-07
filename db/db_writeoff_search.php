<?php  
header('Content-Type: text/html; charset=utf-8');
include ("db_writeoff_connect.inc.php");

				
$cif = filter_input(INPUT_GET, "cif");
$cif = trim($cif) + 0  ;
 
$sql =   " SELECT * FROM  tb WHERE cif = ". $cif ; 

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
		echo "ค้นหา CIF : " . $cif . "  ไม่พบข้อมูล";
}
?>