<?php
header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Bangkok');
$fileContent = file_get_contents("master16_9.xml")  or die("Unable to open file!");

$tab1_prov_code = filter_input(INPUT_POST, "tab1_prov_code");
$tab1_brn_code = filter_input(INPUT_POST, "tab1_brn_code");
$tab1_prov_name = filter_input(INPUT_POST, "tab1_prov_name");
$tab1_brn_name = filter_input(INPUT_POST, "tab1_brn_name");

$tab1_meet_no = filter_input(INPUT_POST, "tab1_meet_no");
$tab1_meet_date = filter_input(INPUT_POST, "tab1_meet_date");
$tab1_meet_month = filter_input(INPUT_POST, "tab1_meet_month");
$tab1_meet_year = filter_input(INPUT_POST, "tab1_meet_year");

$tab1_name = filter_input(INPUT_POST, "tab1_name"); // นายทดสอบ$ตัดหนี้สูญ
$name_brn_prov  = f_clear($tab1_name."  ".$tab1_brn_name."  ".$tab1_prov_name)  ;  //  {ชื่อ_สาขา_สนจ.} 

$tab1_age = filter_input(INPUT_POST, "tab1_age");
$tab1_cid = filter_input(INPUT_POST, "tab1_cid");
$tab1_group = filter_input(INPUT_POST, "tab1_group");
$tab1_cif = filter_input(INPUT_POST, "tab1_cif");
$tab1_em_name_tel = f_clear(filter_input(INPUT_POST, "tab1_em_name_tel")) ; //  พนักงานผู้ทำ
$tab1_status = f_clear(filter_input(INPUT_POST, "tab1_status")) ;

$tab1_debt_servant = f_clear(filter_input(INPUT_POST, "tab1_debt_servant"));
$tab1_job = filter_input(INPUT_POST, "tab1_job");
$tab1_income = filter_input(INPUT_POST, "tab1_income");
$tab1_asset = filter_input(INPUT_POST, "tab1_asset");
$tab1_meet_full = f_clear( filter_input(INPUT_POST, "tab1_meet_full") ); // ตามมติที่ประชุม$ครั้งที่$55$/$2567$เมื่อวันที่$09$มิถุนายน$2567
$tab2_1_3 = f_clear(filter_input(INPUT_POST, "tab2_1_3")) ; // ชำระหนี้บางส่วน$21$ธันวาคม$25-----
$tab2_1_4 = filter_input(INPUT_POST, "tab2_1_4"); // เลิกประกอบอาชีพ
$tab2_1_5 = filter_input(INPUT_POST, "tab2_1_5");
$tab2_2_1 = filter_input(INPUT_POST, "tab2_2_1");
$tab2_2_2 = filter_input(INPUT_POST, "tab2_2_2");
$tab2_3_1 = filter_input(INPUT_POST, "tab2_3_1");
$tab2_3_2 = filter_input(INPUT_POST, "tab2_3_2");
$tab2_3_3 = filter_input(INPUT_POST, "tab2_3_3");
$tab4_1 = filter_input(INPUT_POST, "tab4_1");
$tab4_2 = filter_input(INPUT_POST, "tab4_2");
$tab4_3 = filter_input(INPUT_POST, "tab4_3");
$tab4_4 = filter_input(INPUT_POST, "tab4_4");

$tab1_npl_year = filter_input(INPUT_POST, "tab1_npl_year");
 
 
//=================ตารางหนี้==================
$tb_loan = filter_input(INPUT_POST, "tb_loan");
//1|536138054318|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00|200.00|100.50|300.50||||0.00|18,000.00|20,005.01|19|ลบ|
//@2|536138888888|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00|300.00|200.50|500.50||||0.00|10,000.00|10,005.02|19|ลบ|
//@xx|รวม|||||36,000.00|500.00|301.00|801.00|0.00|0.00|0.00|0.00|28,000.00|30,010.03|38.00||

$pos = strpos($tb_loan,"@");
if ( $pos ) {
		$rows = explode("@",$tb_loan);
		for ($r = 0 ; $r < count($rows) ; $r++){
				 $cols = explode("|",$rows[$r]);
				 $n = $r + 1;
				 
				 $pos = strpos($rows[$r],"|รวม|");
				 if ( $pos ){
						 $n = 9 ; // รวม					
				 }
				 $ton_old =  $cols[6] ;						 
				$ton = ($cols[7] + 0) + ($cols[10] + 0)  ;
				$dok = ($cols[8] + 0) + ($cols[11] + 0) + ($cols[12] + 0); // ดอก ฤชา 
				$sum = $ton + $dok  ;
				if($ton ==0) $ton = "-" ; 
				if($dok ==0) $dok = "-" ; 
				if($sum ==0) $sum = "-" ; 				
				$fileContent =  str_replace("{A$n.2}",$ton_old,$fileContent ); // ต้นเงินเดิม
				$fileContent =  str_replace("{A$n.3}",$ton,$fileContent ); // การชำระหนี้ ต้น
				$fileContent =  str_replace("{A$n.4}",$dok,$fileContent ); // การชำระหนี้ ดอก
				$fileContent =  str_replace("{A$n.5}",$sum,$fileContent ); // การชำระหนี้ รวม
				
				$ton = $cols[14] ;
				$dok = $cols[15] ;	
				if($ton ==0) $ton = "-" ; 
				if($dok ==0) $dok = "-" ; 				
				$fileContent =  str_replace("{A$n.6}",$ton ,$fileContent ); // คงเหลือขอจำหน่าย ต้นเงิน
				$fileContent =  str_replace("{A$n.7}",$dok ,$fileContent ); // คงเหลือขอจำหน่าย ดอก
				
		}
	
} 		

for ($r = 1 ; $r < 6 ; $r++){
		$fileContent =  str_replace("{A$r.1}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.2}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.3}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.4}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.5}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.6}","" ,$fileContent );
		$fileContent =  str_replace("{A$r.7}","" ,$fileContent );
}

 
//=================ตารางลูกหนี้ร่วม==================

/*
tb_garantee=
   1|1|นายหนึ่ง$นามสกุลสมมุติ|ตาย|||||||||||||ลบ|
@2|1|นางสอง$นามสกุลสมมุติ(เสนอตัดหนี้สูญ)|75|ป่วยเป็นอัมพฤกษ์ซีกซ้าย|เลิกประกอบอาชีพอาศัยบุตรเลี้ยงดู|||||ค้าง|ลน.ร่วม,คนค้ำ|30,000.00|30,461.00|กทบ.5,000บาท|50,00|ลบ|
@3|1|นายสาม$กรณีป่วยรับจ้าง|48|ป่วยเป็นโรคไทรอยด์|รับจ้าง|10,000.00||บ้านไม้$1$หลัง$ไม่มีมูลค่า$ปลูกบนที่ดินไม่มีเอกสารสิทธ์||ค้าง|คนค้ำ,ลน.ร่วม|85,000.00|10,985.00|กทบ.20,000บาท|20,000.00|ลบ|
*/
$tb_garantee = filter_input(INPUT_POST, "tb_garantee");
$pos = strpos($tb_garantee,"@");
if ( $pos ) {
		$m = 0 ;
		$n = 0 ;
		$rows = explode("@",$tb_garantee);
		for ($r = 0 ; $r < count($rows) ; $r++){
				 $cols = explode("|",$rows[$r]);
				 if ($cols[1] !== ""){ 	
								$bc = "" ;
								 if ($cols[1] === "1"){ 		
										$m++;
										$bc = "B" . $m ;
								 }
								 if ($cols[1] === "2"){ 		
										$n++;
										$bc = "C" . $n ;
								 }
								$fileContent =  str_replace("{".$bc.".1}",f_clear($cols[2]),$fileContent ); // ชื่อ
								$fileContent =  str_replace("{".$bc.".2}",f_clear($cols[3]),$fileContent ); // อายุ
								$fileContent =  str_replace("{".$bc.".3}",f_clear($cols[4]),$fileContent ); // สถานะ
								$fileContent =  str_replace("{".$bc.".4}",f_clear($cols[5]),$fileContent ); // อาชีพ
								$fileContent =  str_replace("{".$bc.".5}",f_clear($cols[6]),$fileContent ); // รายได้
								$fileContent =  str_replace("{".$bc.".6}",f_clear($cols[9]),$fileContent ); // มูลค่าทรัพย์สิน
								$fileContent =  str_replace("{".$bc.".7}",f_clear($cols[12]),$fileContent ); // หนี้ธ.ก.ส.ต้น
								$fileContent =  str_replace("{".$bc.".8}",f_clear($cols[13]),$fileContent ); // หนี้ธ.ก.ส.ดอก
								$fileContent =  str_replace("{".$bc.".9}",f_clear($cols[15]),$fileContent ); // หนี้บุคคลอื่น						
				 }
		}
	
} 	
// =====================CLEAR======================
for ($r = 1 ; $r < 13 ; $r++){
		for ($c = 1 ; $c < 10 ; $c++){
				$fileContent =  str_replace("{B$r.$c}","" ,$fileContent );
				$fileContent =  str_replace("{C$r.$c}","" ,$fileContent );
		}
}













$fileContent =  str_replace("{รายที่}","1" ,$fileContent ); 
$fileContent =  str_replace("{ชื่อ_สาขา_สนจ.}",$name_brn_prov,$fileContent );

$fileContent =  str_replace("{ไม่ขาดอายุความ}",$tab2_1_3,$fileContent );
$fileContent =  str_replace("{อายุหนี้ค้าง}",$tab1_npl_year,$fileContent );
$fileContent =  str_replace("{อายุ}",$tab1_age,$fileContent );
$fileContent =  str_replace("{สถานะ}",$tab1_status,$fileContent );

if ($tab1_job ==="")  $tab1_job = "-" ;
$fileContent =  str_replace("{อาชีพ}",str_replace("ประกอบ","",$tab1_job),$fileContent ); // เลิกประกอบอาชีพ


// รายได้ ทรัพย์สิน ผู้รับใช้หนี้
if ($tab1_income ==="")  $tab1_income = "-" ;
if ($tab1_asset ==="")  $tab1_asset = "-" ;
if ($tab1_debt_servant ==="")  $tab1_debt_servant = "-" ;

$fileContent =  str_replace("{รายได้สุทธิ}",$tab1_income,$fileContent );
$fileContent =  str_replace("{ทรัพย์สิน}",$tab1_asset,$fileContent );
$fileContent =  str_replace("{ผู้รับใช้หนี้}",$tab1_debt_servant,$fileContent );


//$tab2_2_2 // ชำระหนี้ไม่ได้เนื่องจาก
//$tab4_1   // การติดตามหนี้ลูกค้า
//$tab4_2 // การติดตาม ลน.ร่วม คนค้ำ
$str = "ชำระหนี้ไม่ได้เนื่องจาก  " . $tab2_2_2  . " การติดตามหนี้ " . $tab2_2_2 ." การติดตามผู้ค้ำประกัน " . $tab4_2 ;
$str  = f_clear($str) ;
$fileContent =  str_replace("{สาเหตุหนี้ค้างชำระและการติดตามหนี้}",$str,$fileContent );
 

 
// ==================================================

$str  =    $tab1_prov_code . "_" .  $tab1_brn_code   . "_" .   $tab1_cif    ;

$filePath =   "out/".$str.".xml" ;

if( file_exists($filePath)){
	$del=unlink($filePath);
}
			

$file=fopen($filePath ,"w"); 
fwrite($file,$fileContent);// ขึ้นบรรทัดใหม่
fclose($file);

echo "OK=ppt_xml/" . $filePath   ;

function f_clear($str){
	//$str =  str_replace("$$","$",$str );
	//$str =  str_replace("$$","$",$str );
	//$str =  str_replace("$$","$",$str );
	//$str =  str_replace("$$","$",$str );
	$str =  str_replace("$"," ",$str );
	$str = str_replace("@"," ",$str) ;
	$str = str_replace("#"," ",$str) ;

	return $str ;
	
}

 
?>
 