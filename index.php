 <?php
 // WRITE OFF WRITE OFF WRITE OFF WRITE OFF WRITE OFF WRITE OFF
session_start();
ob_start();

header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('Asia/Bangkok'); 

//f_commigsoon();
function f_commigsoon(){  
			echo "<div style='position:relative ; top:100px; left:100px;font-size:22px;font-family:Tahoma;color:black;font-weight:bold; '>
						ระบบ ช่วยสร้างไฟล์เอกสาร ตัดหนี้สูญ  
					<hr>
					<div style='width:55vw;'>
							<marquee direction='left'>
									<span style='color:red;font-weight:normal;'>
											กำลังปรับปรุงข้อมูล . . .
									</span>
							</marquee>
					</div>
				</div>";
			exit() ;
}


 
 if (!isset($_SESSION["SSwriteoff_cif"])){ 
			/*
			include("login_key.php");
			exit();
			}else{ 
			if($_SESSION["SSmove_prov_id"]  == ""){ 
					include("login_key.php");
					exit();
			}
			*/
}

?>

<!DOCTYPE html>
<html >
      <head>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8'  />
              <meta http-equiv='cache-control' content='no-cache' />
              <meta http-equiv='expires' content='0' />
              <meta http-equiv='pragma' content='no-cache' />
			  <meta name="viewport" content="width=device-width, initial-scale=1">

              <title> WRITE OFF </title>
			 <link rel="shortcut icon" href="#">
			  <link rel="stylesheet" href="css/main.css?cash=<?php echo  date("Y-m-d H:i:s");?>" >
			  <link rel="stylesheet" href="css/table_fix.css?cash=<?php echo  date("Y-m-d H:i:s");?>" >

			<!--------------------------------events และการกดคีย์-------------------------------------------->

			<script src="js/data.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/data_user.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/events_and_key.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/example.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/table_and_row.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/writeoff_post_create_file.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script>
			<script src="js/db_writeoff_post_get.js?cash=<?php echo  date("Y-m-d H:i:s");?>"  type="text/javascript"></script> 


 <style>

.topnav {
		  width:100vw;
		  z-index:99;
		  overflow: hidden;
		  background-color: #262626 ;  /*  #162458   #333333  #3C3C3C*/  
		  position:sticky;
		 top:0px;    /*  top=0 จะทำให้ตรึงเมนู */
		  right:0px;
		  padding : 0px  10px;
		  /*box-shadow : 0 1px 2px 0 rgba(0,0,0,0.2),0 2px 4px 0 rgba(0,0,0,0.19);*/
		  box-shadow : 0 1px 3px 0 rgba(0,0,0,0.2),0 3px 5px 0 rgba(0,0,0,0.39) !important  ;
		  height:100%;
		 
}

.topnav a {
		  float: left;
		  color: white ; /*#f2f2f2*/
		  padding: 10px 16px;
		  text-decoration: none;
		  font-size: 13px;
		  text-align:center ;
		  height:85px;
}
.topnav a:hover {
		  background-color: #595959 ; /*   Turquoise*/
		  color: white;
		  box-shadow : 0 1px 3px 0 rgba(0,0,0,0.2),0 3px 5px 0 rgba(0,0,0,0.19) !important  ;
}
.topnav a.active {
		  background-color: MediumSeaGreen;
		  color: white;
}

.bigfont{
	font-size:18px;
	font-weight:bold;
	text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4); /* Soft shadow */
}	
</style>

<script>

// คลิกแท็ป
function f_tab(e){ 
			 var tabs = document.getElementsByName('tabs');
			 for (let i = 0; i < tabs.length; i++) {
				  var tab = tabs[i] ;
				  var id = tab.id ;
				  id = id.replace("tab","") ;
				   var   div = document.getElementById("main" + id);
				   if(tab == e){ 
							div.style.display = ""; 
							 tab.setAttribute('class','active');
							}else{ 
							div.style.display = "none";
							 tab.setAttribute('class','');
				   }		   
			} 
			var span = document.getElementById("span_save_file");
			if(e.id =="tab0"){
					span.style.display = "none" ;
					}else{ 
					span.style.display="" ;
			}
}

</script>
</head>
<body  id="body" >
<div style="padding-left:15px;padding-top:6px;font-size:20px;font-weight:bold;color: black ; ">
ช่วยสร้างไฟล์เอกสาร  Word และ Power Point  แบบสรุปรายละเอียดขอจำหน่ายหนี้เงินกู้ออกจากบัญชีเป็นหนี้สูญ  
<?php 

$user = filter_input(INPUT_GET, "user");
$user = strtoupper($user) ;
echo "<span id='user'  style='color:red;'>" . $user . "</span>" ;
if($user =="ADMIN"){ 
		echo "<span style=' position:relative; float:right; right: 20px; top:0px;z-index:999;'>
						<button onclick='f_show_example_all();'  style='width:140px;height:40px;'>
							<img src='imgs/key.png' style='width:20px;position:relative;top: 5px; '>
							ตัวอย่างทั้งหมด
						</button>
				</span>" ;
}

?>
<script>
function f_show_example_all(){ 
			if (confirm("ต้องการแสดงตัวอย่างทั้งหมด\n ----------------------------- \nตัวอย่างจะแทนที่ข้อมูลเดิม ? ")) {
					var tab  = document.getElementById('tab1'); f_tab(tab) ; 
					f_show_ex_all();
			}
}
</script>

</div>
<div style="position:relative;left:15px;color:gray;">
<?php
include("ip.php");
$ip =  f_get_ip();
echo "<span style='color:black;'>ip : <span id='span_ip'>" . $ip . "</span>" ;
//echo "&nbsp;&nbsp;&nbsp;   ";

?>
<br>
ย้ายเซลล์โดย ใช้ปุ่ม Enter ลูกศรขึ้น-ลง

</div>

<div class="topnav">
  <a name="tabs" id="tab0" class="active" onclick="f_tab(this);"><img src="imgs/b_home.png" style="width:28px;"><br>หน้าหลัก<br>Check List</a>
  <a name="tabs" id="tab1" onclick="f_tab(this);"><img src="imgs/key1.png" style="width:26px;"><br><span style="font-size:20px;font-weight:bold;">1. </span>ข้อมูลทั่วไป<br>ตารางหนี้</a>
  <a name="tabs" id="tab2" onclick="f_tab(this);"><img src="imgs/key1.png" style="width:26px;"><br><span style="font-size:20px;font-weight:bold;">2. </span>สถานะแห่งหนี้<br>สาเหตุหนี้ค้าง</a>
  <a name="tabs" id="tab3" onclick="f_tab(this);"><img src="imgs/key1.png" style="width:26px;"><br><span style="font-size:20px;font-weight:bold;">3. </span>ตารางรายละเอียด<br>ลูกหนี้ร่วม-คนค้ำ</a>
  <a name="tabs" id="tab4" onclick="f_tab(this);"><img src="imgs/key1.png" style="width:26px;"><br><span style="font-size:20px;font-weight:bold;">4. </span>ติดตามหนี้<br>และความเห็นสาขา</a>
<!------------------------------------------------SAVE------------------------------------------->
<span style="position:relative;float:right;right:20px;">
		<span id="span_save_file" style="display:none">
		<a onclick="f_save_data(true);"><img src="imgs/b_save.png" style="width:28px;"><br>1.บันทึกข้อมูล<br>(เก็บข้อมูลตาม  CIF)</a>
		<a onclick="f_word();"><img src="imgs/FileWord32x32.png" style="width:28px;"><br>2.สร้างไฟล์บรราย<br>WORD</a>
		<a onclick="f_ppt();"><img src="imgs/FilePowerPoint32x32.png" style="width:28px;"><br>3.สร้างไฟล์ xml<br>(ให้เปิดด้วย powerpoint)</a>
		</span>

		<a name="tabs" id="tab99" onclick="f_tab(this);" >
			<img src="imgs/Icon_About.png" style="width:28px;"><br>
			About me         
		</a> 
</span>

</div>



<!------------------------------------------------TAB1234------------------------------------------->

<div id="main0" style="padding:0px;  width:100vw; ">
		<?php include("tab0.php");?> 
</div>

 <div id="main1" style="padding:0px;  display:none; width:100vw; ">
		<?php include("tab1.php");?>
</div>

<div id="main2" style="padding:0px;   display:none; width:100vw; ">
       <?php include("tab2.php");?>
</div>

<div id="main3" style="padding:0px;   display:none; width:100vw; ">
  <?php include("tab3.php");?>
  
</div>
 <div id="main4" style="padding-left:0px; display:none; width:100vw; ">
  <?php include("tab4.php");?>
  
</div>

<!------------------------------------------------ABOUT ME------------------------------------------->

<div id="main99" style="position:relative;top:100px;display:none;width:100vw;text-align:center;">
			<h2 style="color:gray;">ทดลองใช้ก่อนสอบถามนะครับ</h2> 
			<img src="imgs/kisda_id_line.png" style="border: 1px solid #555;width:105px;"> 
			<br>
			<br>
			<hr>
			<br>
			<div style="color:gray;">
					โปรแกรมโดย
					<br>กิดดา สนจ.บุรีรัมย์  และ จู หนองบัวลำภู
					
			</div>
</div>

<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>


 
 </body>
</html>


