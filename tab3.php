
<div style="width:96vw;padding:10px;"> 
		<span style="color:red;">Enter:ขึ้นบรรทัดใหม่</span> &nbsp;&nbsp;
		ลูกหนี้ร่วม ผู้ค้ำประกัน ให้จัดเรียง ตามศักยภาพจาก  ตาย,น้อย->มาก
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 
		<button onclick="f_del_data_tab3();"  style="width:140px;height:40px;">
				<img src="imgs/cancel_16.png" style="width:20px;position:relative;top: 3px; ">  ลบข้อมูล 
		</button>
		<button onclick="f_show_ex3();"   style="width:140px;height:40px; ">
							<img src="imgs/key.png" style="width:20px;position:relative;top: 3px; "> ตัวอย่าง 
		</button>
					
					
		<span style="position:relative; float:right;right:0px;top:10px;">หน่วย : บาท</span>
 
</div>
<!--*********************************ตารางลูกหนี้ร่วม คนค้ำ*************************************-->

 <table id="tb_garantee" class="table1" border="1" style="width:98vw;" >
 <thead>
 <tr style="background-color: rgb(229, 229, 229);height:60px;text-align:center;vertical-align:bottom;" 

		data-cols-right="6,9,12,13,15"
		data-cols-center="1,3,10,11,16"
		data-cols-left="2,4,5,7,8"
		data-cols-not-edit="0,16"
		-----ไว้สร้างdataset.typeต้องมี3รายการ------			 
		data-cols-onerow="1,3,6,9,12,13,15"  --ถ้าไม่มีจะenterในเซลล์ได้
		data-cols-comma="6,9,12,13,15"  --รับเฉพาะตัวเลข-แสดงคอมม่าทศนิยมสองตำแหน่ง_เพิ่มevents_onfocus_onblur
		data-cols-number="1"  --รับเฉพาะตัวเลขจำนวนเต็ม
		
 >

<th rowspan="2"  style="padding:5px;width:50px;">ที่ </th>
<th rowspan="2" style="padding:0px;width:30px;vertical-align:bottom;text-align:center;font-size:13px;">
				ระบุเลข<br>เพื่อแยก<br>ตาราง<br><img src="imgs/FilePowerPoint32x32.png"><hr><span style="font-size:13px;">1=ลน.ร่วม<br>2=คนค้ำ </span>&nbsp;&nbsp; 
				<br><br> 
				</th>		
<th rowspan="2" style="padding:5px;width:210px;  vertical-align:bottom;">
					ชื่อ - นามสกุล 
					<br>
					กรณีเสนอตัดด้วย 
					<br>Enter
					<br>แล้วพิมพ์ 
					<br>(เสนอตัดหนี้สูญ)
					<br>
					<br><span style="color:green;">(บรราย)</span>
					</th>
					
 <th rowspan="2" style="padding:5px;width:40px;vertical-align:bottom;">
 อายุ<br><br>ตาย<br>ระบุตาย<br><br></th> 
 
<th rowspan="2" style="padding:5px;width:100px; vertical-align:bottom;">
<u>เหตุผิดปกติ</u><br>
<br>ป่วย,ย้ายถิ่นที่อยู่<br>บวชไม่สึก<br>ต้องโทษจำคุก<br>
<br><span style="color:ForestGreen;">(บรรยาย)</span>

</th>  

<th rowspan="2" style="padding:5px;width:100px;  vertical-align:bottom;">
<u>อาชีพ</u><br>

<br>เลิกประกอบอาชีพ<br>ค้าขาย<br>รับจ้าง<br>ทำนา-ไร่ <br>
<span style="color:ForestGreen;">(บรรยาย)</span>
 
</th> 

<th rowspan="2" style="padding:5px; width:80px;  vertical-align:bottom;">
<u>รายได้สุทธิ</u>
<br>หลังหัก<br>ชำระหนี้ <br>
<br><span style="color:red;">ไม่ระบุ<br>=<br>พอยังชีพ</span><br><br>
<span style="color:rred;">(ตัวเลข)</span>
</th> 

<th rowspan="2" style="padding:5px;vertical-align:bottom;">ภาระ<br>(ถ้ามี)<br><br><span style="color:green;">(บรรยาย)</span></th> 
<th colspan="2" style="padding:5px;vertical-align:middle;" class="bigfont">ทรัพย์สินในข่ายบังคับคดี</th>
<th colspan="4" style="padding:5px;vertical-align:middle;" class="bigfont">หนี้ ธ.ก.ส.</th>
<th colspan="2" style="padding:5px;color:red; vertical-align:middle;"  class="bigfont">หนี้ภายนอก/หนี้บุคคลอื่น</th>
<th rowspan="2" style="width:5px; vertical-align:middle;transform: rotate(-90deg);">action</th>
</tr>


<tr style="background-color: rgb(229, 229, 229); ">
<th style="padding:5px;vertical-align:bottom;"><div style="font-size:16px;font-weight:bold;"> รายการทรัพย์สินและมูลค่า</div>
              *<br>ลงหลายรายการต่อเนื่องกัน<br>(.........มูลค่า......บาท)
			  <br><span style='color:green'>(บรรยาย)</span>
			  </th>

<th style="padding:5px;vertical-align:bottom;"> มูลค่า<br>ตัวเลขรวม<br><img src="imgs/FilePowerPoint32x32.png"><br>
<span style="color:red;">(ตัวเลข)</span>
</th>   

<th style="padding:5px;vertical-align:bottom;bottom;width:100px;text-wrap:wrap;"><b>ระบุ</b>
<br>ปกติ ค้าง ปรับปรุง โครงสร้างหนี้ <br><br><span style="color:red;">Enter</span></th>   

<th style="padding:5px;vertical-align:bottom;width:100px; ">หลักประกัน<br>- - - เช่น - - - <br>ลน.ร่วม,คนค้ำ <br>จำนอง ฯ<br><br><span style="color:red;">Enter</span></th>   

<th style="padding:5px;vertical-align:bottom;"> <br>ต้นเงิน<br><br>
<span style="color:ForestGreen;">(ตัวเลข)</span>
</th>   

<th style="padding:5px;vertical-align:bottom;"> ดอกเบี้ย<br><br>
<span style="color:ForestGreen;">(ตัวเลข)</span>
</th>   

<th style="padding:10px;text-align:left;"><span style="font-size:16px;font-weight:bold;">ชื่อเจ้าหนี้และ<br>จำนวนเงิน</span><br>ถ้ามีหลายรายให้ enter<br>เพื่อขึ้นบรรทัดใหม่<br>- - - - - - เช่น - - - - - <br>กทบ10,000บาท [enter]<br>นายทุนในหมู่บ้าน 10,000บาท<br><span style="color:green;">(บรรยาย)</span><br></th>   
<th style="padding:5px;vertical-align:bottom;"><div style="font-size:16px;font-weight:bold;">หนี้<br>บุคคลอื่น </div>ผลรวมของคอลัมน์ (14)<br><img src="imgs/FilePowerPoint32x32.png"><br>
<span style="color:red;">(ตัวเลข)</span>
</th>

</tr>
</thead>

<?php
echo "<tr style='text-align:center; background-color:rgb(180, 180, 180) !important ; cursor:default;'>";
echo "<th class='thick-border-bottom'></th>";
 for($i = 1 ;$i<17;$i++){	 
	 echo "<th class='thick-border-bottom'>&nbsp;(".$i.")</th>" ;	 
 } 
 echo "</tr>" ;
 ?>







</table>
<br>&nbsp;&nbsp;&nbsp;&nbsp;
* บ้าน(ไม้/ปูน) , ที่ดิน <span style="color:gray;">
เครื่องมือประกอบอาชีพ 1 แสน  เครื่องนุ่งห่มหลับนอน  เครื่องใช้ส่วนตัวรวมเกิน 5 หมื่น</span>
 
<!----------------------------------------------------------------------------------------------->
<br> 
<br>
<hr class="hr_shadow">
<br>
<button  style="position:relative;left:0px;height:60px;width:150px;"  
            onclick="f_table_add_row('tb_garantee',17);" >
			<span style="font-size:25px;position:relative;top:3px;">+</span>
			เพิ่มบรรทัด
</button>

<script>


</script>