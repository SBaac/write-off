
				
// keypress  ปุ่ม Alt ไม่ทำงาน				
document.addEventListener("keydown", function(event) {	
			//console.log(event.key) ;
			// ทดสอบตัวแปร
			/*
			 if(event.key === 'Alt'){
			}   
			// คืนค่าข้อความเดิม
			if(event.key === 'Escape'){
					event.preventDefault();
					//f_show_example_all();
					var e = event.target ;
					 if(e.tagName === "INPUT"){
								 e.value = strTmp ;
								}else{
								e.innerText = strTmp  ;
					 }
			
			}   
			*/
			// อักขระที่ไม่อนุญาตให้คีย์
			var  nokeys = ["@","&", "#", "|","$"];
			// เจออักขระที่ห้าม เพราะเวลาส่งค่าแบบ get จะมีปัญหา
			if(nokeys.includes(event.key)){
					//console.log("ห้ามอักขระ " + event.key) ;
					event.preventDefault();
			}
			//--------------------------------------------------------------------------
			// ตรวจสอบ Cell การกดคีย์ และ data-type
			//--------------------------------------------------------------------------
			var  e = event.target ;
			if ("type" in e.dataset) {  
					var type = e.dataset.type ;
					//-------------------------onerow----------------------------
					if( type.indexOf("onerow") > -1) {
								//event.preventDefault();
								handleInputFocusTransfer(event) ;
								//}else{ 
								// หลายบรรทัด ขึ้นบรรทัดใหม่โดย  shift+enter
								//if (event.keyCode == 13 && !event.shiftKey){
								//		handleInputFocusTransfer(event) ; // enter only
								//} 		
					}
					//------------------------comma number ไม่เอาคอมม่าและไม่ใช่ 0-9----------------------------
					if(( type.indexOf("comma") !== -1) || (type.indexOf("number") !== -1)){
								//console.log('จะทำการตรวจสอบตัวเลข') ;
								//alert(event.key) ;
								var nums = ['.','0','1','2','3','4','5','6','7','8','9','Delete','Backspace','ArrowLeft','ArrowRight','Enter'];  
								if(nums.includes(event.key)  ==  false){
												event.preventDefault();
								}
								// ตรวจสอบว่าเป็นตัวเลขหรือไม่เพราะ มีการคีย์จุดหลายอัน
								if(e.tagName === "INPUT"){
												var str = e.value;
												}else{
												var str = e.innerText;
								}
								// เจอแล้วไม่ใช่ตัวเลข
								str = str.replaceAll(",","")
								if(isNaN(str) === true){
												if(e.tagName === "INPUT"){
														e.value ="" ;
														}else{
														e.innerText = "" ;
												}
								}	
					}
						
			}
																
																
});

 // **************************************************************
// โฟกัสหลัง enter  ลูกศรบน ลูกศรล่าง
// https://dev.to/shubhamprakash/trap-focus-using-javascript-6a3
// ***************************************************************
//document.addEventListener('keydown',handleInputFocusTransfer);
function handleInputFocusTransfer(event){
			  const focusableInputElements= document.querySelectorAll(".edit");
			  //Creating an array from the node list
			  const focusable= [...focusableInputElements]; 
			  //get the index of current item
			  const index = focusable.indexOf(document.activeElement); 
			  // Create a variable to store the idex of next item to be focussed
			  let nextIndex = 0;
		 
				  
			  if (event.keyCode === 38) {
				// up arrow
				event.preventDefault();
				nextIndex= index > 0 ? index-1 : 0;
				focusableInputElements[nextIndex].focus();
			  }
			  else if ((event.key === "Enter" ) || (event.keyCode === 40))  {
				// down arrow
				event.preventDefault();
				nextIndex= index+1 < focusable.length ? index+1 : index;
				focusableInputElements[nextIndex].focus();
			  }
}


//*****************************************************
// change
//*****************************************************
document.addEventListener("keyup", function(event) {
			var  e = event.target ;
			if ("type" in e.dataset) {  
					var type = e.dataset.type ;
					//------------------------comma number ไม่เอาคอมม่าและไม่ใช่ 0-9----------------------------
					if(( type.indexOf("comma") !== -1) || (type.indexOf("number") !== -1)){
								//console.log('จะทำการตรวจสอบตัวเลข') ;
								var nums = ['.','0','1','2','3','4','5','6','7','8','9','Delete','Backspace'];  
								if(nums.includes(event.key)  ==  false){
												event.preventDefault();
								}
								// ตรวจสอบว่าเป็นตัวเลขหรือไม่เพราะ มีการคีย์จุดหลายอัน
								if(e.tagName === "INPUT"){
												var str = e.value;
												}else{
												var str = e.innerText;
								}
								// เจอแล้วไม่ใช่ตัวเลข
								if(isNaN(str) === true){
												if(e.tagName === "INPUT"){
														e.value ="" ;
														}else{
														e.innerText = "" ;
												}
								}	

					}						
			}		
});	



// ****************************************************************
// เซลล์  type = comma จะตรวจสอบ event  focus และ blur
// ****************************************************************

var  strTmp = "" ;	
document.addEventListener('focus',function(event){
		     var e = event.target ;
			 
			 if(e.tagName === "INPUT"){
						strTmp = e.value;
						}else{
						strTmp = e.innerText;
			}
								
								
			//console.log(e.tagName) ;
			if ("type" in e.dataset) {  
					var type = e.dataset.type ;
					if(  type.indexOf("comma") !== -1)  {
								
								if(e.tagName === "INPUT"){
												var str = e.value;
												}else{
												var str = e.innerText;
								}
								str = str.replaceAll(",",""); // ไม่เอาคอมม่า
								if(e.tagName === "INPUT"){
														e.value = str ;
														}else{
														e.innerText = str ;
								}
					}		
			}	
}, true);

		
 document.addEventListener('blur',function(event){
		     var e = event.target ;
			if ("type" in e.dataset) {  
					var type = e.dataset.type ;
					if(  type.indexOf("comma") !== -1)  {
								// ตรวจสอบว่าเป็นตัวเลขหรือไม่เพราะ มีการคีย์จุดหลายอัน
								if(e.tagName === "INPUT"){
												var str = e.value;
												}else{
												var str = e.innerText;
								}
								str = str.trim();
								if(str !== ""){ 
											var num = fEventAddComma(str)  ;	
											if(e.tagName === "INPUT"){
															e.value = num ;
															}else{
															e.innerText = num ;
											}
								}
								
					}		
			}	
}, true);

// คอมม่า
function fEventAddComma(str)	{
				str = str.toString();
				str = str.replace(",","");
				//var str = str.toLocaleString("en-US") ;  // .toString() ;
				var num =parseFloat(str) + 0.00;
				num = num.toFixed(2)  ;
				var str = num.toString();
				str += '';
				x = str.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
}
 

/*
window.addEventListener('beforeunload', function (e) {
          e.preventDefault();
		return (e.returnValue =  'ต้องการออกจากโปรแกรม ?') ;
});
*/
    
