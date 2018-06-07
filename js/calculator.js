



$(document).ready(function() {
  var course2duration,course2StartDate;
  var course3duration,course3StartDate;
  var course4duration,course4StartDate;
  var course5duration,course5StartDate;
  var course6duration,course6StartDate;

  var monthNames = new Array();

  monthNames[0] = "01";
  monthNames[1] = "02";
  monthNames[2] = "03";
  monthNames[3] = "04";
  monthNames[4] = "05";
  monthNames[5] = "06";
  monthNames[6] = "07";
  monthNames[7] = "08";
  monthNames[8] = "09";
  monthNames[9] = "10";
  monthNames[10] = "11";
  monthNames[11] = "12";

  var dateFlag = 0;
  $("#finish1").val("");
  $("#finish2").val("");
  $("#finish3").val("");
  $("#finish4").val("");
  $("#finish5").val("");
  $("#finish6").val("");
  $('input[type=radio][name=Paymentoption]').change(function() {
        if (this.value == '5') {
          $("#discounttd").show();
        }
        else  {
          $("#discounttd").hide();     
              
              
        }
    });

  $("#discount").val(this.checked);
  $("#discount").change(function(){
      if(this.checked)
         $("#discountprice").removeAttr("disabled"); 
       else
        $("#discountprice").attr("disabled", "disabled"); 
         

  });

  $("#submitform").click(function(e){
    var selectedCourses = $("#lstbox2 option").length;
    var flag = true;
    var courseData=[];

    switch(selectedCourses){

      case 1:

      if($("#1st").val() == "-"){
        flag = false;
      }

      break;
      
      case 2:
      if($("#1st").val() == "-"){
        flag = false;
      }
      if($("#2nd").val() == "-"){
        flag = false;
      }
      break;
      
      case 3:
      if($("#1st").val() == "-"){
        flag = false;
      }
      if($("#2nd").val() == "-"){
        flag = false;
      }
      if($("#3rd").val() == "-"){
        flag = false;
      }

      break;
      
      case 4:
      if($("#1st").val() == "-"){
        flag = false;
      }
      if($("#2nd").val() == "-"){
        flag = false;
      }
      if($("#3rd").val() == "-"){
        flag = false;
      }
      if($("#4th").val() == "-"){
       flag = false;
     }
     break;

     case 5:
     if($("#1st").val() == "-"){
       flag = false;
     }
     if($("#2nd").val() == "-"){
      flag = false;
    }
    if($("#3rd").val() == "-"){
      flag = false;
    } 
    if($("#4th").val() == "-"){
      flag = false;
    }if($("#5th").val() == "-"){
      flag = false;
    }

    break;

    case 6:
    if($("#1st").val() == "-"){
      flag = false;
    }
    if($("#2nd").val() == "-"){
      flag = false;
    }
    if($("#3rd").val() == "-"){
      flag = false;
    }
    if($("#4th").val() == "-"){
      flag = false;
    }
    if($("#5th").val() == "-"){
      flag = false;      

    }
    if($("#6th").val() == "-"){
      flag = false;
    }
    break;
    default:
    alert("Please select at least 1 course!!");
    e.preventDefault();
    return false;
    break;
  }
  if (!flag) {
   alert("Please check your start dates!");
   e.preventDefault();
   return false;
 } 
 else{
  $(".items").remove();
  courseData.push(new Array($("#course1name").val(), $("#1st").val()));
  //var output ="<table class='items'><th class = 'items' style='width:400px' >Course Name</th><th class = 'items' style='width:160px '>Course Start Date</th>";
  switch (selectedCourses){
    
    case 2:
    
    courseData.push(new Array($("#course2name").val(), $("#2nd").val()));
    //output += '<tr><td class="items">'+$("#course1name").val()+'</td><td class="items">'+$("#1st").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course2name").val()+'</td><td class="items">'+$("#2nd").val()+'</td></tr>';
    break;

    case 3:
    courseData.push(new Array($("#course2name").val(), $("#2nd").val()));
    courseData.push(new Array($("#course3name").val(), $("#3rd").val()));
    
    //output += '<tr><td class="items">'+$("#course1name").val()+'</td><td class="items">'+$("#1st").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course2name").val()+'</td><td class="items">'+$("#2nd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course3name").val()+'</td><td class="items">'+$("#3rd").val()+'</td></tr>';
    break;

    case 4:
    
    courseData.push(new Array($("#course2name").val(), $("#2nd").val()));
    courseData.push(new Array($("#course3name").val(), $("#3rd").val()));
    courseData.push(new Array($("#course4name").val(), $("#4th").val()));
    //output += '<tr><td class="items">'+$("#course1name").val()+'</td><td class="items">'+$("#1st").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course2name").val()+'</td><td class="items">'+$("#2nd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course3name").val()+'</td><td class="items">'+$("#3rd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course4name").val()+'</td><td class="items">'+$("#4th").val()+'</td></tr>';
    break;

    case 5:
    
    courseData.push(new Array($("#course2name").val(), $("#2nd").val()));
    courseData.push(new Array($("#course3name").val(), $("#3rd").val()));
    courseData.push(new Array($("#course4name").val(), $("#4th").val()));
    courseData.push(new Array($("#course5name").val(), $("#5th").val()));
    //output += '<tr><td class="items">'+$("#course1name").val()+'</td><td class="items">'+$("#1st").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course2name").val()+'</td><td class="items">'+$("#2nd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course3name").val()+'</td><td class="items">'+$("#3rd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course4name").val()+'</td><td class="items">'+$("#4th").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course5name").val()+'</td><td class="items">'+$("#5th").val()+'</td></tr>';
    break;

    case 6:
    
    courseData.push(new Array($("#course2name").val(), $("#2nd").val()));
    courseData.push(new Array($("#course3name").val(), $("#3rd").val()));
    courseData.push(new Array($("#course4name").val(), $("#4th").val()));
    courseData.push(new Array($("#course5name").val(), $("#5th").val()));
    courseData.push(new Array($("#course6name").val(), $("#6th").val()));
    
    //output += '<tr><td class="items">'+$("#course1name").val()+'</td><td class="items">'+$("#1st").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course2name").val()+'</td><td class="items">'+$("#2nd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course3name").val()+'</td><td class="items">'+$("#3rd").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course4name").val()+'</td><td class="items">'+$("#4th").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course5name").val()+'</td><td class="items">'+$("#5th").val()+'</td></tr>';
    //output += '<tr><td class="items">'+$("#course6name").val()+'</td><td class="items">'+$("#6th").val()+'</td></tr>';
    break;
    
  }
  
  var paymentopts = document.getElementsByName('Paymentoption');
  var option_value;
  for(var i = 0; i < paymentopts.length; i++){
      if(paymentopts[i].checked){
          option_value = paymentopts[i].value;
      }
  }

  courseData.push(new Array("paymentoption",option_value));
  
  var waiveopts = document.getElementsByName('waive');
  var option_waive=[];
  for(var i = 0; i < waiveopts.length; i++){
      if(waiveopts[i].checked){
           option_waive.push(waiveopts[i].value);
      }
  }
  
  if(option_waive.length == 0){
    courseData.push(new Array("waiveoption",0));
  } else courseData.push(new Array("waiveoption",option_waive));

  if($("#discountprice").val().length !=0){
    courseData.push(new Array("discountprice",$("#discountprice").val()));
  } else if($("#discountprice").val().length ==0 && $("#option42").prop("checked")){

    alert("Discount must be entered!");
    $("#discountprice").focus();
    return 0;
  }

  $.post( "./update.php", { createpayment : courseData })
    .done(function( data ) {
      if(data=="[]"){
        alert( "No data!!!" );
      } 
      else {
        var s_Data= jQuery.parseJSON( data );
        document.getElementById('result').innerHTML = "";


        var output ="<table class =\"table is-narrow\">" ;
        output += "<tr  ><th>Due Date</th><th >Fee Description</th><th>Course Name</th><th>Payment Amount</th></tr>"
        var tmpCourseName ="";

        for(var i =  0 ; i < s_Data.length; i ++) {

          if(tmpCourseName != s_Data[i]["courseName"]){
            output += '<tr><td>'+s_Data[i]["dueDate"]+"</td><td>"+s_Data[i]["description"]+"</td><td style='font-weight: bold;'>"+s_Data[i]["courseName"]+"</td><td>$"+s_Data[i]["amount"]+"</td></tr>";  
          } else{
          output += '<tr><td>'+s_Data[i]["dueDate"]+"</td><td>"+s_Data[i]["description"]+"</td><td>"+s_Data[i]["courseName"]+"</td><td>$"+s_Data[i]["amount"]+"</td></tr>";
          }
          tmpCourseName = s_Data[i]["courseName"]

        }
        $('#result').append(output+"</table>");
      }           
      $('#showpayment').slideDown();
      
    });
  }
});




  //output += "</table><br/><br/><label class='items'>Is this information correct?</label>"





  $( "#1st" ).change(function() {
    var startdate = $("#1st option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course1duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish1").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });

  $( "#2nd" ).change(function() {
    var startdate = $("#2nd option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course2duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish2").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });

  $( "#3rd" ).change(function() {
    var startdate = $("#3rd option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course3duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish3").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });

  $( "#4th" ).change(function() {
    var startdate = $("#4th option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course4duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish4").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });

  $( "#5th" ).change(function() {
    var startdate = $("#5th option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course5duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish5").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });


  $( "#6th" ).change(function() {
    var startdate = $("#6th option:selected").val();
    var tempDate = startdate.split("/");
    var now = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
    var duration = $("#course6duration").val();
    now.setDate(now.getDate()+(duration * 7)-3);
    $("#finish6").val(now.getDate()+"/"+(monthNames[now.getMonth()])+"/"+now.getFullYear());
  });
  $("#createform").click(function(e){
    $("#createapplication").slideDown();
    $("#submitform").hide(1000);
    $("#fname").focus();
  });
  
  $("#option1").click(function(){
    $("#submitform").show(1000);
  });

  $("#option2").click(function(){
    $("#submitform").show(1000);
  });

  $("#option3").click(function(){
    $("#submitform").show(1000);
  });




  $('#btnRight').click(function(e) {
    var course1duration;
    var course1StartDate;
    var selectedOpts = $('#lstBox1 option:selected');
    if (selectedOpts.length == 0) {
      alert("Nothing to move.");
      e.preventDefault();
      return;

    }

    $('#lstBox2').append($(selectedOpts).clone());

    var selectedCourses = $("#lstbox2 option").length;




    switch(selectedCourses){
      case 1:
      var courseName = $("#lstbox2 option").eq(0).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course1duration").val(s_Data[0]);
          $('#1st').append($('<option>', {value:"-", text: "-"}));



          for(var i = 1 ; i < s_Data[1].length; i ++) {


            $('#1st').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));  

          }
        }           
      });
      $("#course1").slideDown();
      $("#createform").slideDown();

      $('#course1name').val(selectedOpts.val());
      break;

      case 2:
      var courseName = $("#lstbox2 option").eq(1).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course2duration").val(s_Data[0]);
          $('#2nd').append($('<option>', {value:"-", text: "-"}));
          for(var i = 1 ; i < s_Data[1].length; i ++) {
            $('#2nd').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));
          }
        }           
      });
      $("#course2").slideDown();
      $("#option3").slideDown();
      $("#option4").slideDown();
      $("#option31").slideDown();
      $("#option41").slideDown();
      $('#course2name').val(selectedOpts.val());
      break;

      case 3:
      var courseName = $("#lstbox2 option").eq(2).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course3duration").val(s_Data[0]);
          $('#3rd').append($('<option>', {value:"-", text: "-"}));    
          for(var i = 1 ; i < s_Data[1].length; i ++) {
            $('#3rd').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));
          }
        }           
      });
      $("#course3").slideDown();
      $('#course3name').val(selectedOpts.val());
      break;

      case 4:
      var courseName = $("#lstbox2 option").eq(3).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course4duration").val(s_Data[0]);
          $('#4th').append($('<option>', {value:"-", text: "-"}));
          for(var i = 1 ; i < s_Data[1].length; i ++) {
            $('#4th').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));
          }
        }           
      });
      $("#course4").slideDown();
      $('#course4name').val(selectedOpts.val());
      break;

      case 5:
      var courseName = $("#lstbox2 option").eq(4).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course5duration").val(s_Data[0]);
          $('#5th').append($('<option>', {value:"-", text: "-"}));
          for(var i = 1 ; i < s_Data[1].length; i ++) {
            $('#5th').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));
          }
        }           
      });
      $("#course5").slideDown();
      $('#course5name').val(selectedOpts.val());
      break;

      case 6:
      var courseName = $("#lstbox2 option").eq(5).val();
      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } 
        else {
          var s_Data= jQuery.parseJSON( data );
          $("#course6duration").val(s_Data[0]);
          $('#6th').append($('<option>', {value:"-", text: "-"}));
          for(var i = 1 ; i < s_Data[1].length; i ++) {
            $('#6th').append($('<option>', {value:s_Data[1][i], text: s_Data[1][i]}));
          }
        }  });
      $("#course6").slideDown();
      $('#course6name').val(selectedOpts.val());
      break;
      default:
      alert("Full!!!!!!!!!!!!!!");
      return;
      break;  }

        //changeStartDate();
        $(selectedOpts).remove();
        e.preventDefault();
      });

$('#btnLeft').click(function(e) {
  var selectedOpts = $('#lstBox2 option:selected');
  if (selectedOpts.length == 0) {
    alert("Nothing to move.");
    e.preventDefault();
  }

  $('#lstBox1').append($(selectedOpts).clone());
  $(selectedOpts).remove();
  e.preventDefault();
});
});


function getStartDateByName(courseName){



    /*$('#lstbox2 option').each(function(){
        courseNames.push($(this).val());
      });*/


      $.post( "./update.php", { courses: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } else {
         var s_Data= jQuery.parseJSON( data );


         for(var i = 0 ; i < s_Data.length; i ++){

          $('#1st').append($('<option>', {value:s_Data[i], text: s_Data[i]}));
        }

        $('#course1').slideDown();


      }           


    });
    }

    function getCourseDuration(courseName){





      $.post( "./update.php", { duration: courseName })
      .done(function( data ) {
        if(data=="[]"){
          alert( "No data!!!" );
        } else {
         var s_Data= jQuery.parseJSON( data );
         return s_Data;

                  /*for(var i = 0 ; i < s_Data.length; i ++){
                    
                    $('#1st').append($('<option>', {value:s_Data[i], text: s_Data[i]}));
                  }*/
                  
            //$('#course1').slideDown();


          }           
          

        });
    }

    function checkDate(startDate){

      var tempDate = startDate.split("/");
      var converted = new Date(tempDate[2],tempDate[1]-1,tempDate[0]);
      var now = new Date();
      if(now > converted){
        return 0;
      } 
      else 
        return 1;

    }
