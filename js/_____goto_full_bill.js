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