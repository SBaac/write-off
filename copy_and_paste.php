 <?php
 
// ***************************************************************
// Author      : Kisda
// Version     : 1.0
// Copyright (C)  : Batman Team
// Description :  MOVE  INSERT  TABLE
// ***************************************************************

header("Content-Type: text/html; charset=utf-8");

?>
<div   class="row"
		style="background-color: Cyan ;
				position:relative;top:0px;
				border: solid 1px rgba(0, 0, 0, 0.5);
				border-collapse: collapse;
				padding-top: 10px;
				padding-left: 10px;
			     padding-right: 5px;
			     padding-bottom: 18px;
			     box-shadow : 0 1px 3px 0 rgba(0,0,0,0.2),0 3px 5px 0 rgba(0,0,0,0.19) !important  ;"
  > 
  
  				<div class="column"  style = "border-right : 1px dashed gray;">										
										<div>
												<span class="box" style="position:relative;">1</span>
										</div>
										<div style="position:relative;top:-20px;left:0px;">
												<button 
												onclick="window.open('https://iris.app.baac.or.th/sps0008/', '_onepage');"
												style="height:60px;width:150px;padding:5px;">
																	<img src="imgs/search.png">
																	<br>
																	เปิดหน้าเว็บบริหารสาขา
												</button>
										</div>
	
										<div style="position:relative;top:-10px;font-size:12px;">
												 ที่บริหารสาขา
									 <br>- - - - - - - - - - - - - - - - - 
									 <br>1.คลิกแท็บเงินกู้
									 <br>2.คลิกรายสัญญา
									  <br> &nbsp;  &nbsp; -> รหัส CIF 
									   <br> &nbsp; &nbsp; -> พิมพ์ CIF ที่ต้องการ 
									 <br>3.คลิกตกลง
									 <br>4.คลิกพิมพ์เชคหนี้เงินกู้ฉบับเต็ม
									  <br>- - - - - - - - - - - - - - - - - 
									 <br>5.ติ๊กทุกรายการ -> คลิกตกลง
									 <br>6.Ctrl+A  -> Ctrl+C
										</div>
							
							
				</div>
  
				<div class="column" >
						<span class="box" style="position:relative;">2</span>
  						วางขัอความ (Ctrl+V)<br>
						<div style="position:relative;top:15px;">
								<textarea class="edit" 
											style="position:relative;width:150px;height:200px;resize: none;font-size:10px; "
											id="txt_ln" 
											onclick="this.value='';" 
											onkeyup="this.blur();f_paste();"
											>  
								</textarea>  
						</div>	
				</div>
</div>

<script>
function f_goto(){ 
									var lst_div = document.getElementById('lst_div').value ;
									var txt_cif = document.getElementById('txt_cif').value ;
									txt_cif = txt_cif.trim();
									document.getElementById('txt_cif').value= txt_cif ;
									if(txt_cif ==""){
											alert("กรุณาระบุ CIF");
											return false;
									}
									//var url = "http://ow/sps0008/sps0008_main_bill001_full.php?ACN%3D" + txt_cif + "%26dCid%3D%26dfullName%3D%26dmkCode%3D%26dBrcode%3D427%26dDiv%3D" + lst_div ;
									//window.open(url);
									f_open_full_bill(lst_div,txt_cif) ;
									
}		
							
function  f_open_full_bill(div,cif){
										var url = window.location.href;
										if (url.indexOf("it.baac.or.th") !== -1){ 
												// tablet
												var my_url ="http://ow.it.baac.or.th/sps0008/sps0008_main_bill001_fullList.php";
												var  chk_print =  document.getElementById('chk_print');
												chk_print.checked = false ;
												}else{  
												var my_url ="http://ow/sps0008/sps0008_main_bill001_fullList.php";
										}
										 
										 // construct a form with hidden inputs, targeting the iframe
											  var form = document.createElement("form");
											  form.target = "blank" ;    // uniqueString;
											  form.action = my_url ;
											  form.method = "POST";

											  // repeat for each parameter
											  
											  var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "dDiv";
											  input.value = div ;  // "04"
											  form.appendChild(input);
											  
											  var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "acn"; // CIF
											  input.value = cif ; // "16192149"
											  form.appendChild(input);
												
												 var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "cid";  // เลขบัตร ?
											  input.value = "0";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "colOwner"; // By Collateral Owner
											  input.value = "0";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "colCust"; // By Customer
											  input.value = "0";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "colLimit"; // By Limit
											  input.value = "1";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "credit";
											  input.value = "1";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "colCustomer";
											  input.value = "1";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "repDue";
											  input.value = "1";
											  form.appendChild(input);
											  
											   var input = document.createElement("input");
											  input.type = "hidden";
											  input.name = "dBrcode";
											  input.value = "0000"; // 427
											  form.appendChild(input);
											  
											 
										       // end parameter		
												
											  //document.body.appendChild(form);
											  document.body.appendChild(form);
											  form.submit();
								
								
	}
							

function f_paste(){

				//document.getElementById('div_report').focus() ;
				
				f_table_delete_all_row("tb_loan");
		
				document.getElementById('txt_ln') ;
				var e = document.getElementById('txt_ln') ;
				var str = e.value + "batman"; //
				
				if((str.indexOf("Account Summary") === -1) || (str.indexOf("ข้อมูลเงินกู้ ณ:") === -1) ){
					alert("ไม่ใช้ข้อมูล  Account Summary จากบริหารสาขา") ;
					return false ;					
				}
			 
				
				var  str = str.trim();
				const  space = String.fromCharCode(32) ;
				const  tab = String.fromCharCode(9) ;
				  
				 
				str = str.replaceAll(tab,"#");
			    document.getElementById('tab1_prov_name').innerHTML = f_split(str,"สำนักงาน ธ.ก.ส.จังหวัด","##สาขา") ;
				document.getElementById('tab1_brn_name').innerHTML = f_split(str,"##สาขา","#หน่วย") ;
				document.getElementById("tab1_group").innerHTML = f_split(str,"กลุ่มลูกค้า:#","#####ชั้นลูกค้า") ;
				
				document.getElementById("tab1_cif").innerHTML = f_split(str,"\nCIF:#","#กลุ่มลูกค้า") ;
				document.getElementById("tab1_name").innerHTML = f_split(str,"ชื่อ-นามสกุล:#","#เลขประจำตัวประชาชน") ;
				document.getElementById("tab1_cid").innerHTML = f_split(str,"เลขประจำตัวประชาชน:#","#####System Date") ;
				document.getElementById("tab1_age").innerHTML = "" ;
				
				f_get_table_ln(str) ;

}
 
function f_split(str,x,y){
		var  temp = str ;
		if(temp.indexOf(x)  == -1 ) return "" ;   
		var A = temp.split(x);
		var temp = A[1] ;
		
		if(temp.indexOf(y)  == -1 ) return "" ;
		var  A = temp.split(y);
		var str = A[0] ;
		return  str.trim() ;
}

function f_get_table_ln(str){
		console.log(str) ;
		var tb = document.getElementById("tb_loan") ;
		f_table_delete_all_row("tb_loan");
		
		if (str.indexOf("printer_s ") == -1){
			alert("พิมพ์เช็คหนี้เงินกู้รายคน ฉบับเต็ม : ไม่ได้ติ๊กทุกรายการ");			
			document.getElementById("txt_ln").value = "" ;
			document.getElementById("txt_ln").focus() ;
			return false ;
		}
		var  str_table =	f_split(str,"งวดชำระถัดไป","printer_s ") ;
		//console.log("================ ไฟล์ copy_and_paste.php f_get_table_ln(str) ================") ;
		//console.log(str_table) ;
		var  lines = str_table.split(/\n/g) ;
		var iStartRow = 3 ;
		for(var i = 0 ; i < lines.length   ; i++){  // ไม่เอาบรรทัดสุดท้าย
						var line = lines[i];
						line =line.trim();
						var cols = line.split("#") ; 					
						
						if(line.indexOf("#####") !== -1){
								}else{ 
								f_table_add_row('tb_loan',18);
								tb.rows[i+iStartRow].cells[1].innerText = cols[0]; 
								tb.rows[i+iStartRow].cells[2].innerText = f_get_product(cols[1]);
								tb.rows[i+iStartRow].cells[3].innerText = f_get_product(cols[2]);
								
								tb.rows[i+iStartRow].cells[4].innerText = cols[12]; 
								// หลักประกัน
								tb.rows[i+iStartRow].cells[6].innerText = cols[3];  // ต้นเงินเดิม
								tb.rows[i+iStartRow].cells[14].innerText = cols[4];  // ต้นเงินคงเหลือ
								tb.rows[i+iStartRow].cells[15].innerText = cols[7];  // ต้นเงินคงเหลือ
						}
		}
}

function f_get_product(str){
	if(str.indexOf("-") == -1) return str ;
	var  cols = str.split("-") ;
	str = cols[1].trim();
	return str ;
	
	
}

</script>