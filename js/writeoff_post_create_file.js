// ต้องมีการ save ไฟล์มาแล้ว

function f_word(){
			var cif = document.getElementById("tab1_cif").innerText;
			cif = cif.trim();
			if (cif ==="") {
				alert("กรุณาระบุ CIF") ;
				var tab  = document.getElementById('tab1'); 
				f_tab(tab) ; 	
				document.getElementById("tab1_cif").focus();				
				return false ;
			}
			var url = "PHPWord/kisda_project/create_word.php" ;
			f_post_save_and_create_file(url) ;
			
}

function f_ppt(){
			var cif = document.getElementById("tab1_cif").innerText;
			cif = cif.trim();
			if (cif ==="") {
				alert("กรุณาระบุ CIF") ;
				var tab  = document.getElementById('tab1'); 
				f_tab(tab) ;
				document.getElementById("tab1_cif").focus();
				return false ;
			}
			var url = "ppt_xml/ppt_from_xml.php" ;
			
			f_post_save_and_create_file(url) ;
			
			
}


function f_post_save_and_create_file(url){	

		f_save_data(false); 
		
		var cif = document.getElementById("tab1_cif").innerText;			
		cif = cif.trim();
		var para = f_get_para() ;
		para = f_cler_zero(para) ;
		para = "cif=" + cif  + "&" + para ;
		para = para + "&ip=" + document.getElementById('span_ip').innerText   ;
		console.log(para) ;
		
		//document.getElementById("div_save_memo").style.display = "none"; 
		//memo.innerHTML = "Loading..." ;
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						var data = this.responseText ;
						data = data.trim() ;
						console.log(data) ;
						if (data.substring(0, 3) === 'OK='){
									//"OK=PHPWord/out/". $cif.".docx";
							     var url_file = data.substring(3);
								var urls =  url_file.split("/")  ;
								var cif = urls[2] ;
								 f_download_file(cif,url_file) ;
								}else{
								alert("===== สร้างไฟล์ไม่ได้ =====");
						}
						
					}
		};
		xmlhttp.open("POST",url,true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(para);

}

function  f_cler_zero(str){
	     for(var  i = 0 ; i<100;i++){ 
				str = str.replace("|0|","|-|") ;
				str = str.replace("|0.00|","|-|") ;
		 }
		return str ;
}


function f_download_file(cif,url_file) {
		  const link = document.createElement("a");
		  link.href = url_file ;
		  link.download = cif ;
		  link.click();
	       
		   var url = "delete_file.php?delfile=" +  url_file   ;
		  // f_delete_file(url) ; // หากลบไฟล์ บางครั้งผู้ใช้ค้างจอไม่คลิกดาวน์โหลด จะทำให้ไฟล์ถูกลบก่อน
  
}




function f_delete_file_xxxxx(url){	
	
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
										var data = xmlhttp.responseText  ;
										data = data.trim();
										if (data.substring(0, 3) !== "OK="){														
														data = "<div style='color:red;'>" + data + "</div>" ;
														var myWindow = window.open("", "MsgWindow", "width=500,height=500");
														myWindow.document.write(data);
														return false ;
														}else{
														//alert("") ;
										}
							}
				};
				xmlhttp.open("GET", url , true);
				xmlhttp.send();
				
				
}




