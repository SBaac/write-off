
<?php  
header("Content-Type: text/html; charset=utf-8");header("Content-Type: text/html; charset=utf-8");
include "connect.inc.php" ;
$id = "" ;
if( filter_input(INPUT_GET, "id"))  $id = filter_input(INPUT_GET, "id") ;


 $sql = " DELETE FROM  tb_login WHERE   id=$id " ;

$result =  $db->exec($sql) or die('exec failed');
echo "OK";
 
?> 
