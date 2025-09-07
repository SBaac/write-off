
<?php  
header("Content-Type: text/html; charset=utf-8");
include "connect.inc.php" ;
$prov_name = "" ;
if( filter_input(INPUT_GET, "prov_name"))  $prov_name = filter_input(INPUT_GET, "prov_name") ;


$q = " SELECT   tab1_prov_name,tab1_brn_name,COUNT(cif) AS count_cif
		 FROM  tb 
		 WHERE  tab1_prov_name = '$prov_name'
            GROUP BY  tab1_prov_name,tab1_brn_name
		 ORDER BY  count_cif  DESC  ";

//echo $q ;
		 
$result = $db->query($q);
echo "<table   class='table1' border='1' id='tb_brn'>";
echo "<thead>";
echo "<tr style='background-color:MediumTurquoise'>";
echo "<th>ที่</th>";
echo "<th>ชื่อสนจ.</th>";
echo "<th>ชื่อสาขา</th>";
echo "<th>ครั้ง</th>";
echo "</tr>";
echo "</thead>";

$n=0;
$nums = 0 ;
while ($rs  = $result->fetchArray()){
		$n++;
		$brn_name = $rs['tab1_brn_name'] ;
		echo "<tr   onclick=\"f_ajax('report_ip.php?brn_name=$brn_name','div_ip');\" >";
		echo "<td style='text-align:center;'>$n</td>";
		echo "<td style='text-align:center;'>".$rs['tab1_prov_name']."</td>";
		echo "<td style='text-align:left;'>".$rs['tab1_brn_name']."</td>";
		echo "<td style='text-align:right;'>" . f_format($rs['count_cif'],1,0) . "</td>";
		echo "</tr>";
		$num = $rs['count_cif'] + 0 ;
		$nums = $nums + $num ;
}
echo "</table>";
echo "<br>";
echo f_format($nums,1,0) . "  ครั้ง" ;
//echo "<br><br><br><br>";





function f_format($num,$div,$digit){
	if  ($num == 0) return  " - " ;
	return (number_format($num/$div,$digit));
}	

 