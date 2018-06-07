<?php
header("Progma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
require_once('./classes/Course.php');
require_once('./classes/Fee.php');
require_once('./classes/Datahandler.php');
$data = new Datahandler();

//print_r($data->courseData);
           	  //	print_r($data->courseData);
//include ('../header.php');
?>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel ="stylesheet" type="text/css" href="./css/calculator1.css">


<style type="text/css">

  .coursename{
    width: 280px;
  }

  .coursesection{
    display: none;
  }
  .coursename {
    border-color: whitesmoke;
    background-color: #fffdf5;
    border-radius: 3px;
    margin-bottom: 5px;

  }
  .coursetitle{
    background-color: #ffdd57;
    color: rgba(0, 0, 0, 0.7);
  }
  .coursedetail{

    color: #3b3108;
    border-radius: 3px;
    border-color: #ffdd57;

  }
  .main{
    margin: auto;
    
    
    padding: 10px;
  }
  .items{
    padding-right: 2px;
    padding-left:  2px;
    padding-top:  2px;
    padding-bottom:  4px;
  }
  td.personalDetail{

    width: 25%;
    
  }  

  .personalDetail2{
    padding:  6px;
    width: 200px;
    margin: 3px;
  }

  .address1{
    padding:  6px;
    width:250px;
    margin: 3px;
  }
  .header{
    text-align: left;
    padding-left: 20px;
    padding-top: 20px;
  }
  .selectbox{
	   height:255px;
	   width:310px;
  }
  .paymentoption{
    width: 700px;
  }
  td.options{
    width: 100px;
  }
  .fee{
    width: 50px;
  }
  section{border:1p solid white; padding: 5px; overflow: hidden;}
  section > section {float: left;}
  .incident{padding-left: 20px;}


</style>

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="./js/calculator.js"></script>
<div class = "main">

  <form name="certform"  id="certform" method="post" action="./update.php">
    <table style='width:370px;'>
      <tr>
        <td style='width:160px; '>
          <b>Courses </b><br/>
          <select multiple="multiple" id='lstBox1' class="selectbox">
            <?php

            echo $data->loadCourseName();


            ?>
          </select>
        </td>
        <td style='width:50px;text-align:center;vertical-align:middle;'>
          <input type='button' id='btnRight' value ='  >  '/>
          <!-- <br/><input type='button' id='btnLeft' value ='  <  '/> -->
        </td>
        <td style='width:160px;'>
          <b>Selected Course </b><br/>
          <select multiple="multiple" id='lstBox2' class="selectbox">

          </select>
        </td>
      </tr>
    </table>
    
    <b>Payment Option</b>
    <br/>
    <br/>
    <table class="paymentoption">
      <tr>
        <td class="options"><input type="radio" name="Paymentoption" value="1" id="option1" checked="true">&nbsp;Option 1</td>
        <td class="options"><input type="radio" name="Paymentoption" id="option2" value="2">&nbsp;Option 2</td>
        <td class="options"> <input type="radio" name="Paymentoption" id="option42" value="5" /> <lable id="option41"  >Latin package</lable></td>
         <td class="options"> <input type="radio"  id="option4"  name="Paymentoption" value="4" > <lable id="option41"  class="options" >&nbsp;Latin</lable></td>  </tr>
        <td class="options"><input type="radio"  id="option3" style="display: none;" name="Paymentoption" value="3" ><lable id="option31" style="display: none;">&nbsp;Option 3</lable></td>
       
          
      </tr>
      <tr><td>&nbsp;</td></tr>
      <tr>
        <td class="options"><input type="checkbox" name="waive" value="enrol" id="waiveE" >EW</td>
        <td class="options"><input type="checkbox" name="waive" value="material" id="waiveM" >MW</td>
        <td class="options"><input type="checkbox" name="waive" value="paymentplan" id="waiveP" >PFW</td>
        <td class="options" style="display: none" id="discounttd"><input type="checkbox" name="discount" value="discount" id="discount" >Custom Discount<input type="text" name="discountprice"  id="discountprice" disabled="disabled" ></td>
        
      </tr>
    <!-- <tr><td><input type="checkbox" name="EnrolmentFeeCheck" value="1" id="enrolFee" >Enrolment Fee &nbsp;<input type ="text" name="EnrolFee" class="fee"></td><td><input type="checkbox" name="MaterialFeeCheck" value="1" id="materialFee" >Material Fee&nbsp;<input type ="text" name="MaterialFee" class="fee"></td><td></td></tr> -->
    </table>

   
<section class = "indent">
<section>
<!--
  <div id="1-course" style="display:none"> -->
    <div id="course1"  class = "message is-black">
      <div class = "message-header">
        1. Course  <br/>
      </div>
      <div class = "message-body">
       Course Name <input  id="course1name" type="text" class="coursename" name = "course1name" /><br/>
       Course Duration <input id="course1duration" type="text" name = "course1duration" /><br/>
       Course Start Date: <select id="1st" name = "course1startdate"></select></br>
       Finish Date: <input type="text" id="finish1" name= "finish1" readonly="readonly"></input><br/>
     </div>
   </div>



   <div id="course2"   class = "message is-black"  >
    <div class = "message-header">
      2. Course
    </div>
    <div class = "message-body">
     Course Name <input id="course2name" type="text" class="coursename" name = "course2name"/> <br/> 
     Course Duration <input id="course2duration" type="text" name = "course3duration" /><br/>
     Course Start Date: <select id="2nd"  name = "course2startdate"></select></br>
     Finish Date: <input type="text" id="finish2" name= "finish2" readonly="readonly"></input><br/>
   </div>
 </div>





 <div id="course3"   class = "message is-black" >
  <div class = "message-header">
    3. Course
  </div>
  <div class = "message-body">
   Course Name <input class="coursename" id="course3name" type="text" name = "course3name"/><br/>
   Course Duration <input id="course3duration" type="text" name = "course3duration" /><br/>
   Course Start Date: <select id="3rd" name = "course3startdate"></select>  </br>
   Finish Date: <input type="text" id="finish3" name= "finish3" readonly="readonly" ></input><br/>
 </div>
</div>




<div id="course4"   class = "message is-black"  >
  <div class = "message-header">
    4. Course
  </div>
  <div class = "message-body">
    Course Name <input class="coursename" id="course4name" type="text" name = "course4name"/><br/>
    Course Duration <input id="course4duration" type="text" name = "course4duration"  /><br/>
    Course Start Date: <select id="4th"  name = "course4startdate"></select>  </br>
    Finish Date: <input type="text" id="finish4" name= "finish4" readonly="readonly"></input><br/>
  </div>
</div>


<div id="course5"   class = "message is-black"  >
  <div class = "message-header">
    5. Course 
  </div>
  <div class = "message-body">
    Course Name <input class="coursename" id="course5name" type="text" name = "course5name"/> <br/>
    Course Duration <input id="course5duration" type="text" name = "course5duration" /><br/>
    Course Start Date: <select id="5th"  name = "course5startdate"></select>  </br>
    Finish Date: <input type="text" id="finish5" name= "finish5" readonly="readonly"></input><br/>
  </div>
</div>


<div id="course6"   class = "message is-black"  >
  <div class = "message-header">

    6. Course 
  </div>
  <div class = "message-body">
   Course Name <input class="coursename" id="course6name" type="text" name = "course6name"/> <br/>
   Course Duration <input id="course6duration" type="text" name = "course6duration"  /><br/>
   Course Start Date: <select id="6th"  name = "course6startdate"></select>  </br>
   Finish Date: <input type="text" id="finish6" name= "finish6" readonly="readonly"></input><br/>
 </div>

</div>
</section>
<section>
<div title="Payment Plan Details" id="showpayment" style="display: none">
  <div id="result"></div>
</div>

</section>
</section>
<br/>
<br/>
<input type="button" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Check Payment Plan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" id="submitform" class= "button is-dark is-large"  /> 
<!--<input type="button" value="Complete Application Details" id="createform" class= "button is-dark is-large" style="display: none" /> -->
<input type="button" value="Reset" class= "button is-light is-large"  onClick="window.location.reload()">
<br/>
<br/>


</form>
