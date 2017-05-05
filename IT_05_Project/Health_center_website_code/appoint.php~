
<!DOCTYPE html>
<!-- PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>MNNIT Hospital Unit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script>
var sel_day;

</script>
<script src="jquery-2.1.1.js"></script>
<script src="bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="datepicker.css" type="text/css" />
</head>

 <script type="text/javascript">
      var datefield=document.createElement("input")
      datefield.setAttribute("type", "date")
      if (datefield.type!="date"){ //if browser doesn't support input type="date", load files for jQuery UI Date Picker
     document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
        document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
	
      }
   </script>

 <script>
    if (datefield.type!="date"){ //if browser doesn't support input type="date", initialize date picker widget:
       jQuery(function($){ //on document.ready
           $('#datepicker').datepicker();
       })
    }
</script>
<script>
$( function() {
    //$( "#datepicker" ).datepicker({  minDate: -20, maxDate: "+1M +10D" });
 
 var day,prog;

	

 // $( "#datepicker" ).on( "change", function(){
  		$("#datepicker").change(function(){
		prog = $(this).val();
	//	 prog=document.ff.sel_date.value;
		//alert(prog);
		 var date = new Date(prog).getUTCDay();
   sel_date=new Date(prog);
  cur_date=new Date();
  var weekday = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
		day=weekday[date];
		
		//alert(sel_date+"---"+cur_date);
		if(sel_date.setHours(0,0,0,0)<cur_date.setHours(0,0,0,0) ) 
		{
		 alert("Wrong Date selection");
		 window.location="appoint.php";
		 }
		 else{
		$.ajax({
			type:"POST",
			url:"getspel.php?day="+day+"&date="+prog,
			contentType:"application/json",
			dataType:"json",
			success: function(data)
			{
				//alert(data);
				 $("#spec").removeAttr("disabled");
				$("#spec").html("");
				$("#spec").append("<option selected='selected'>Select specialisation</option>");
				for(var i=0;i<data.length;i++)
				{
					$("#spec").append("<option>"+data[i]+"</option>");
				}
			}
			
			
		});
		}
		});
		
		$("#spec").change(function(){
		
		 var specl = $(this).val();
		// var specl=document.ff.special.value;
		// alert(specl);	
		$.ajax({
			type:"POST",
			url:"getdoc.php?day="+day+"&specl="+specl+"&date="+prog,
			contentType:"application/json",
			dataType:"json",
			success: function(data)
			{
				if(data.length==0){
					alert("No doctor of this specialisation");
                                   }
				 $("#doct").removeAttr("disabled");
				$("#doct").html("");
				$("#doct").append("<option selected='selected'>Select doctor</option>");
				
				for(var i=0;i<data.length;i++)
				{
					$("#doct").append("<option>"+data[i][0]+"'--"+data[i][1]+"</option>");
				}
			}
			
			
		});
		});
		$("#reg").change(function(){
			
		var reg = $(this).val();
		
		$.ajax({
			type:"POST",
			url:"validate_reg.php?reg="+reg,
			contentType:"application/json",
			dataType:"json",
			
			success: function(data)
			{
				 if(data[0]=="false" )
				 {
                                 	
				alert("wrong Card No."); window.location="appoint.php";}
				 else{
				 
				 $("#bt1").removeAttr("disabled");
				 }
			}
		});
		});
});		
		</script>
		
<body>
<div class="wrapper row1">
  <div id="header" class="clear">
    <div class="fl_left">
      <h1><img src="m.JPG" width="950"height="140"alt="" /></h1>
    </div>
    
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row2">
  <div id="topnav">
    <ul>
      <li><a href="home.php">Homepage</a></li>
      <li><a href="people.php">People</a></li>
      <li><a href="dutychart.php">Duty Chart</a></li>
      <li><a href="">Facilities</a>
        <ul>
          <li><a href="physiotherapy.php">Physiotherapy Cell</a></li>
          <li><a href="dental.php">Dental Cell</a></li>
          <li><a href="pathology.php">Pathology Cell</a></li>
        </ul>
      </li>
        <li ><a href="feedback.php">Feedback</a></li>
<li> <a href="javascript:void(0);"
 NAME="My Window Name"  title=" My title here "
 onClick=window.open("medicine.php","Ratting","width=550,height=170,0,status=0,");>Medicine Availability</a></li>
      <li ><a href="member.php">Member Area</a></li>
	  <li class="last"><a href="http://mnnit.ac.in/">MNNIT Home</a></li>
    </ul>
    <div  class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row4">
  <div id="container" class="clear">
    <!-- ####################################################################################################### -->


       <form method="post" action="finalappoint.php" name="ff">
       <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-3"> <label class="text-info" >DATE</label></div>
           <div class="col-md-7"> 

    <input name="sel_date" type="date" min='<?php echo date("d-m-Y") ?>' placeholder="dd:mm:yy" id="datepicker" />
<!--         <input type="text"  id="datepicker">         
<input type="button" value="weekday" onclick="date()" />
 <p id="output">
</p>
<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
</div>
-->	
</div>
                </div>
                <br />
              
             
                <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-3"> <label class="text-info" >Specialisation</label></div>
            <div class="col-md-7">
               <select  id="spec" name="special" class="form-control"  style="width:400px;"  disabled="disabled" >
            	<option selected="selected">----------------- </option>
   				 </select>
                </div>
                </div>
            	<br />
            <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-3"> <label class="text-info" >Doctor</label></div>
            <div class="col-md-7">
                 <select  id="doct" name="doctor" class="form-control"  style="width:400px;" disabled="disabled">
                <option selected="selected">-----------------</option>
   				 </select> 
                 </div>
                 </div>
                 <br />
                 
                  <div class="row" >
            <div class="col-md-2"></div>
            <div class="col-md-3"> <label class="text-info" >Enter Reg. No:</label></div>
            <div class="col-md-7">
            
            <input type="text" name="reg" required id="reg" />
            </div>
            </div>
            <br/>
                  <div class="row" >
            	 <div class="col-md-5"></div>
                 <div class="col-md-2">
               		<input type="submit"  name="submit" id="bt1" class="btn btn-primary"  value="SUBMIT" 
					disabled="disabled"">   
                 </div>
                 <div class="col-md-5"></div>
               
                 
</form>



</div>
    <!-- ####################################################################################################### -->
    <div class="clear"></div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper row5">
  <div id="footer" class="clear">
    <!-- ####################################################################################################### -->
    <div class="foot_contact">
      
    </div>
    <!-- ####################################################################################################### -->
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="copyright" class="clear">
 <p class="fl_left">Copyright &copy; 2016- All Rights Reserved - <a href="#">MNNIT Hospital Unit</a></p>
   <p class="fl_right"> <a title="Contact(ak@mnnit.ac.in)">Web Administrator</a></p> 
  </div>
</div>
</body>
</html>
