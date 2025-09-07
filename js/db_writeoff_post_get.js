function f_post_save(url,para,ask){		  
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var data = this.responseText ;
						data = data.trim() ;
						
						console.log("ผลการบันทึกข้อมูล : "+data) ;
						if (data.substring(0, 3) === 'OK='){
							    //var str = data.substring(3);
							    //console.log(str) ;
								if(ask === true){ 
										alert("บันทึกข้อมูล  เรียบร้อยแล้ว") ;
								}
								}else{
								console.log(data);
								alert("บันทึกข้อมูลไม่ได้ ตรวจสอบข้อมูลก่อนบันทึก") ;
						}						
					}
		};
		xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(para);
}

//==============================================
//   SEACH TABLE   SEACH TABLE   SEACH TABLE   SEACH TABLE
//============================================== 
function f_get_search(){
				var cif = document.getElementById("cif_search").innerText  ;					
				var url = "db/db_writeoff_search.php?cif=" + cif  ;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
										var data = xmlhttp.responseText  ;
										data = data.trim();
										if (data.substring(0, 3) !== "OK="){
														
														/*data = "<div style='color:red;'>" + data + "</div>" ;
														var myWindow = window.open("", "MsgWindow", "width=500,height=500");
														myWindow.document.write(data);
														return false ;
														*/
														alert(data) ;
														return false ;
														
										}	
										// รับค่ามาเป็น  JSON									
										data = data.substring(3);									
										const ws = JSON.parse(data);
										console.log(ws) ;
										f_parse_tab(ws) ;
										f_parse_table_loan(ws) ;
										f_tb_loan_sum('tb_loan'); // คำนวณผลรวม
										
										f_parse_table_garantee(ws);
										
							}
				};
				xmlhttp.open("GET", url , true);
				xmlhttp.send();
				
}

function f_parse_tab(ws){
		document.getElementById("tab1_brn_code").innerText  = (ws[0]['tab1_brn_code'] );
		 document.getElementById("tab1_prov_code").innerText  = (ws[0]['tab1_prov_code'] ) ;		 
		document.getElementById("tab1_prov_name").innerText  = f_set_str(ws[0]['tab1_prov_name'] );
		 document.getElementById("tab1_brn_name").innerText  = f_set_str(ws[0]['tab1_brn_name'] ) ;
		 document.getElementById("tab1_meet_no").innerText  = f_set_str(ws[0]['tab1_meet_no'] );
		 document.getElementById("tab1_meet_date").innerText  = f_set_str(ws[0]['tab1_meet_date'] );
		 document.getElementById("tab1_meet_month").innerText  = f_set_str(ws[0]['tab1_meet_month'] );
		 document.getElementById("tab1_meet_year").innerText  = f_set_str(ws[0]['tab1_meet_year'] );
		 document.getElementById("tab1_name").innerText  = f_set_str(ws[0]['tab1_name'] );
		 document.getElementById("tab1_age").innerText  = f_set_str(ws[0]['tab1_age'] );
		 document.getElementById("tab1_cid").innerText  = f_set_str(ws[0]['tab1_cid'] );
		 document.getElementById("tab1_group").innerText  = f_set_str(ws[0]['tab1_group'] );
		 document.getElementById("tab1_cif").innerText  = f_set_str(ws[0]['cif'] );
		 document.getElementById("tab1_em_name_tel").innerText  = f_set_str(ws[0]['tab1_em_name_tel'] );		 
		 document.getElementById("tab1_status").innerText  = f_set_str(ws[0]['tab1_status'] );
		 document.getElementById("tab1_debt_servant").innerText  = f_set_str(ws[0]['tab1_debt_servant'] );
		 document.getElementById("tab1_job").innerText  = f_set_str(ws[0]['tab1_job'] );
		 document.getElementById("tab1_income").innerText  = f_set_str(ws[0]['tab1_income'] );
		 document.getElementById("tab1_asset").innerText  = f_set_str(ws[0]['tab1_asset'] );		
		//
		document.getElementById("tab2_1_3").innerText  = f_set_str(ws[0]['tab2_1_3'] );
		 document.getElementById("tab2_1_4").innerText  = f_set_str(ws[0]['tab2_1_4'] );
		 document.getElementById("tab2_1_5").innerText  = f_set_str(ws[0]['tab2_1_5'] );
		 document.getElementById("tab2_2_1").innerText  = f_set_str(ws[0]['tab2_2_1'] );
		 document.getElementById("tab2_2_2").innerText  = f_set_str(ws[0]['tab2_2_2'] );
		 document.getElementById("tab2_3_1").innerText  = f_set_str(ws[0]['tab2_3_1'] );
		 document.getElementById("tab2_3_2").innerText  = f_set_str(ws[0]['tab2_3_2'] );
		 document.getElementById("tab2_3_3").innerText  = f_set_str(ws[0]['tab2_3_3'] );
		 //
		 document.getElementById("tab4_1").innerText  = f_set_str(ws[0]['tab4_1'] );
		 document.getElementById("tab4_2").innerText  = f_set_str(ws[0]['tab4_2'] ); 
		 document.getElementById("tab4_3").innerText  = f_set_str(ws[0]['tab4_3'] ); 
		 document.getElementById("tab4_4").innerText  = f_set_str(ws[0]['tab4_4'] ); 
 
}
 

 
//======================================================
//  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE  TABLE
//======================================================
//1|536138054318|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00||||||||18,000.00|20,005.01|19|ลบ|
//@2|536138888888|เงินทุนหมุนเวียน|โครงการปกติของธนาคาร|18$ม.ค.$2548|ลน.ร่วม,คนค้ำ|18,000.00||||||||10,000.00|10,005.02|19|ลบ|
//@xx|รวม||||||||||||||||||
function f_parse_table_loan(ws){
		f_table_delete_all_row('tb_loan') ; // ลบข้อมูลเก่าทั้งหมดก่อน
		var tb = document.getElementById("tb_loan") ;
		var str = ws[0]['tab1_table_loan'] ;
		var rows = str.split("@") ;
		for(var r=0; r < rows.length ;r++){
				if(rows[r].indexOf("|") !== -1){ 
							var cols =rows[r].split("|") ;		
							if(cols[0] !=="xx"){
									f_table_add_row('tb_loan',18);
									var irow = f_get_last_td('tb_loan') -1 ;
									for(var c=0 ; c < 100 ; c++){ 
											if(cols[c] == "ลบ") break ;
											tb.rows[irow].cells[c].innerText = f_set_str(cols[c]) ;   
									}
							}
				}
		}	
}

//===========================================
function f_parse_table_garantee(ws){
		f_table_delete_all_row('tb_garantee') ; // ลบข้อมูลเก่าทั้งหมดก่อน
		var tb = document.getElementById("tb_garantee") ;
		var str = ws[0]['tab3_table_garantee'] ;
		var rows = str.split("@") ;
		for(var r=0; r < rows.length ;r++){
				if(rows[r].indexOf("|") !== -1){ 
							var cols =rows[r].split("|") ;		
							//if(cols[0] !=="xx"){
									f_table_add_row('tb_garantee',17);
									var irow = f_get_last_td('tb_garantee') -1 ;
									for(var c=0 ; c < 100 ; c++){ 
											if(cols[c] == "ลบ") break ;
											tb.rows[irow].cells[c].innerText = f_set_str(cols[c]) ;   
									}
							//}	
				}				
		}	
}

//======================================================
// 
//======================================================
function  f_set_str(str) {
	 
	//console.log("typeof="+typeof (str)) ;
	if(typeof (str) == "number"){ 
			var str = str.toString();
	}
	str = str.trim() ;
	str = str.replaceAll("$" ," " );  // ช่องวาง  &nbsp;	
	str = str.replaceAll("#" ,"\n" );
	return str ;
}

 
