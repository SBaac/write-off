<div style="position:relative;top:20px;left:20px;">
 <table class="table1" border="1" style="table-layout : fixed !important ;" >
 <!---------------------------------------------1.สถานะแห่งหนี้--------------------------------------------------->
 <tr style="background-color: rgba(0,0,0,0.05)  !important  ;" > 
		<td colspan="2" style="	border-top: 3px solid gray; 
									border-bottom: 3px solid black;
									font-size:18px;font-weight:bold;
									background-color: rgba(0,0,0,0.05) ;
									color:black;
									vertical-align: middle; "  >
					<span class="box" style="position:relative;top:10px;">1</span>
					 <span style="position:relative;top:10px;">สถานะแห่งหนี้</span>  
					 <!---------------------------------------------ตัวอย่าง--------------------------------------------------->
					 <span style="float:right;">
							<button onclick="f_del_data_tab2();"  style="width:140px;height:40px;">
									<img src="imgs/cancel_16.png" style="width:20px;position:relative;top: 3px; ">  ลบข้อมูล 
							</button>
							<button onclick="f_show_ex2();"   style="width:140px; height:40px;">
									<img src="imgs/key.png" style="width:20px;position:relative;top: 5px; "> ตัวอย่าง  
							</button>
					 </span>
		</td>
</tr>
<tr>
		<td style="width:300px; background-color: rgb(229, 229, 229); ">
		 1.1 เป็นหนี้:ดำเนิคดี/ยังไม่ดำเนินคดี </td>
		<td style="width:600px;background-color:rgb(229, 229, 229); " > เป็นหนี้ยังไม่ดำเนินคดี </td>
		
</tr>

<tr>
		<td style="background-color:rgb(229, 229, 229);padding:5px; ">1.2 หลักฐานการเป็นหนี้ : ฟ้องได้</td>
		<td style="background-color:rgb(229, 229, 229);padding:5px; ">มีหลักฐานการเป็นหนี้ครบถ้วนพอฟ้องคดีได้  </td>
 
</tr>

<tr><td style="background-color:rgb(229, 229, 229); " >1.3 ไม่ขาดอายุความ แบบสั้น(PPT)<a  style="float:right;right:5px;"> </td>
	<td Contenteditable class="edit" style="text-wrap: wrap;" id="tab2_1_3">
</tr>

<tr>
		<td  style="background-color:rgb(229, 229, 229); ">1.4 ไม่ขาดอายุความ แบบละเอียด(WORD)
					<div style="color:gray;padding:20px 20px;">
					 ให้ระบุเหตุที่หนี้ไม่ขาดอายุความเช่น
					<br>การชำระหนี้ระบุวัน/เดือน/ปี
					<br>การจัดทำ รชน.ระบุวัน/เดือน/ปี
					<br>หรือเหตุอื่น-เรียงเหตุการณ์แต่ละช่วง
					 
					</div>
		</td>
	<td Contenteditable class="edit"  id="tab2_1_4"  style="text-wrap: wrap;" ></td>
	
</tr>

<tr>
		<td style="background-color:rgb(229, 229, 229); "  >1.5 ไม่ดำเนินคดีและบังคับคดีเนื่องจาก 
		 <br>&nbsp; &nbsp; &nbsp;  <span style="color:DarkCyan;"> (ผู้กู้+ลูกหนี้ร่วม+ผู้ค้ำประกัน)</span>				
		</td>
	<td Contenteditable class="edit"  id="tab2_1_5" style="text-wrap: wrap;">
	</td>
</tr>

<!-------------------------------------2.สาเหตุหนี้ค้างชำระ(กู้มาทำอะไร ค้างเพราะอะไร)----------------------------------------->
 <tr  style="background-color: rgba(0,0,0,0.05)  !important  ;"> 
		<td colspan="2" style=" border-top: 3px solid gray; 
									border-bottom: 3px solid black;
		                                   font-size:18px;font-weight:bold;  color:black;  " >
		<span class="box" style="position:relative;top:-2px;">2</span> สาเหตุหนี้ค้างชำระ(กู้มาทำอะไร ชำระหนี้ไม่ได้เพราะอะไร)</td>
		
</tr>

<tr><td style="background-color:rgb(229, 229, 229); ">2.1 กู้เงิน ปี...เพื่อ...(กฎกระทรวง186)</td>
       <td Contenteditable class="edit"  id="tab2_2_1" style="text-wrap: wrap;"></td>
	   
</tr>

<tr>
		<td style="background-color:rgb(229, 229, 229); ">2.2 ชำระหนี้ไม่ได้เนื่องจาก  </a>
				<span style="color:gray;">
				<br> &nbsp; &nbsp; &nbsp; &nbsp;- สาเหตุที่ทำให้หนี้ค้างชำระครั้งแรก
				<br> &nbsp; &nbsp; &nbsp; &nbsp;- สาเหตุที่ทำให้ค้างชำระจนถึงปัจจุบัน
				<br> &nbsp; &nbsp; &nbsp; &nbsp; <u style="color:DarkCyan;">กรณี ปปน.ให้ระบุถึงสาเหตุ</u>
				<br> &nbsp; &nbsp; &nbsp; &nbsp; _ที่ชำระไม่ได้
				<br> &nbsp; &nbsp; &nbsp; &nbsp; _ในภายหลัง ปปน.
				</span>
				

		</td>
	<td Contenteditable class="edit"  id="tab2_2_2" style="text-wrap: wrap;"></td>
	
</tr>

<!--------------------------------------------3.สถานะของผู้กู้---------------------------------------------------->

 <tr style="background-color: rgba(0,0,0,0.05)  !important  ;"> 
		<td colspan="2" style="border-top: 3px solid gray; border-bottom: 3px solid black;
		                                  font-size:18px;font-weight:bold; color:black; ">
		       <span class="box" style="position:relative;top:-2px;">3</span>  สถานะของผู้กู้</td>
</tr>

<tr><td style="background-color:rgb(229, 229, 229);  ">3.1 สภาพร่างกาย/การเจ็บป่วย)  </td>
       <td Contenteditable class="edit"  id="tab2_3_1"  style="text-wrap: wrap;" ></td>
</tr>

<tr>
		<td style="background-color:rgb(229, 229, 229);  " >3.2 ประกอบอาชีพ  
			<span style="color:gray;">
		      <br> &nbsp; &nbsp; &nbsp; &nbsp; รายได้สุทธิ/รายได้พอยังชีพ
			 <br> &nbsp; &nbsp; &nbsp; &nbsp;  อาศัยบุตรเลี้ยงดู
			 </span>
			 
	</td>
	<td Contenteditable class="edit"  id="tab2_3_2" style="text-wrap: wrap;" >
	</td>
</tr>

<tr>
		<td style="background-color:rgb(229, 229, 229); " >3.3 ทรัพย์สิน เน้นบ้าน ที่อาศัย ที่ดิน</span> 
		      	<span style="color:gray;">
				<br> &nbsp; &nbsp; &nbsp; &nbsp; บ้าน….หลัง สภาพ.......
				<br> &nbsp; &nbsp; &nbsp; &nbsp; มูลค่า(ซาก)....บาท/ไม่มีมูลค่า
				<br> &nbsp; &nbsp; &nbsp; &nbsp; ปลูกบนที่ดินของ.......เนื้อที่.....
				<br> &nbsp; &nbsp; &nbsp; &nbsp; (จำนอง ธ.ก.ส วงเงิน...บาท)
				<br> &nbsp; &nbsp; &nbsp; &nbsp; มูลค่า...บาท
				<br> &nbsp; &nbsp; &nbsp; &nbsp;<span style="color:red;"><u>สปก.ไม่ต้องประเมินมูลค่าทรัพย์สิน</u> </span>
				<br>
				<br>
				</span>
				
	</td>
	<td Contenteditable class="edit"  id="tab2_3_3" style="text-wrap: wrap;">
	</td>
</tr>

</table>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
 