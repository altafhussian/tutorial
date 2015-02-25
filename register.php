<?php 
session_start();
/* if (isset($_SESSION['uid']))
	header("Location:http://172.16.1.71/tutorials/index.php"); */
 ?>
<html>
	<head>
		<title> Register</title>
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css"></link>
		<script src="./bootstrap/js/jquery-2.1.3.min.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
		<script src="./jquery-validation-1.13.1/dist/jquery.validate.min.js"></script>
		<script>
		$(function(){
			$('#reg_frm').validate({
				rules:{
					name:"required",
					email:{
						required:true,
						email:true
						},
					phone:"required",
					uname:"required",
					password:{
						required:true,
						minlength:5
						}
				},
				messages:{
					name:"Please enter your name",
					email:"Please enter your mail id",
					phone:"Please enter your phone number",
					uname:"Please enter username",
					password:{
						required:"Please enter password",
						minlength:"Atleast 8 characters required"
						}
				}
			});
				$('#save').on('click',function(e){
					e.preventDefault();
					if($('#name').val() != '')  
					{
					$.ajax({
							url:"./db_ajax.php?func1=db_ajax&&func=ins_register",
							data:$('#reg_frm').serializeArray(),
							type:'post',
							success: function(data){
								alert(data);
							      $('#name').val('');
							      $('#email').val('');
							      $('#phone').val('');
							      $('#uname').val('');
							      $('#password').val('');
							      $('input:checkbox').removeAttr('checked');
							},
							error : function(XMLHttpRequest, textStatus, errorThrown) {
							    alert(textStatus);
						    }			
						});
					}
					});
				  
			   $('#cancel').on('click', function(e){
				      $('#name').val('');
				      $('#email').val('');
				      $('#phone').val('');
				      $('#uname').val('');
				      $('#password').val('');
				      $('input:checkbox').removeAttr('checked');
				      window.location = 'http://172.16.1.71/tutorials/index.php';
				 });
		});
		</script>
	</head>
<body>
<form id="reg_frm" class="form-horizontal" method="post">
	<div class="form-group">
		<label for="name" class="col-md-2 control-label">Name:</label>
		<div class="col-md-10">
		<input class="form-control" type="text" id="name" name="name" placeholder="Enter Name"></input>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-md-2 control-label">E-Mail ID:</label>
		<div class="col-md-10">
		<input class="form-control" type="email" id="email" name="email" placeholder="Enter mail id"></input>
		</div>
	</div>
	<div class="form-group">
		<label for="phone" class="col-md-2 control-label">Phone No:</label>
		<div class="col-md-10">
		<input class="form-control" type="tel" id="phone" name="phone" placeholder="Enter Phone No."></input>
		</div>
	</div>
	<div class="form-group">
	<label class="col-md-2 control-label">Notify through: </label>
		<div class="checkbox">
			<label><input type="checkbox" value="sms" id="notify[]" name="notify[]">SMS</input></label>
			<label><input type="checkbox" value="mail" id="notify[]" name="notify[]">Mail</input></label>
		</div>
	</div>
	<div class="form-group">
		<label for="uname" class="col-md-2 control-label">User Name:</label>
		<div class="col-md-10">
		<input class="form-control" type="text" id="uname" name="uname" placeholder="Enter Username"></input>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-md-2 control-label">Password:</label>
		<div class="col-md-10">
		<input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"></input>
		</div>
	</div>
	 <div class="col-md-12 col-md-offset-2">
		<button  class="btn btn-primary" type="submit" id="save" name="save">Submit</button>
		<button  class="btn btn-primary" type="button" id="cancel" name="cancel">Cancel</button>
	</div>
</form>
</body>
</html>