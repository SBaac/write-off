<?php
//https://phpword.readthedocs.io/en/latest/templates-processing.html

//https://www.programmerthailand.com/tutorial/post/view/212/dashboard-setting.html
//https://phpword1.rssing.com/chan-8909291/all_p5.html
//http://www.outsource-online.net/blog/2021/04/20/php-word-template-processor/

//https://readthedocs.org/projects/phpword/downloads/pdf/latest/


header("Content-Type: text/html; charset=utf-8");
date_default_timezone_set('Asia/Bangkok');
$today = date("D d F Y H:i:s"); 


require_once '../Classes/PHPWord.php';

$PHPWord = new PHPWord();
$document = $PHPWord->loadTemplate('writeoff_paper_template.docx');



// วางค่าตามลำดับของตัวแปร
$cif = filter_input(INPUT_POST, "tab1_cif");
$tab1_name = filter_input(INPUT_POST, "tab1_name");
$tab1_meet_year = filter_input(INPUT_POST, "tab1_meet_year");
$tab1_age = filter_input(INPUT_POST, "tab1_age");
$tab1_cid = filter_input(INPUT_POST, "tab1_cid");
$tab1_brn_name = filter_input(INPUT_POST, "tab1_brn_name");
$tab1_prov_name = filter_input(INPUT_POST, "tab1_prov_name");
$tab1_group = filter_input(INPUT_POST, "tab1_group");
$tab1_cif = filter_input(INPUT_POST, "tab1_cif");


//===================ปีบัญชี======================
$document->setValue("acc_year",$tab1_meet_year);
//===================หัวตาราง======================
$str =  $tab1_name 
		." อายุ ".  $tab1_age . " ปี "  
		." เลขบัตรประชาชน " . $tab1_cid . $tab1_brn_name 
		." สังกัด ". $tab1_prov_name
		."  กลุ่ม "   . $tab1_group 
		." เลขทะเบียน" .  $cif ; 
$document->setValue("customer_name",f_text($str)) ;
//===================รายที่====================== 
$document->setValue("rai", " ");


// 1.สถานะหนี้
$str = "เป็นหนี้ยังไม่ดำเนินคดี มีหลักฐานการเป็นหนี้ครบถ้วนพอฟ้องคดีได้ ไม่ขาดอายุความเนื่องจาก " .  filter_input(INPUT_POST, "tab2_1_4") ;
$str = $str . " ไม่ดำเนินคดีและบังคับคดีเนื่องจาก " .  filter_input(INPUT_POST, "tab2_1_5") ; 
$document->setValue("1_loan_status",f_text($str));


// 2.สาเหตุหนี้ค้างชำระ
$str =  filter_input(INPUT_POST, "tab2_2_1") ;
$str = $str . " ชำระหนี้ไม่ได้เนื่องจาก " . filter_input(INPUT_POST, "tab2_2_2") ;
$document->setValue("2_npl_cause", f_text($str));


//3.สถานะผู้กู้ 
$str = filter_input(INPUT_POST, "tab2_3_1") ;   
$str = $str . "  " . filter_input(INPUT_POST, "tab2_3_2") ;   
$str = $str . " " . filter_input(INPUT_POST, "tab2_3_3") ;   
$document->setValue("3_cus_status", f_text($str));

//tb_garantee
//=1|1|นายหนึ่ง$นามสกุลหนึ่ง#(เสนอตัดหนี้สูญ)|ตาย|||||||||||||ลบ|
$tb_garantee = filter_input(INPUT_POST, "tb_garantee") ; 
$tb_garantee = str_replace("#"," "  ,$tb_garantee) ;
$tb_garantee = "@" . $tb_garantee ;
$rows = explode("@",$tb_garantee) ;
$n=0;
$m=0;
 
for($i=0;$i<count($rows);$i++){
		if(strpos($rows[$i],"|") > 0){ 
					$garantee = "" ;
					$cols = explode("|",$rows[$i]) ;
					if(($cols[1] !== "") && ($cols[2] !== "" )  ){ 
									$var = "" ;
									if($cols[1] =="1"){
											$var = "4_garan1." ;
											$n++;
											$str = "4.1." . $n   ;
											$mn = $n;
									}
									if($cols[1] =="2") {
											$var = "4_garan2." ;
											$m++ ;
											$str = "4.2." . $m  ;
											$mn = $m ;
									}// เฉพาะบรรทัดไม่ว่าง
									$str = $str . " " . $cols[2] ; // name 
										if($cols[3] =="ตาย"){
												$str = $str . " ตาย " ; 
												// ไม่ตาย===========================
												}else{ 
												if($cols[3] !== "") $str = $str . " อายุ" .$cols[3] . "ปี " ; 
												if($cols[4] !== "") $str = $str . " "  .$cols[4]  ;  // เหตุผิดปกติ
												
												if( strpos("xxx".$cols[5],"เลิก" )> 0 ){
													$str = $str . " " . $cols[5]    ; 
													}else{ 
													if( $cols[5] !=="") {
															$str = $str . " อาชีพ". $cols[5]   ;
															if( $cols[6] !==""){
																	$str = $str . " รายได้". $cols[6]   ;
																	}else{
																	$str = $str . " รายได้พอเลี้ยงชีพ"  ;
															}
													}
													
												}				
												if( $cols[7] !=="") 	$str = $str . " มีภาระ". $cols[7]   ;  // 
												if( $cols[8] !=="") 	$str = $str . " ทรัพย์สิน". $cols[8]   ;  // 

												// หนี้สิน ธ.ก.ส.
												if( ($cols[10] !=="") && ($cols[11] !=="")){
															if($cols[10] ==""){
																	$str = $str .  " มีหนี้ ธ.ก.ส. สถานะหนี้ปกติ" ;
																	}else{ 
																	$str = $str . " มีหนี้ ธ.ก.ส. สถานะหนี้". $cols[10]  ;	
															}
															$str = $str . " หลักประกัน". $cols[11]  ;
															$str = $str . " ต้นเงิน ". $cols[12] . " บาท"  ;
															$str = $str . " ดอกเบี้ย ". $cols[13] . " บาท"  ;			
												}
												// หนี้ภายนอก
												if($cols[14] !=="") 	$str = $str . " มีหนี้ภายนอก ". $cols[14]   ;	
												
										} // ตาย
										$garantee = $garantee .  " " . $str ;
										$document->setValue($var . $mn , f_text($garantee)); // ลูกหนี้ร่วม
					}   
					
			} // if
} // for
//4_garan1 ลูกหนี้ร่วม
// clear var
for($i=1;$i <= 12 ;$i++){
		$document->setValue("4_garan1." . $i ,""); // ลูกหนี้ร่วม
		$document->setValue("4_garan2." . $i ,""); // คนค้ำ
}

$x= "       
       
";

// 5.1_fallow  การติดตามหนี้

$tab4_1 = filter_input(INPUT_POST, "tab4_1");
$document->setValue("5.1_fallow", f_text($tab4_1) ); 

$tab4_2 = filter_input(INPUT_POST, "tab4_2");
$document->setValue("5.2_fallow",f_text($tab4_2)); 


//comment_brn  ความเห็นของคณะกรรมการบริหารหนี้ค้างชำระ ระดับ สาขา 
$tab4_3 = filter_input(INPUT_POST, "tab4_3");
$document->setValue("comment_brn",f_text($tab4_3)); 

//comment_prov ความเห็นของคณะกรรมการบริหารหนี้ค้างชำระ ระดับ สนจ.  
$tab4_4 = filter_input(INPUT_POST, "tab4_4");
$document->setValue("comment_prov",f_text($tab4_4)); 


$document->setValue("tab1_em_name_tel", "นายวรชัย เพชรแสงฉาย 063-4163819"); 




//=========================================
// ตารางหนี้  ทำหลังสุด จะทำให้การแทนค่าตัวแปร ข้างล่างได้
//=========================================
//tb_loan=
//   1|536138054318|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00||||||||18,000.00|20,005.01|19|ลบ|
//@2|536138888888|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00||||||||10,000.00|10,005.02|19|ลบ|
//@xx|รวม|||||||||||||
$tb_loan = filter_input(INPUT_POST, "tb_loan");
$tb_loan = "@" . $tb_loan ; 
$rows = explode("@",$tb_loan) ;
$row = count($rows) ;
 
// สร้างตัวแปร จาก ${col0}  เป็น  ${col0#1}  
//                      ${col1}  เป็น ${col1#1}
// แทนค่าตัวแปร
$n = 0 ;
for($i = 0 ; $i < $row ; $i++){
	if(strpos($rows[$i],"|") > 0) $n++ ;
}	

$document->cloneRow('col1', $n);  // $row
$n = 0 ; 
for($i = 0 ; $i < $row ; $i++){
	if(strpos($rows[$i],"|") > 0){ 
			//$document->cloneRow('col1', $i);	
			$n++;
			f_row($document,$rows[$i],$n); // $i+1	
	}
}

// วางข้อมูลทีละบรรทัด
function f_row($document,$str,$row){
	$newline = "\r\n \r\n \r\n \r\n"  ; // ขึ้นบรรทัดใหม่
	$str = str_replace("$"," ",$str) ;
	$str = str_replace("#",$newline ,$str) ;
	$cols = explode("|" , $str) ;	
	  
	
	
	if($cols[0] !== "xx"){ 
			// ประเภทเงินกู้
			$var = "col0"."#".$row  ; // สร้างตัวแปร
			$str = $cols[0] .") ". $cols[2] . $newline . $cols[1] . $newline . $cols[4]   ;	
			$document->setValue($var,$str);
			// หลักประกัน
			$var = "col1"."#".$row  ; // สร้างตัวแปร
			$document->setValue($var,$cols[5] );
			}else{ 
			// ประเภทเงินกู้
			$var = "col0"."#".$row  ; // สร้างตัวแปร
			$str = "xx"  ;	
			$document->setValue($var,$str);
			// หลักประกัน
			$var = "col1"."#".$row  ; // สร้างตัวแปร
			$document->setValue($var,"รวม");
	}
	// ต้นเงินเดิม
	$var = "col2"."#".$row  ; 	$document->setValue($var,f_zero($cols[6]) );
	//การชำระหนี้ก่อนดำเนินคดี	
	$var = "col3"."#".$row  ;  $document->setValue($var,f_zero($cols[7]) ); //ต้น
	$var = "col4"."#".$row  ;  $document->setValue($var,f_zero($cols[8]) ); //ดอก
	$var = "col5"."#".$row  ;  $document->setValue($var,f_zero($cols[9]) ); //รวม
	//การชำระหนี้หลังดำเนินคดี
	$var = "col6"."#".$row  ;  $document->setValue($var,f_zero($cols[10]) ); //ต้น
	$var = "col7"."#".$row  ;  $document->setValue($var,f_zero($cols[11]) ); //ดอก
	$var = "col8"."#".$row  ;  $document->setValue($var,f_zero($cols[12]) ); //ค่าฤชา
	$var = "col9"."#".$row  ;  $document->setValue($var,f_zero($cols[13]) ); //รวม
	//หนี้คงเหลือขอจำหน่ายหนี้
	$var = "col10"."#".$row  ;  $document->setValue($var,f_zero($cols[14]) ); //ต้น
	$var = "col11"."#".$row  ;  $document->setValue($var,f_zero($cols[15]) ); //ดอก
	//อายุหนี้ค้าง
	$var = "col12"."#".$row  ;  $document->setValue($var,f_zero($cols[16]) ); //ปี
}
function f_zero($str){
	if($str==""){
			return "-" ;
			}else{
			return $str ;
	}
}


 function f_text($str){
	$newline =" "  ; // chr(13) . chr(10)  \r\n \r\n \r\n \r\n
	$str = str_replace("$"," ",$str) ;
	$str = str_replace("#",$newline ,$str) ;
	return $str  ;		
 }

$document->saveAs("../out/". $cif.".docx");
//echo "writeoff_out.docx<hr>";
//echo $today ;
echo "OK=PHPWord/out/". $cif.".docx";