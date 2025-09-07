<!--div style="font-size:18px;font-weight:bold;">ข้อมูลทั่วไป</div>  
<hr class="hr_shadow"-->

<br>
<table border="0"  >
<tr >
<td style="width:250px;text-align:right;padding: 2px 10px;">
<a onclick="f_example_all();">- - - ตัวอย่างการบันทึกข้อมูล ? - - - -</a>
<script>
function f_example_all(){
	document.getElementById("cif_search").innerText = "555" ;
	f_get_search();	
}
</script>
<br>
กรณี ค้นหาข้อมูลเก่า จาก CIF ->Enter</td>
<td  	id="cif_search"
		class="edit shadow"		
		contenteditable  
		data-type="number-onerow"   
		data-row ="1"
		data-max="9999999999"
		onkeydown="if(event.key == 'Enter') f_get_search() ; "
		style=" 
				padding:2px 10px; width:150px;font-size:16px;
				font-weight:normal;text-align:center;vertical-align:middle;"  >
</td>
<td style="padding:0px 10px;width:120px;">
		<button style="width:95px;height:40px;" onclick="f_get_search();">
		<img src="imgs/search.png"> ค้นหา CIF</button>
</td>

<td style="text-align:left;padding:0px 5px; width:400px;"> 
		
		<button onclick="f_del_data_all_tab();"  style="width:220px;height:40px;">
				<img src="imgs/MD-reload.png" style="width:20px;position:relative;top: 3px; ">  ลบข้อมูลทั้งหมดเพื่อคีย์รายใหม่
		</button>
		
		<button onclick="f_del_data_tab1_456();"  style="width:140px;height:40px;">
				<img src="imgs/cancel_16.png" style="width:20px;position:relative;top: 3px; ">  ลบข้อมูลทั่วไป
		</button>
		
		<!--button oncl
		<!--button onclick="f_show_ex1_3456();"  style="width:140px;height:40px;">
				<img src="imgs/key.png" style="width:20px;position:relative;top: 3px; "> ตัวอย่าง 3-4-5-6
		</button-->
 </td>
</tr>
</table>
<hr class="hr_shadow"> 
<div class="row">
                <!-------------------------------1-2 ก๊อบวางข้อมูล--------------------------------->
			<div class="column" >
						<?php  include("copy_and_paste.php");?>
			</div>
			<!-------------------------------3--------------------------------->
			<div class="column"  >
						<span class="box" style="position:relative;top:-5px;left:-5px;">3</span>
						<table   border="1" class="table1"  style="position:relative;top:-15px;">
						
						<tr>
						 
						<td  rowspan="4" style="padding:2px; background-color: rgb(200, 200, 200);width:100px;">
											<button style="width:100%;height:52px;;" onclick="f_user_ajax_search();" >
													<img src="imgs/search.png" style="width:20px;height:20px;" >
													<br>ค้นหาสาขา
											</button>
											<button style="width:100%;height:52px; " onclick="f_user_ajax_save();">
													<img src="imgs/save.png" style="width:20px;height:20px;" > 
													<br>saveสาขา
											</button>	
									
								</td>		
						
						<td style="text-align: right; vertical-align:middle; background-color: rgb(229, 229, 229); ">รหัสสาขา</td> 
						<td  id="tab1_brn_code" class="edit" data-type="number-onerow"  
							  style="width:80px;vertical-align:middle;background-color:LightPink;color:black;" 
									Contenteditable  >
						</td>						
												
						</tr>
						<tr>
						<td style="text-align: right;background-color: rgb(229, 229, 229);">รหัส สนจ.(90..)</td>
						<td   id="tab1_prov_code" class="edit" data-type="number-onerow"  Contenteditable  ></td>
					 					
						</tr>

						
						
												
						<tr><td style="text-align: right;background-color: rgb(229, 229, 229);">ชื่อ สาขา</td>
								<td  id="tab1_brn_name"   class="edit" data-type="onerow"  
									Contenteditable data-one-row="1"></td>
						</tr> 
						
						<td style="text-align: right;background-color: rgb(229, 229, 229);">ชื่อ สนจ.</td>
						<td   id="tab1_prov_name" class="edit" data-type="onerow"  style="width:150px;" 
									Contenteditable  ></td>
						</tr>
						
						<!---------------------------------------------------------------------------------------------------------->
						<tr style="padding:2px;"><td style="padding:1px;"></td><td style="padding:1px;"></td></tr>
						
						<tr>
						 <td rowspan="4" style="padding:10px;text-align: center; vertical-align:middle;background-color: rgb(229, 229, 229);">
								 สาขา<br> ประชุม 
						</td>	
						<td style="text-align: right;background-color: rgb(229, 229, 229);">ครั้งที่</td>
						<td colspan="2"	id="tab1_meet_no"   data-type="number-onerow"   class="edit" style="" 
								Contenteditable  onkeyup="f_meet_full();"></td></tr> 
						
						<tr><td style="text-align: right;background-color: rgb(229, 229, 229);">วันที่</td>
						<td  colspan="2" id="tab1_meet_date"  data-type="number-onerow"	
						 class="edit"   Contenteditable  onkeyup="f_meet_full();">
						<?php echo (date("d")   );?></td></tr> 
						
						<tr><td style="text-align: right;background-color: rgb(229, 229, 229)">เดือน</td>
						<td colspan="2" id="tab1_meet_month"  data-type="number-onerow"	 class="edit"   
								Contenteditable data-one-row="1" 
								onkeyup="f_meet_full();"><?php echo (date("m")   );?></td></tr> 
						
						<tr><td style="text-align: right;background-color: rgb(229, 229, 229);">ปี พ.ศ.</td>
						<td colspan="2" id="tab1_meet_year"  data-type="number-onerow"	 class="edit"   
								Contenteditable  
								onkeyup="f_meet_full();"><?php echo (date("Y") + 543 );?></td></tr>
		
						</table>
						
						
			</div>
			<!-------------------------------4--------------------------------->
			<div class="column">
						<span class="box" style="position:relative;top:-5px;left:-5px;">4</span>
						<table   border="1" class="table1" style="position:relative;top:-15px;">
						
						<tr><td style="background-color: rgb(229, 229, 229);">ชื่อ-นามสกุล ลูกค้า</td>
						<td id="tab1_name" class="edit" data-type="onerow"	 Contenteditable   style='width:150px;'   ></td></tr> 
						
						<tr><td style="background-color: rgb(229, 229, 229);">อายุ (ตาย ให้คลิก 
						<a onclick="tab1_age.innerText = 'ตาย' ; ">ตาย</a>) &nbsp; &nbsp; </td>
						<td id="tab1_age"  class="edit" Contenteditable data-type="onerow"	></td></tr> 
						
						<tr><td style="background-color: rgb(229, 229, 229);">เลขประจำตัวประชาชน</td>
						 
						<td id="tab1_cid" 	class="edit" 
												Contenteditable
												data-type="onerow"  
						></td>
						</tr> 
						
						
						
						<tr><td style="background-color: rgb(229, 229, 229);">กลุ่ม</td><td id="tab1_group" class="edit" Contenteditable data-type="number-onerow"	></td></tr> 
						<tr><td style="background-color: rgb(229, 229, 229);">CIF</td>
						<td id="tab1_cif" 
														data-type="number-onerow"	
														data-max="999999999"  
														class="edit"
														style="background-color:LightPink; color:black;"
														Contenteditable >
						</td>
						<tr><td style="background-color: rgb(229, 229, 229);">ชื่อ เบอร์โทร ผู้ประสานงาน</td>
						<td id="tab1_em_name_tel" 
														data-type="onerow"	
														class="edit"
														Contenteditable >
						</td>
						</tr>
					     </table>						 
						<br>
						<div id="tab1_meet_full"  style="font-size:11px;color:gray;position:relative;top:-10px;">..</div>
						<!--ตามมติที่ประชุม ครั้งที่ 5/2558 เมื่อวันที่ 10 กรกฎาคม 2558-->
			</div>	
			<!-------------------------------5--------------------------------->
			<div class="column">
						<span class="box" style="position:relative;top:-5px;left:-5px;">5</span>
						<table   border="1" class="table1" style="position:relative;top:-15px;">
						<tr><td style='width:170px;background-color: rgb(229, 229, 229);'>สถานะผู้กู้ : ป่วย ตาย ย้าย</td>
						<td id="tab1_status" class="edit" style='width:140px;' data-type="onerow" Contenteditable ></td>
						</tr> 
						<tr><td style='background-color: rgb(229, 229, 229);'>ผู้รับใช้หนี้(ถ้ามีให้ระบุ : มี)</td>
						<td id="tab1_debt_servant" class="edit"  data-type="onerow"  Contenteditable ></td>
						</tr>
						<tr><td style='background-color: rgb(229, 229, 229);'>อาชีพ(รับจ้าง ฯ) </td> 
						<td id="tab1_job" class="edit"  data-type="onerow"  Contenteditable ></td>
						</tr> 
						<tr><td style=' background-color: rgb(229, 229, 229);'>รายได้สุทธิ<span style="float:right;right:0px;">(บาท)</sapn></td>
						<td id="tab1_income" class="edit" data-type="onerow-comma" style="text-align:right;"  Contenteditable ></td>
						</tr> 
						<tr><td style=' background-color: rgb(229, 229, 229);'>ทรัพย์สิน  <span style="float:right;right:0px;">(บาท)</sapn></td>
						<td id="tab1_asset" class="edit"  data-type="onerow-comma"  style="text-align:right;" Contenteditable ></td>
						</tr> 
						</table>
						
			</div>
	
</div>

<script>

f_meet_full();

function f_meet_full(){
	var meet_year = document.getElementById("tab1_meet_year").innerText ;
	var  meet_no = document.getElementById("tab1_meet_no") ;
	var  meet_date = document.getElementById("tab1_meet_date").innerText ;
	var  meet_month = document.getElementById("tab1_meet_month") ;
	var  meet_full = document.getElementById("tab1_meet_full") ;
	var  str = "ตามมติที่ประชุม ครั้งที่     " ;
	
	const months =  ["เดือน","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม" ] ;
	var month = months[parseFloat(meet_month.innerText)] ;
	var no = meet_no.innerText ; ;
	if (no ==="" ) no = "      " ;
	str = str +  no ;
	str = str + " / " + meet_year.trim() ;
	str = str + "   เมื่อวันที่  " +  meet_date.trim() ;
	str = str + " " +  month  ;
	str = str + " " +  meet_year.trim() ;
	str = str.replace("\n","");
	meet_full.innerText = str; 
}
</script> 


<hr class="hr_shadow">
<!------------------------------------------6 ตารางสถานะหนี้---------------------------------------------->
<span class="box" style="position:relative;">6</span>
<div>
		<span style="font-size:18px;font-weight:bold;">สถานะหนี้ </span> สัญญารวมดอกเบี้ยให้ลงในช่องดอกเบี้ย และลงรายการหนี้บรรทัดละ 1 สัญญา
		<span style="color:red;">การนับอายุหนี้ค้างให้นับจากวันถัดจากหนี้ถึงกำหนดชำระหนี้ตามสัญญากู้เงิน ถึงปัจจุบัน</span>
</div>
<table id="tb_loan"  border="1" class="table1" style=" width:99vw;" >
<thead>
<tr style="background-color: rgb(229, 229, 229);height:30px;"

			 data-cols-right="6,7,8,9,10,11,12,13,14,15"
			 data-cols-center="1,2,4,5,16,17"
			 data-cols-left="3"
			 data-cols-not-edit="9,13"
			 -----ไว้สร้างdataset.typeต้องมี3รายการ------			 
			 data-cols-onerow="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16"  --ถ้าไม่มีจะenterในเซลล์ได้
			 data-cols-comma="6,7,8,9,10,11,12,13,14,15"  --รับเฉพาะตัวเลข-แสดงคอมม่าทศนิยมสองตำแหน่ง_เพิ่มevents_onfocus_onblur
			 data-cols-number="1,16"  --รับเฉพาะตัวเลขจำนวนเต็ม
>
	 
<th rowspan="2"  style="padding:10px;width:40px;">ที่</th>
<th rowspan="2"  style="padding:10px;width:120px; ">เลขที่สัญญา</th>
<th rowspan="2"  style="padding:10px; ">ผลิตภัณฑ์</th>
<th rowspan="2"  style="padding:10px;width:200px; ">โครงการ </th>
<th rowspan="2"  style="padding:10px; ">สัญญาลงวันที่</th>
<th rowspan="2"  style="padding:10px; ">หลักประกัน</th>
<th rowspan="2"  style="padding:10px; ">ต้นเงินเดิม</th>

<th colspan="3"  style="padding:10px;">การชำระหนี้ก่อนดำเนินคดี</th>
<th colspan="4"  style="padding:10px;">การชำระหนี้หลังดำเนินคดี</th>
<th colspan="2"  style="padding:10px;">หนี้คงเหลือขอจำหน่ายหนี้</th>

<th style="padding:10px;width:30px;vertical-align:bottom;">อายุหนี้ค้าง(ปี)</th>
<th rowspan="2" style="padding:10px;width:40px;vertical-align:bottom;">action</th>
</tr>

<tr style="background-color: rgb(229, 229, 229);">
<th style="padding:10px;vertical-align:bottom;">ต้นเงิน</th>
<th style="padding:10px;vertical-align:bottom;">ดอกเบี้ย</th>
<th style="padding:10px;vertical-align:bottom;">รวม</th>

<th style="padding:10px;vertical-align:bottom;">ต้นเงิน</th>
<th style="padding:10px;vertical-align:bottom;">ดอกเบี้ย</th>
<th style="padding:10px;vertical-align:bottom;">ค่าฤชา</th>

<th style="padding:10px;vertical-align:bottom;">รวม</th>
<th style="padding:10px;vertical-align:bottom;">ต้นเงิน</th>
<th style="padding:10px;vertical-align:bottom;">ดอกเบี้ย</th>
<td id="tab1_npl_year"  data-type="onerow"	
							class="edit"
							Contenteditable
	style="padding:10px;vertical-align:middle;text-align:center;font-size:20px;font-weight:bold;" >
</td>
</tr>


<?php
echo "<tr style='text-align:center; background-color:rgb(180, 180, 180) !important ; cursor:default;'>";
echo "<th class='thick-border-bottom'></th>";
 for($i = 1 ;$i<18;$i++){	 
	 echo "<th class='thick-border-bottom'>&nbsp;(".$i.")</th>" ;	 
 } 
 echo "</tr>" ;
 ?>
 
</thead>
<!----------------------------บรรทัดสุดท้าย รวมตัวเลข------------------------------->
<tr style="background-color:rgb(229, 229, 229);">
<td style="padding:10px;text-align:center;color:black;">xx</td> 
<td colspan="5" style="padding:10px;text-align:right;">รวม &nbsp;&nbsp; </td>
<td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td>
<td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td>
<td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td>
<td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td><td style="padding:10px;text-align:right;"></td>

</tr>



						
						
</table>
<br>
<!--hr class="hr_shadow"-->
<br>
<!-----------------------ปุ่มเพิ่มบรรทัด----จำนวนคอลัมน์ และบรรทัดเริ่มต้น---------->
<button  style="position:relative;left:0px;height:60px;width:150px;"  
            onclick="f_table_add_row('tb_loan',18);" >
			<span style="font-size:25px;position:relative;top:3px;">+</span>
			 เพิ่มบรรทัด
</button>

 <script>
	 // ตรึงบรรทัด
	 var tb = document.getElementById("tb_loan") ;
	 var tr0 = tb.rows[0];
	 var tr1 = tb.rows[1];
	 tr0.style.position= "sticky";tr0.style.top = "0px";
	 tr1.style.position= "sticky";
	 tr1.style.top =  tr0.style.height ;		

</script>