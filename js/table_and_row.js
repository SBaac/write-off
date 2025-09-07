

// ***********************************************************
// ADD ROW
// ***********************************************************

function f_table_add_row(tb_id,iColsLength){		
		var tb = document.getElementById(tb_id);
		
		var  iLastTd =   f_get_last_td(tb_id) ;  // ค้นหาบรรทัดสุดท้ายที่เป็นตัวเลข
		var  r = tb.insertRow(iLastTd);
		r.style.backgroundColor = "rgb(229, 229, 229)" ; 
		
		var cell = r.insertCell(0);

		cell.innerHTML =  "" ; 
		cell.style.textAlign = "center";

		for (var c = 1; c <  iColsLength  ; c++){
						cell = r.insertCell(c);						
						//cell.style.textWrap = "nowrap" ;						
						cell.style.width = tb.rows[iLastTd].cells[c].offsetWidth + "px" ;
						if ((c ==1) && (tb_id == "tb_garantee")){
									cell.style.fontSize="18px";
									cell.style.fontWeight="bold";
							
						}
		}
		var firstcell = tb.rows[0] ;
		var colsLeft = firstcell.dataset.colsLeft.split(",") ;
		var colsRight = firstcell.dataset.colsRight.split(",") ;		
		var colsCenter = firstcell.dataset.colsCenter.split(",") ;		
		var colsNotEdit = firstcell.dataset.colsNotEdit.split(",") ; 
		//-----ไว้สร้างdataset.typeต้องมี3รายการ------
		var colsOnerow = firstcell.dataset.colsOnerow.split(",") ;
		var colsNumber = firstcell.dataset.colsNumber.split(",") ;
		var colsComma = firstcell.dataset.colsComma.split(",") ;
		
		for (var n = 1 ; n < iColsLength-1 ; n++){
					var cell =	tb.rows[iLastTd].cells[n] ;
					if(colsNotEdit.includes(n.toString() )) { 
								//cell.style.backgroundColor = "rgb(229, 229, 229);" ;
								}else{
								cell.setAttribute("class", "edit");
								cell.setAttribute("contenteditable", "");
								if(tb_id =="tb_loan"){ 
										cell.setAttribute("onkeyup", "f_tb_loan_sum('" + tb_id + "');");	
								}					
					} 
					
					if(colsLeft.includes(n.toString() ))  cell.style.textAlign = "left";
					if(colsRight.includes(n.toString()))  cell.style.textAlign = "right";
					if(colsCenter.includes(n.toString() )) cell.style.textAlign = "center";	
					// -----ไว้สร้างdataset.typeต้องมี3รายการ------ในเซลล์edit
					
					var type = "-" ;
					if(colsOnerow.includes(n.toString() )){
								type = type + "-onerow"  ;
								}else{ 
								// https://developer.mozilla.org/en-US/docs/Web/CSS/text-wrap
								cell.style.textWrap="balance";	
					}
					if(colsNumber.includes(n.toString() )) type = type + "-number" ;
					if(colsComma.includes(n.toString() )) type = type + "-comma" ;
					cell.dataset.type = type ;
		}	
		
		var cell =	tb.rows[iLastTd].cells[iColsLength-1] ; // save
		cell.style.textAlign = "center";
		cell.innerHTML = "<a onclick=\"f_table_delete_row('" + tb_id + "'," + iLastTd.toString() + ");\">ลบ</a>" ;
		
		f_run_no(tb_id) ;
		
		if(tb.id =="tb_loan"){
				f_tb_loan_sum(tb.id)
		}

}

 
// ********************************************************************
//  ลบ บรรทัด
// ********************************************************************
function  f_table_delete_all_row(tb_id){
		var tb = document.getElementById(tb_id) ;
		var col = "" ;
		 for (var r =  0 ;  r <  tb.rows.length   ; r ++){	
					// alert("r=" +r + "\n" + tb.rows[r].cells[0].tagName + "\n" + tb.rows[r].cells[0].innerText ) ;
					if(tb.rows[r].cells[0].tagName ==="TD"){ 
							if(tb.rows[r].cells[0].innerText !=="xx"){ 
									if(col === ""){
										col = r ;
										}else{ 
										col =  r + "," + col  ;
									}
							}
					}
		 }
		 // เริ่มลบ 
		 col = col + "," ;
		var cols = col.split(",") ;  //  5,4,3,2,1
		for (var i = 0 ; i < cols.length ; i++){
					if(cols[i] !==""){ 
						tb.deleteRow(parseFloat(cols[i]));
					}
		}

}	

function f_table_delete_row(tb_id,irow){	
		var tb = document.getElementById(tb_id); 
		tb.deleteRow(irow);
		f_run_no(tb_id);
}	


function f_run_no(tb_id){
	var tb = document.getElementById(tb_id); 
	var n = 0 ;
	for (var r = 0 ; r <  tb.rows.length   ; r++){
			var row = tb.rows[r] ;
			if(row.cells[0].tagName ==="TD"){ 
					//if( ! isNaN(row.cells[0].innerText) ){  
					if(row.cells[0].innerText !== "xx") { 	
							n++;
							row.cells[0].innerText = n  ;
							row.cells[row.cells.length-1].innerHTML = "<a onclick=\"f_table_delete_row('" + tb_id + "'," + r + ");\">ลบ</a>" ;
					}
			}
	}
} 

function f_get_last_th(tb_id){
var tb = document.getElementById(tb_id); 
	var n = 0 ;
	for (var r = 0 ; r <  tb.rows.length   ; r++){
			var row = tb.rows[r] ;
			if(row.cells[0].tagName == "TH"){ 			 
					n++;					
			}
	}
	alert(n) ;
	return n ;
}

function f_get_first_td(tb_id){
	var tb = document.getElementById(tb_id); 
	var n = 0 ;
	for (var r = 0 ; r <  tb.rows.length   ; r++){
			var row = tb.rows[r] ;
			if(row.cells[0].tagName == "TH"){ 
					n++ ;
					}else{
					break ;
			}
	}
	return n ;
}   
 
function f_get_last_td(tb_id){
	var tb = document.getElementById(tb_id); 
	var n = 0 ;
	for (var r = 0 ; r <  tb.rows.length   ; r++){
			var row = tb.rows[r] ;
			if(row.cells[0].tagName == "TH"){ 
					n++ ;
			}
			if(row.cells[0].tagName == "TD"){ 
					if( ! isNaN(row.cells[0].innerText)) {  
							n++;					
					}
			}
	}
	return n ;
}  
 
 function f_count_data_row(tb_id){
			var tb = document.getElementById(tb_id); 
			var n = 0 ;
			for (var r = 0 ; r <  tb.rows.length   ; r++){
					var row = tb.rows[r] ;
					if(row.cells[0].tagName == "TD"){ 
						if( ! isNaN(row.cells[0].innerText)) {  
							n++;					
							}
					}
				}
				return n ;
 
 }
 
// ********************************************************************
//  คำนวณผลรวมตาราง หนี้
// ********************************************************************
//data-cols-sum="8=6+7,12=9+10+11"   สูตรผลรวมของคอลัมน์ 
//data-cols-num="5,6,7,8,9,10,11,12,13,14"   บรรทัด xx แสดงผลรวมแต่ละคอลัมน์

function  f_tb_loan_sum(tb_id){
			f_tb_loan_sum_col(tb_id) ;
			f_tb_loan_sum_row(tb_id) ;	
}


function f_tb_loan_sum_col(tb_id){
		var tb = document.getElementById(tb_id);
		for (var r = 0 ; r <  tb.rows.length   ; r++){
				var row = tb.rows[r] ;
				// เฉพาะบรรทัดที่ คอลัมน์แรกเป็นตัวเลข
				if((row.cells[0].innerText !=="") && (row.cells[0].tagName =="TD") ){ 
						if( ! isNaN(row.cells[0].innerText) ){  
								// สูตร ตารางหนี้
								row.cells[9].innerText =  fGetNum(row.cells[7].innerText)  +  fGetNum(row.cells[8].innerText)  ;
								row.cells[13].innerText =  fGetNum(row.cells[10].innerText)  
															+ fGetNum(row.cells[11].innerText)  
															+  fGetNum(row.cells[12].innerText)  ;
								// comma							
								row.cells[9].innerText = fEventAddComma(row.cells[9].innerText);
								row.cells[13].innerText = fEventAddComma(row.cells[13].innerText);								
						}
				}
		}
}

function f_tb_loan_sum_row(tb_id){
	    var tb = document.getElementById(tb_id);
	    var rows  = tb.rows.length  ;	

		if  (rows <  5 )  return false ;
		
		let sums = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
		let iyearmax = 0 ;
	    for (var r = 3 ; r < rows - 1 ; r++ ){
			for(var c=6 ; c < 16 ; c++){
				var val = fGetNum(tb.rows[r].cells[c].innerText) ;
				sums[c] = sums[c] + val ;				
			}			
			var iyear = fGetNum(tb.rows[r].cells[16].innerText) ;
			if(iyear > iyearmax)  iyearmax = iyear ;
		} 


	   console.log(sums) ;
	   for(var c=6 ; c < 16 ; c++){
				tb.rows[r].cells[c-4].innerText = fEventAddComma(sums[c]) ; //
	   }
	   
	   document.getElementById('tab1_npl_year').innerText = iyearmax ;
} 


function fGetNum(str){
	if(str  == "")  str="0" ;
	str = str.replace(",","") ;
	var val = parseFloat(str) ;
	return val ;	
}

 
