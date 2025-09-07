
<?php  
header("Content-Type: text/html; charset=utf-8");
include "connect.inc.php" ;

$brn_name = "" ;
if( filter_input(INPUT_GET, "brn_name"))  $brn_name = filter_input(INPUT_GET, "brn_name") ;


$q = "SELECT  *   FROM tb
		 WHERE  tab1_brn_name = '$brn_name'
		 --ORDER BY date  DESC";
		 
//echo $q  ;
		 
$result = $db->query($q);

echo "<table   class='table1' border='1' style=' table-layout:auto;'  id='tb_ip'>";
echo "<thead>";
echo "<tr style='background-color:Gainsboro'>";
echo "<th>ที่</th>";
echo "<th>สนจ.</th>";
echo "<th>ชื่อสาขา</th>";
echo "<th>CIF</th>";
echo "<th>ชื่อลูกค้า</th>";
echo "<th>ชื่อ พนักงาน</th>";
echo "<th style='width:120px;'>ip</th>";
echo "<th>วันที่</th>";
echo "<th>detail</th>";
echo "</tr>";
echo "</thead>";

$n=0;
$brn_name="";
while ($rs  = $result->fetchArray()){
		$max=   $result->numColumns(); 
		echo "<tr>";
		$n++;
		echo "<td style='text-align:center;'>$n</td>";
		echo "<td  style='text-align:center;'>". $rs['tab1_prov_name'] . "</td>" ;
		echo "<td  style='text-align:center;'>". $rs['tab1_brn_name'] . "</td>" ;
		echo "<td  style='text-align:left;color:blue;'>". $rs['cif'] . "</td>" ;
		$cus_name =  $rs['tab1_name'] ;
		$cus_name = str_replace("$"," " , $cus_name) ;
		echo "<td  style='text-align:left;color:blue;'>". $cus_name . "</td>" ;
		
		$em = $rs['tab1_em_name_tel'] ;
		$em = str_replace("$"," " , $em) ;
		echo "<td  style='text-align:left;'>". $em . "</td>" ;
		echo "<td  style='text-align:left;'>". $rs['ip'] . "</td>" ;
		echo "<td  style='text-align:left;'>". $rs['date'] . "</td>" ;		
		echo "<td  style='text-align:left;'>". str_replace("$"," " ,$rs['tab4_1']) . "</td>" ;
		echo "</tr>";

}
echo "</table>";
echo "<br>";
echo " จำนวนการใช้งาน " . f_format($n,1,0) . " ครั้ง" ;
echo "<br><br><br><br>";



 

function f_format($num,$div,$digit){
	if  ($num == 0) return  " - " ;
	return (number_format($num/$div,$digit));
}	

 
?> 
