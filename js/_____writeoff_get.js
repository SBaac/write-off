
function f_memo_read(){
				var php = "memo_read.php" ;
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
										var data = this.responseText ;
										data = data.trim();
										var memo = document.getElementById("memo") ;
										//memo.innerHTML  = data ;
										//alert(data) ;
										 data = data.replaceAll('|','\n');  
										memo.innerText  = data ; 
													
							}  
				};
				xmlhttp.open("GET", php , true);
				xmlhttp.send();
						
}	