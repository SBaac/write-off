<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok'); 

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'  />
<meta http-equiv='cache-control' content='no-cache' />
<meta http-equiv='expires' content='0' />
<meta http-equiv='pragma' content='no-cache' />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
<title>WRITE OFF : Report</title>

<!--link rel="stylesheet" href="report.css?cash=<?php echo  date("Y-m-d H:i:s");?>"  -->

<link rel="stylesheet" href="../css/main.css?cash=<?php echo  date("Y-m-d H:i:s");?>">
<link rel="stylesheet" href="../css/table_fix.css?cash=<?php echo  date("Y-m-d H:i:s");?>" >
</head>
<body style="position:relative;left:10px;width:98vw;" >

<div >
<h2 id="head">ระบบรายงาน WRITE OFF</h2>
</div>
<?php
include("ip.php");
$ip =  f_get_ip();
echo "your ip " . $ip;
 
?>
<hr  class="hr_shadow">


<div  class="row" >
			 <div id="div_prov"  class="column"  >
			</div>
			<div  id="div_brn" class="column">					 
			</div>
			<div  id="div_ip" class="column" style="width:70vw;">
			</div>
</div>
 	
			
<script>

var  tr_prov = document.getElementById('head') ;
var  tr_brn = document.getElementById('head') ;
var  tr_ip = document.getElementById('head') ;

document.addEventListener('click',function(event){
		     var e = event.target ;
			//console.log(e.tagName) ; 
			 if(e.tagName === "TD"){
						var id = e.parentNode.parentNode.parentNode.id ;
						var parent  = e.parentNode ;
						if(id=="tb_prov"){
							tr_prov.removeAttribute("class") ;
							parent.setAttribute("class","tr_focus_yellow");
							tr_prov = parent ;
						} 
						if(id=="tb_brn"){
							tr_brn.removeAttribute("class") ;
							parent.setAttribute("class","tr_focus_yellow");
							tr_brn = parent ;
						} 
						if(id=="tb_ip"){
							tr_ip.removeAttribute("class") ;
							parent.setAttribute("class","tr_focus_yellow");
							tr_ip = parent ;
						} 
	  
			}
}, true);
			
//======================START==================

f_ajax('report_prov.php','div_prov');

function  f_ajax(url,div_id){
			var  e = document.getElementById(div_id)  ;
			if(div_id !== 'div_ip'){
						document.getElementById('div_ip').innerHTML = "" ;
				
			}
			
			//document.getElementById("div_brn").innerHTML = "" ;
			e.innerHTML = "Loading...";
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
							var data = xhttp.responseText  ;
							 e.innerHTML = data ;
					 
				}
			};
			xhttp.open("GET",url, true);
			xhttp.send();
}

 


 function  f_ajax_del(e,id){
			alert("????") ;
			return false ;
			
			var  e =  e.parentNode  ;
			e.innerHTML = "Loading...";
			var url = "report_del.php?id=" + id ;
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
							var data = xhttp.responseText  ;
							 e.innerHTML = data ;
					 
				}
			};
			xhttp.open("GET",url, true);
			xhttp.send();
}

</script>

</body>
