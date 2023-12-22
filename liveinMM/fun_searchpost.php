<!DOCTYPE html>
<html>
<head>
	<title>search post</title>
</head>
<body>
  <?php
  	$loc =$_REQUEST["loc"];
  	$price =$_REQUEST["price"];
  	$type = $_REQUEST["type"];
  	if($price==""){
  		echo "<script type='text/javascript'>window.location.href='index.php'</script>";
  	}
  	if(!is_numeric($price)){
  		echo "<script type='text/javascript'>window.location.href='index.php'</script>";
  	}
  	//echo "".$loc."".$price."".$type;
  	echo "<script type='text/javascript'>window.location.href='index.php?loc=".$loc."&price=".$price."&type=".$type."' </script>";
  ?>
</body>
</html>