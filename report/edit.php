
<?php  
header("Content-Type: text/html; charset=utf-8");

$id = "" ;
if( filter_input(INPUT_GET, "id"))  $id = filter_input(INPUT_GET, "id") ;

$db = new SQLite3("../db_contract_print.db3");   // อ้างโดยสคริปต์ที่อยู๋ในโฟลเดอร์

$sql = " UPDATE   tb_print  SET   tbprint_div = SUBSTR(tbprint_div,2,2)  WHERE    SUBSTR(tbprint_div,0,2)  = '80'    " ;


echo $sql ."<hr>";
$result =  $db->exec($sql) or die('exec failed');
echo "OK";
 
?> 
