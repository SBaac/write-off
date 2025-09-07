function f_save_data(ask){
			// ตรวจสอบ CIF
			var cif = document.getElementById("tab1_cif").innerText;			
			cif = cif.trim();
			if (cif === "") {
					alert("กรุณาระบุ CIF") ;
					var tab  = document.getElementById('tab1'); 
					f_tab(tab) ; 	
					document.getElementById("tab1_cif").focus();				
					return false ;
			}	
			// ตรวจสอบ รหัสสาขา
			var  tab1_brn_code = document.getElementById("tab1_brn_code").innerText;
			tab1_brn_code = tab1_brn_code.trim();
			if (tab1_brn_code  === "") {
					alert("กรุณาระบุ รหัสสาขา") ;
					var tab  = document.getElementById('tab1'); 
					f_tab(tab) ; 	
					document.getElementById("tab1_brn_code").focus();				
					return false ;
			}	
			var user = document.getElementById("user").innerText;
			if(ask === true){ 
						if (cif ==="555"){
								if( user  !== "ADMIN"){ 
									alert("- - - - - - - -ไม่บันทึก - - - - - -\n CIF : 555 บันทึกเฉพาะ ADMIN") ; 
									return false ;									
								}	
						} 
						 if (confirm("- - - - - - - - - - - - - - - - - - - - - - - - - -\n ต้องการ บันทึกข้อมูล หรือไม่ ? ")) {
								// continue
								} else {
								return  false ;  
						}
			}
			var para = f_get_para() ;
			console.log(para) ;
			var url = "db/db_writeoff_save.php" ;
			para = "cif=" + cif  + "&" + para ;
			para = para + "&ip=" + document.getElementById('span_ip').innerText   ;
		
			if (user == "ADMIN"){
				   f_post_save(url,para,ask);
				   return true ;	
			}
			if(cif !== "555"){
				   f_post_save(url,para,ask);					
			}
}



function f_clear(){
	alert("clear กำลังทำ") ;
}
function  f_get_para(){

	// ค้นหาบางส่วนของ id  คีย์เวิร์ด Find elements using part of ID
	var  ids =  document.querySelectorAll("[id^='tab']"); 
	var str = "" ;
	for(var i=0;i<ids.length;i++){
		var e = ids[i] ;
		var id =  e.id ;
		if(id.indexOf("_") > -1){ 
					if (e.tagName =="INPUT"){
						var tmp = e.value  ;
						}else{
						var tmp = e.innerText  ;						
					}					
					tmp = f_get_str_to_var(tmp);
					if(str ==""){
							str = str + id + "=" + tmp ;
							}else{ 
							str = str + "\n" +id + "=" +tmp ;
					}
		}
	}
	
	str = str + "\n" +  f_get_table('tb_loan') ;
	str = str + "\n" +  f_get_table('tb_garantee') ;
	
	console.log(str) ;
	
	str = str.replaceAll("\n","&");
	str = str.replaceAll("&&","&");
	str = str.replaceAll("&&","&");
			
	return str ;
}


function f_get_table(tb_id){
	var tb = document.getElementById(tb_id);
	var str = "" ;
	for(var r =0 ; r  < tb.rows.length ;r++){
		  var row = tb.rows[r]  ;
		  var tmp = "" ;
		  if( row.cells[0].tagName =="TD"){ 
					  for(var c =0 ;c < row.cells.length ; c++){
								var cell = row.cells[c] ;
								var val = cell.innerText ;
								val = f_get_str_to_var(val) ;								
								tmp = tmp + val  + "|"  ;   
								var n = parseFloat(cell.colSpan) -1 ;
								if(n  > 1){ 
										for(var i=0 ; i<n;i++){
												tmp = tmp +  "|"  ; 
										} 
								}
					   } 		  
					   if (str == ""){
								str =   tmp ;
								}else{ 
								str = str + "@" + tmp ;
					   }
		   }
	}	
	str = "\n" +  tb_id + "=" +  str + "\n" ;
	return str ;
}

 

// จาก b_move JS เตรียมตัวแปร     read.php แปลงกลับก่อนส่งกลับเป็น jason
 function  f_get_str_to_var(str) {
	str = str.trim() ;
	str = str.replace(/\n/g,"#");  //newline
	//str = str.replace(/;/g,",");  // replace all
	str = str.replace(/=/g,";"); 
	str = str.replace("'","");  // ไม่เอาฟันหนูขีดเดียว  
	str = str.replace(/\"/g,"");  //ฟันหนูสองชีด
	str = str.replaceAll("$","");   
	str = str.replaceAll("&","");
	str = str.replaceAll(" ","$");  // ช่องวาง  &nbsp;
	str = str.replaceAll( / /g,"$");  // space
	str = str.replaceAll("|"," ");   
	//if (str == "0")   str = "-" ;
	//if (str == "0.00")   str = "-" ;
	
	str  =str.trim(); 	
	return str ;
}




// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// ============== จาก  MEMO MEMO MEMO MEMO  ====================
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

function f_memo_ajax_save(){
		
		var cif =  document.getElementById("save_cif").innerHTML;
		var  memo = document.getElementById("div_memo");
		var memo_text = f_text_to_var(memo.innerText) ;

		var   pmeters  =  "cif="  + cif ;
		pmeters = pmeters +   "&memo="+ memo_text  ;
		
		console.log(pmeters);
		
		document.getElementById("div_save_memo").style.display = "none"; 
		//memo.innerHTML = "Loading..." ;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var data = this.responseText ;
						data = data.trim() ;

						console.log(data);

						if(data == "OK"){
							var tb = document.getElementById("customers");
							//tb.rows[g_last_row].cells[24].innerText = memo_text ;
							const tr_cif_names= document.getElementsByName("tr_cif_names_" + cif);
							for (let i = 0; i < tr_cif_names.length; i++) {
									tr_cif_names[i].dataset.memo = memo_text ; // ปรับปรุง memo ในตาราง  ;
									var td_no = tr_cif_names[i].cells[2] ;
									var no = td_no.innerText ;
									no = no.trim();
									if(no !== ""){ 
											no = no.replaceAll("*","");
											if(memo_text !== ""){  
													no = "*" + no ;
											}
											td_no.innerText = no ;
									}
							}
							//alert("บันทึกเรียบร้อยแล้ว");
							document.getElementById("spn_mk_name").innerHTML = "บันทึกโน๊ต แล้ว" ;
							}else{
							alert("===== บันทึก โน๊ต ไม่ได้ =====");
						}
						
					}
        };
        xmlhttp.open("POST","loan/save_memo.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(pmeters);

}
 

 