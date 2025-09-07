 // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// ========================= สาขา ============================
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

function f_user_ajax_search(){
				//document.getElementById("tab1_brn_code").innerText = "" ; 
				document.getElementById("tab1_prov_code").innerText = "" ; 
				document.getElementById("tab1_brn_name").innerText = "" ; 
				document.getElementById("tab1_prov_name").innerText = "" ; 
										
				var brn_code =  document.getElementById("tab1_brn_code"); 
				var sbrn = brn_code.innerText ;
				sbrn = sbrn.trim();
				if(sbrn === ""){
					alert("กรุณาระบุ รหัสสาขา");
					brn_code.focus();
					return false ;
					
				}
				var url = "db/db_writeoff_user_search.php?brn_code=" + sbrn  ;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
										var data = xmlhttp.responseText  ;
										data = data.trim();
										if (data.substring(0, 3) !== "OK="){
														alert(data) ;														
										}	
										// รับค่ามาเป็น  JSON									
										data = data.substring(3);									
										const ws = JSON.parse(data);
										console.log(ws) ;
										document.getElementById("tab1_brn_code").innerText = ws[0]['brn_code'] ; 
										document.getElementById("tab1_prov_code").innerText = ws[0]['prov_code'] ; 
										document.getElementById("tab1_brn_name").innerText = ws[0]['brn_name'] ; 
										document.getElementById("tab1_prov_name").innerText = ws[0]['prov_name'] ; 
							}
				};
				xmlhttp.open("GET", url , true);
				xmlhttp.send();
		
}

function f_user_ajax_save(){
				var brn_code =  document.getElementById("tab1_brn_code").innerText ; 
				var prov_code =  document.getElementById("tab1_prov_code").innerText ; 
				var brn_name =  document.getElementById("tab1_brn_name").innerText ; 
				var prov_name =  document.getElementById("tab1_prov_name").innerText ; 
				
				var str = "" ;
				if(prov_code.trim() === "")  str = str + "\n กรุณาระบุ : รหัส สนจ." ;
				if(brn_code.trim() === "")  str = str + "\n กรุณาระบุ : รหัส สาขา" ;				
				if(brn_name.trim() === "")  str = str + "\n กรุณาระบุ : ชื่อ สาขา" ;
				if(prov_name.trim() === "")  str = str + "\n กรุณาระบุ : ชื่อ สนจ." ;

				if(str !== ""){
						alert(str) ;
						return false ;					
				}
				var url = "db/db_writeoff_user_save.php?";
				url = url + "brn_code=" + brn_code.trim()  ;
				url = url + "&prov_code=" + prov_code.trim()  ;
				url = url + "&brn_name=" + brn_name.trim()  ;
				url = url + "&prov_name=" + prov_name.trim()  ;
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
										var data = xmlhttp.responseText  ;
										data = data.trim();
										//if (data.substring(0, 2) !== "OK"){
												alert(data) ;														
										//}																	
										
							}
				};
				xmlhttp.open("GET", url , true);
				xmlhttp.send();
		
}
