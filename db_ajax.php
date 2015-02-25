<?php 
session_start();

$con = null;
if ($_GET['func1']=="db_ajax")
{

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$uname = $_POST['uname'];
	$pass = $_POST['password'];
    
	connect();
	global $con;
	
		if($_GET['func']=="ins_register")
		{
			$notifydata = $_POST['notify'];
			if(empty($notifydata))
			{
				$notifydata = "";
			}
			else
			{
				$N = count($notifydata);
				for($i=0; $i < $N; $i++)
				{
				$notify = $notifydata[$i] . ",";
				}
			}
			$sql = "insert into register (name, email, phone, notify, uname, pwd) values('$name','$email',$phone,'$notify','$uname','$pass')"; 
			
			if (mysqli_query($con, $sql)) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($con);
			}
		}
		
		if ($_GET['func']=="login_sel")
		{   
			
			$sql = "select * from register where uname='".$_POST['username']."' and pwd='".$_POST['password']."'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_assoc($result);
			if ($row) {
				$_SESSION['uid'] = $row['id'];
				$_SESSION['uname'] = $row['name'];
				echo json_encode($row);
			} 
			else {
				echo "No matches found";
			}
		}
	
	mysqli_close($con);
}

function connect()
{
	$host = "127.0.0.1";
	$user = "root";
	$password = "root123";
	$database = "tutorial";
	
	global $con;
	$con = new mysqli($host, $user, $password, $database);
}
?>