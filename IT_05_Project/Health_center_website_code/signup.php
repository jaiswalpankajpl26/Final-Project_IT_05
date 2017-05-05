
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MNNIT Hospital Unit</title>
<script src="include/jquery-2.1.4.min.js"></script>
<script src="include/bt_js.js"></script>
<script src="include/crypto.js"></script>
<script src="include/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
<script src="include/moment.min.js"></script>
<script src="include/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="include/bt_template.css"  />
<link rel="stylesheet" href="include/bootstrap-3.3.5-dist/css/bootstrap.min.css"  />
<link href="include/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<style>
a:hover{
	text-decoration:none;
}
</style>
</head>

<body>

<div class="container">
	<hr />
    <div class="card card-container col-xs-10 col-xs-offset-1">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
         <div class="page-header">
            <button class="btn btn-danger col-md-offset-0" onClick="window.location.href='member.php';"> <span class="glyphicon glyphicon-chevron-left"></span> Back </button>
                <br />
                 <h2 class="text-warning">Sign Up</h2><small> Its simple.</small> 
            <br />
            <h5 class="text-warning">Note: All fields are mandatory.</h5>
            <?php
				if(isset($err) && $err==1)
				{
					echo '<p class="text-danger"><span class="glyphicon glyphicon-remove"></span> One or more fields have been left blank.</p>';
				}
			?>
		  </div>
        <form class="form-horizontal" role="form" method="post" action="register.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Enter Full Name" name="name" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="dob">Date of Birth:</label>
            <div class='input-group date col-md-6' style="padding-left:15px;" id='datetimepicker1'>
                <input type='text' name="dob" class="form-control col-md-6" required />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
          </div>
		   <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Regno:</label>
            <div class="col-sm-10"> 
              <input type="number" class="form-control" placeholder="Enter id" name="id" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" placeholder="Enter password" name="pass" required="required">
            </div>
          </div>
         
        <button class="btn btn-lg btn-success btn-block btn-signup" type="submit" name="submit" >Sign Up</button>
        </form>
    </div><!-- /card-container -->
   
</div><!-- /container -->
<script>
$(document).ready(function(){
	$('#datetimepicker1').datetimepicker(	
		{format: 'YYYY-MM-DD'}
	);
});
</script>
</body>
</html>
