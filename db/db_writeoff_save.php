<?php  
header('Content-Type: text/html; charset=utf-8');
	
//date_default_timezone_set('UTC');  // เล่นกะวันที่ต้องมีบรรทัดนี้
date_default_timezone_set('Asia/Bangkok');
$paras = $_REQUEST ;
//print_r($paras) ;

$cif = filter_input(INPUT_POST, "cif");
if($cif ==""){
	echo "ไม่มีรหัส CIF";
	exit();
	
}
include ("db_writeoff_connect.inc.php");

$sql = " DELETE FROM  tb WHERE  cif=$cif "; 
$result =  $db->exec($sql) or die('exec failed');
		
		
$today = date("D d F Y H:i:s"); 
//=======================tab1=====================
$cif = $_POST['cif'] ;
$ip = $_POST['ip'] ;
$computer_name = gethostname()  ;


$tab1_brn_code = $_POST['tab1_brn_code'] ;
$tab1_prov_code = $_POST['tab1_prov_code'] ;		 
		 
$tab1_prov_name = $_POST['tab1_prov_name'] ;
$tab1_brn_name = $_POST['tab1_brn_name'] ;
$tab1_meet_no = $_POST['tab1_meet_no'] ;
$tab1_meet_date = $_POST['tab1_meet_date'] ;
$tab1_meet_month = $_POST['tab1_meet_month'] ;
$tab1_meet_year = $_POST['tab1_meet_year'] ;
$tab1_meet_full = $_POST['tab1_meet_full'] ;
$tab1_name = $_POST['tab1_name'] ;
$tab1_age = $_POST['tab1_age'] ;
$tab1_cid = $_POST['tab1_cid'] ;
$tab1_group = $_POST['tab1_group'] ;
$tab1_em_name_tel = $_POST['tab1_em_name_tel'] ;

$tab1_status = $_POST['tab1_status'] ;
$tab1_job = $_POST['tab1_job'] ;
$tab1_income = $_POST['tab1_income'] ;
$tab1_asset = $_POST['tab1_asset'] ;
$tab1_debt_servant = $_POST['tab1_debt_servant'] ;			
//=======================tab2=====================
$cif = $_POST['cif'] ;
$tab2_1_3 = $_POST['tab2_1_3'] ;
$tab2_1_4 = $_POST['tab2_1_4'] ;
$tab2_1_5 = $_POST['tab2_1_5'] ;
$tab2_2_1 = $_POST['tab2_2_1'] ;
$tab2_2_2 = $_POST['tab2_2_2'] ;
$tab2_3_1 = $_POST['tab2_3_1'] ;
$tab2_3_2 = $_POST['tab2_3_2'] ;
$tab2_3_3 = $_POST['tab2_3_3'] ;
//=======================tab4=====================
$cif = $_POST['cif'] ;
$tab4_1 = $_POST['tab4_1'] ;
$tab4_2 = $_POST['tab4_2'] ;
$tab4_3 = $_POST['tab4_3'] ;
$tab4_4 = $_POST['tab4_4'] ;
//=======================tb_garantee================
$tb_garantee = $_POST['tb_garantee'] ; 
//=======================tb_loan================
$tb_loan = $_POST['tb_loan'] ; 

		
$sql = " INSERT INTO tb (cif,tab1_brn_code,tab1_prov_code,ip,computer_name,date,tab1_prov_name,tab1_brn_name
				,tab1_meet_no,tab1_meet_date,tab1_meet_month
				,tab1_meet_year,tab1_meet_full,tab1_name,tab1_age
				,tab1_cid,tab1_group,tab1_em_name_tel,tab1_status,tab1_job,tab1_income
				,tab1_asset,tab1_debt_servant
				
				,tab1_table_loan
				,tab2_1_3,tab2_1_4,tab2_1_5,tab2_2_1,tab2_2_2,tab2_3_1,tab2_3_2,tab2_3_3
				,tab3_table_garantee
				,tab4_1,tab4_2,tab4_3,tab4_4
				) 
				
			VALUES ($cif,$tab1_brn_code,$tab1_prov_code,'$ip','$computer_name','$today','$tab1_prov_name','$tab1_brn_name'
				,'$tab1_meet_no','$tab1_meet_date','$tab1_meet_month'
				,'$tab1_meet_year','$tab1_meet_full','$tab1_name','$tab1_age'
				,'$tab1_cid','$tab1_group','$tab1_em_name_tel','$tab1_status','$tab1_job','$tab1_income'
				,'$tab1_asset','$tab1_debt_servant'
				
				,'$tb_loan'
				,'$tab2_1_3','$tab2_1_4','$tab2_1_5','$tab2_2_1','$tab2_2_2','$tab2_3_1','$tab2_3_2','$tab2_3_3'
				,'$tb_garantee'
				,'$tab4_1','$tab4_2','$tab4_3','$tab4_4'
				)  "  ; 
					
$results =  $db->exec($sql) or die('exec failed');

echo "OK=";

 

?>