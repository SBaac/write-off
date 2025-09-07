<?php  
header('Content-Type: text/html; charset=utf-8');
	
//date_default_timezone_set('UTC');  // เล่นกะวันที่ต้องมีบรรทัดนี้
date_default_timezone_set('Asia/Bangkok');

$brn_code ="" ; $brn_code = filter_input(INPUT_GET, "brn_code");
if($brn_code == ""){
	echo "ไม่มีรหัส สาขา";
	exit();	
}
$prov_code ="" ; $prov_code = filter_input(INPUT_GET, "prov_code");
$brn_name ="" ; $brn_name = filter_input(INPUT_GET, "brn_name");
$prov_name ="" ; $prov_name = filter_input(INPUT_GET, "prov_name");

include("../ip.php");
$ip =  f_get_ip();
$today = date("D d F Y H:i:s");  
$computer_name = gethostname()  ;

include ("db_writeoff_connect_user_inc.php");

$sql = " DELETE FROM  user WHERE  brn_code=$brn_code "; 
$result =  $db->exec($sql) or die('exec failed');
		
$sql = " INSERT INTO user (prov_code ,brn_code  ,brn_name   ,prov_name  ,ip    ,computer_name  ,date) 				
		   VALUES             ($prov_code,$brn_code,'$brn_name','$prov_name','$ip','$computer_name','$today')  "  ; 					
$results =  $db->exec($sql) or die('exec failed');

echo "บันทึกผู้ใช้ สาขาเรียบร้อยแล้ว";
 

?>