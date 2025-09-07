
<?php  
header("Content-Type: text/html; charset=utf-8");
include "connect.inc.php" ;

$q = " SELECT   tab1_prov_name,COUNT(cif) AS count_cif
		 FROM  tb 
            GROUP BY   tab1_prov_name 
		 ORDER BY   count_cif  DESC  ";
		 
$result = $db->query($q);
echo "<table    class='table1' border='1' id='tb_prov'>";
echo "<thead>";
echo "<tr style='background-color:MediumTurquoise;height:35px;'>";
echo "<th>ที่</th>";
echo "<th>ชื่อสนจ.</th>";
echo "<th>ครั้ง</th>";
echo "</tr>";
echo "</thead>";

$n=0;
$nums = 0 ;
while ($rs  = $result->fetchArray()){
		$n++;
		$prov_name = $rs['tab1_prov_name'] ;
		echo "<tr   onclick=\"f_ajax('report_brn.php?prov_name=$prov_name','div_brn');\" >";
		echo "<td style='text-align:center;'>$n</td>";
		echo "<td style='text-align:left;'>".$rs['tab1_prov_name']."</td>";
		echo "<td style='text-align:right;'>" . f_format($rs['count_cif'],1,0) . "</td>";
		echo "</tr>";
		$num = $rs['count_cif'] + 0 ;
		$nums = $nums + $num ;
}
echo "</table>";
 
echo "<br>" .  f_format($nums,1,0) . " ครั้ง" ;




function f_format($num,$div,$digit){
	if  ($num == 0) return  " - " ;
	return (number_format($num/$div,$digit));
}	

 