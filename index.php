<?php 
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tutorials</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css"></link>
<script src="./bootstrap/js/jquery-2.1.3.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
	$('#register').on('click',function(e){
		e.preventDefault();
		window.location = 'http://172.16.1.71/tutorials/register.php'; 
	});
	
	$('#login').on('click',function(e){
		e.preventDefault();
		$.ajax({
			url:"./db_ajax.php?func1=db_ajax&func=login_sel",
			data:$('#frm_login').serializeArray(),
			type:'post',
			dataType:'json',
			success: function(data){
				if(data != 'No matches found')
					window.location = 'http://172.16.1.71/tutorials/login.php';
			},
			error: function(data){
				$('#test').click();
			}
		});
	});	
});
</script>
</head>
<body>
<button  class="btn btn-primary" type="submit" id="test" name="test" data-toggle="modal" data-target="#myModal" style="display: none"></button>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="color: red">Invalid User!!!</h4>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<form id="frm_login" name="frm_login" class="form-horizontal" role="form" method="post" action="">
  	<div class="form-group">
	   	<label for="username" class="col-md-2 control-label">User Name:</label>
	   	<div class="col-md-10">
		<input class="form-control" type="text" id="username" name="username" placeholder="Enter Username"/>
	</div>
  </div>
 
  	<div class="form-group">
		<label for="password" class="col-md-2 control-label">Password:</label>
		<div class="col-md-10">
		<input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"/>
		</div>
  	</div>
  
 	<div class="col-md-12 col-md-offset-2">
		<button  class="btn btn-primary" type="submit" id="login" name="login">Submit</button>
		<button  class="btn btn-primary" type="submit" id="register" name="register">Register</button>
	</div>

</form>	
</body>
</html>