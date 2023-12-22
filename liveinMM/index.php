<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>Live in Myanmar</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js.js"></script>
</head>
<body>

	<?php 
		$localhost = "localhost";
		$username = "root";
		$password = "";
		$database = "liveinmm";
        $ser_loc = $_GET['loc'];
        $ser_price = $_GET['price'];
        $ser_type = $_GET['type'];
        //echo "".$ser_loc."".$ser_price."".$ser_type;
		//create connection
		$conn = new mysqli($localhost,$username,$password,$database);
		//check connection
		if($conn->connect_error){
			die("connection error".$conn->connect_error);
		}
		if(isset($ser_loc) && isset($ser_price)  && isset($ser_type)){  
			$sql ="SELECT id,loc,type,img,price,floor,room,serv,cont,reg_date FROM posts1 WHERE loc='".$ser_loc."' AND price=".$ser_price." AND type='".$ser_type."'";
		}else{
			$sql ="SELECT id,loc,type,img,price,floor,room,serv,cont,reg_date FROM posts1";
		}
		
		$result = $conn->query($sql);
		
		    //define total number of results you want per page  
    	$results_per_page = 8;  
    	//find the total number of results stored in the database  
	    //$query = "select *from alphabet";  
	    //$result = mysqli_query($conn, $query);  
	    $number_of_result = mysqli_num_rows($result);  
	     //determine the total number of pages available  
    	$number_of_page = ceil ($number_of_result / $results_per_page);  
    	//determine which page number visitor is currently on  
	    if (!isset ($_GET['page']) ) {  
	        $page = 1;  
	    } else {  
	        $page = $_GET['page'];  
	    }  
	    //determine the sql LIMIT starting number for the results on the displaying page  
    	$page_first_result = ($page-1) * $results_per_page;  
    	 //retrieve the selected results from database
    	 if(isset($ser_loc) && isset($ser_price)  && isset($ser_type)){  
    	 $query = "SELECT *FROM posts1 WHERE loc='".$ser_loc."' AND price=".$ser_price." AND type='".$ser_type."' LIMIT " . $page_first_result . ',' . $results_per_page; 
    	
    	}else{
    		$query = "SELECT *FROM posts1 LIMIT " . $page_first_result . ',' . $results_per_page;
    		
    	}  
    	$result = $conn->query($query);
    	$conn->close();
		?>
	<div class="lm_container">
		<!-- header background and sign up -->
		<div class="header_img_container">
			<h2 class="header_ttl">LIVE IN <br> MYANMAR</h2>
			<a class="sign_up lm_btn" href="addpost.php">add post</a>	
		</div>
		<!-- search with -->
		<div class="search_container">
			<!-- search title -->
			<h3 class="lm_search_header lm_ttl">SEARCH WITH</h3>
			<p class="lm_search_sub_header lm_ttl1">find what you need quicky.</p>

			<!-- addd post -->
			<a class="sign_up lm_btn" href="index.php">All</a>	
			<!-- search form -->
			<div class="lm_serach_form_container">

				<form action="fun_searchpost.php" method="post">
					<!-- serach location -->
					<div class="lm_search_form_sub_container">
						<label class="lm_ttl2" for="search_loc">Location</label><br>
						<select id="search_loc" name="loc" class="search_input_form lm_ttl1" type="text" required>
							<option></option>
							<option value="yangon">yangon</option>
							<option value="mandalay">mandalay</option>
						</select>
					</div>
					<!-- serach price -->
					<div class="lm_search_form_sub_container">
						<label class="lm_ttl2" for="search_price">Price</label><br>
						<input id="search_price" name="price" class="search_input_form" type="number" min="100000" max="900000" step="100000" required>
					</div>
					<!-- serach type -->
					<div class="lm_search_form_sub_container" >
						<label class="lm_ttl2" for="search_price">Type</label><br>
						<select id="search_price" name="type" class="search_input_form lm_ttl1" type="text" required>
							<option></option>
							<option value="condo">condo</option>
							<option value="hostel">hostel</option>
						</select>
					</div>
					
					 <input  class="search_btn lm_btn" type="submit" value="Search">
					
				</form>
			</div>
		</div>	
		<!-- show result container-->
	     <div class="lm_result_container">
	     	<div class="lm_result_sub_container clearfix">
	     		<?php  if(isset($ser_loc) && isset($ser_price)  && isset($ser_type)){   ?>
	     		<p class="lm_result_ttl lm_ttl2"><?php echo "".$ser_loc." / ".$ser_price." / ".$ser_type; ?></p>
	     	<?php }else{ ?>
	     		<p class="lm_result_ttl lm_ttl2">ALL</p>
	     	<?php } ?>
	     		 <?php 
				    if(mysqli_num_rows($result) > 0 ){
						//output data
						while($row = mysqli_fetch_assoc($result)){
							

					?>
		     		<!-- result card -->
		     		<div class="lm_result_card_container">
		     			<!-- image -->
		     			<img class="lm_result_img" src="<?php echo "img/".$row["img"]; ?>" style="margin-left:5px;"/>
		     			
		     			
		     			<!-- price -->
		     			<p class="lm_result_price lm_ttl2"><?php echo($row["price"]);?> <span class="lm_ttl1" style="color: #aaa;"> ks / month :  <?php echo($row["loc"]);?> </span></p>
		     			<!-- floor,room and avail -->
		     			<div class="lm_result_card_sub_container">
		     				<div class="lm_result_floor">
		     					<p class="lm_ttl1" style="color: #aaa;">floor</p>
		     					<p class="lm_ttl" style="text-align: center;"> <?php echo($row["floor"]);?> </p>
		     				</div>
		     				<div class="lm_result_room">
		     					<p class="lm_ttl1" style="text-align: center;color: #aaa;">Room</p>
		     					<p class="lm_ttl" style="text-align: center;"> <?php echo($row["room"]);?> </p>
		     				</div>
		     				<div class="lm_result_avail">
		     					<p class="lm_ttl1" style="text-align: center;color: #aaa;">type</p>
		     					<p class="lm_ttl2" style="text-align: center; padding: 4px 0px; color: #00bbc9;"> <?php echo($row["type"]);?> </p>
		     				</div>
		     			</div>
		     			<!-- other service -->
		     			<div class="lm_result_service">
		     				<p class="lm_ttl1" style="color: #aaa;"><?php echo($row["serv"]);?></p>
		     			</div>

		     			<!-- contact -->
		     			<div class="lm_result_phone">
		     				<p class="lm_ttl1"><?php echo($row["cont"]);?></p>
		     			</div>
		     		</div><!--end result cared -->

		     		<?php 
		     	   }
					}else{
						echo '<p class="lm_result_ttl lm_ttl2"> there is no data </p>';
					}

					?>
	     	</div><!-- end result card contianer -->
	     	<div class="lm_result_pagi_container">
	     		<?php
	     		 //display the link of the pages in URL  
				    for($page = 1; $page<= $number_of_page; $page++) { 
				     if(!isset($ser_loc) && !isset($ser_price) && !isset($ser_type)){
					    	if (!isset ($_GET['page']) ) {
					    		if($page == 1){
					    			echo '<a href = "index.php?page=' . $page . '" style="color:#00bbc9;">' . $page . ' </a>';
					    		}else{
						        echo '<a href = "index.php?page=' . $page . '" style="color:#ffffff;">' . $page . ' </a>';  
						   		 }
					    	}else{
						    	if($_GET['page'] == $page){
						    		 echo '<a href = "index.php?page=' . $page . '" style="color:#00bbc9;">' . $page . ' </a>';
						    	}else{
						        echo '<a href = "index.php?page=' . $page . '" style="color:#ffffff;">' . $page . ' </a>';  
						   		 }
						   	}
						   }else{
							   	if (!isset ($_GET['page']) ) {
						    		if($page == 1){
						    			echo '<a href = "index.php?loc='.$ser_loc.'&price='.$ser_price.'&type='.$ser_type.'&page=' . $page . '" style="color:#00bbc9;">' . $page . ' </a>';
						    		}else{
							       echo '<a href = "index.php?loc='.$ser_loc.'&price='.$ser_price.'&type='.$ser_type.'&page=' . $page . '" style="color:#ffffff;">' . $page . ' </a>';
							   		 }
						    	}else{
							    	if($_GET['page'] == $page){
							    		echo '<a href = "index.php?loc='.$ser_loc.'&price='.$ser_price.'&type='.$ser_type.'&page=' . $page . '" style="color:#00bbc9;">' . $page . ' </a>';
							    	}else{
							      echo '<a href = "index.php?loc='.$ser_loc.'&price='.$ser_price.'&type='.$ser_type.'&page=' . $page . '" style="color:#00bbc9;">' . $page . ' </a>';
							   		 }
							   	}


						   }
				    }  
				?>     		
			<!--  <a href="#" class="lm_leftarw"></a>
				  <a href="#">1</a>
				  <a href="#">2</a>
				  <a href="#">3</a>
				  <a href="#">4</a>
				  <a href="#" class="lm_rightarw"></a> -->
	     	</div>
	     </div><!-- end result container -->

	     <!--footer -->
	     <div class="lm_footer_container">
	     	<div class="lm_footer_sub_container">
	     		<div style="overflow: auto;">
		     		<h3 class="lm_ttl">LIVE IN MYANMAR</h3>
		     		<div class="lm_footer_sub_inner_container">
		     			<p class="lm_ttl1">Careers</p>
		     			<p class="lm_ttl1">Lift Time</p>
		     			<p class="lm_ttl1">Mandalay</p>
		     		</div>
		     		<div class="lm_footer_sub_inner_container">
		     			<p class="lm_ttl1">Customer</p>
		     			<p class="lm_ttl1">Yangon</p>
		     			<p class="lm_ttl1">Myanmar</p>
		     		</div>
		     		<div class="lm_footer_contact_container">
		     			<label class="lm_ttl2" for="mail">Contact Us</label><br>
						<input id="mail" class="search_input_form" type="text" style="width: 170px; margin-right: 10px;" >
						 <input  class="contact_btn lm_btn" type="submit" value="submit" style="background-color: #00bbc9;"><br>
						 <p class="lm_ttl1" style="font-size: 1rem; margin-top:10px;">kaunghtet29.9.1997@gmail.com</p>
		     		</div>
	     		</div>
	     		<div class="lm_footer_line"></div>
	     		<p class="lm_footer_paragrap lm_ttl1">Website Team &#8195;|&#8195;	Privacy Policy&#8195;	|&#8195;	Accessivility Statement &#8195;	|&#8195;	MM Transparency in Supply Chain Art&#8195;	|&#8195;Supply Code of Conduct&#8195;	|&#8195;	Do Not Sell Information <br>
				@2024 ALL Rights Reserved </p>
	     	</div>
	     </div><!-- end footer -->
	</div>
	
</body>
</html>