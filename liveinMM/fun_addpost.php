<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		$localhost = "localhost";
		$username = "root";
		$password = "";
		$database = "liveinmm";

		//create connection
		$conn = new mysqli($localhost,$username,$password,$database);
		//check connection
		if($conn->connect_error){
			die("connection error".$conn->connect_error);
		}else{
			echo "connection success";
		}

		$loc = $_REQUEST['location'];
		$type = $_REQUEST['type'];
		$photo = $_FILES['image']['name'];
		$price = $_REQUEST['price'];
		$floor = $_REQUEST['floor'];
		$room = $_REQUEST['room'];
		$service = $_REQUEST['service'];
		$phone = $_REQUEST['phone'];

		$sql = "INSERT INTO posts1(loc,type,img,price,floor,room,serv,cont) VALUES(
			'$loc','$type','$photo',$price,$floor,$room,'$service','$phone');";

		if($conn->query($sql) == true){
			$target_Path = "img/";
			$target_Path = $target_Path.basename( $_FILES['image']['name'] );
			move_uploaded_file( $_FILES['image']['tmp_name'], $target_Path );
			echo '<script type="text/javascript"> window.location.replace("index.php");</script>';
		}else{
			echo '<script type="text/javascript"> window.location.replace("addpost.php");</script>';
		}
		$conn->close();

		//echo " ".$loc." ".$type." ".$photo." ".$price." ".$floor." ".$room." ".$service." ".$phone." ";
		//echo "".$_FILES['image']['name'];
	?>
</body>
</html>