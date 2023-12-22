<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<title>Add Post</title>
	<link rel="stylesheet" type="text/css" href="css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="js.js"></script>

	 <link
      class="jsbin"
      href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css"
      rel="stylesheet"
      type="text/css"
    />
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"
    ></script>
    <script
      class="jsbin"
      src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"
    ></script>
    <!--[if IE]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
      article,
      aside,
      figure,
      footer,
      header,
      hgroup,
      menu,
      nav,
      section {
        display: block;
      }
    </style>
</head>
<body style="background-color: #00bbc9;">
	<div class="add_post_container">
		<h3 class="lm_ttl add_post_ttl">Add Post</h3>
		<p class="lm_ttl1 add_post_sub_ttl">please fill in all the information correctly.</p>

		<form action="fun_addpost.php" method="Post" enctype='multipart/form-data'>
			<div style="margin-top: 20px;overflow: auto;">
				<!-- Location -->
				<div class="lm_search_form_sub_container">
					<label class="lm_ttl2" for="loc" style="margin-left: 13px;">Location</label><br>
					<select id="loc" name="location" class="search_input_form lm_ttl1" type="text" style="margin: 2px 13px 20px 13px;" required >
						<option></option>
						<option value="yangon">yangon</option>
						<option value="mandalay">mandalay</option>
					</select>
				</div>
				<!-- type -->
				<div class="lm_search_form_sub_container" >
					<label class="lm_ttl2" for="typ" style="margin-left: 12px;">Type</label><br>
					<select id="typ" name="type" class="search_input_form lm_ttl1" type="text" style="margin: 2px 13px 20px 13px;" required>
						<option></option>
						<option value="condo">condo</option>
						<option value="hostel">hostel</option>
					</select>
				</div>
			</div>
			<!-- image -->
			<label for="file-upload" class="img_upload lm_btn">
			    Add photo
			</label>
			<input id="file-upload" name="image" type="file" class="lm_ttl1 input_img" onchange="readURL(this);" accept="image/gif, image/jpeg, image/png"  required /><br><br>
			 <img id="blah" class="dis_img" src="#"/>

			 <!-- price -->
			 <div class="price_container">
			 	<div class="lm_search_form_sub_container">
					<label class="lm_ttl2" for="price" style="margin-left: 13px;">Price</label><br>
					<input id="price" name="price" class="search_input_form" type="number" value="10000" min="100000" max="900000" step="100000" style="margin: 2px 19px 2px 13px ; display: inline-block;" />
					<p style="display: inline-block;font-size: 1rem;" class="lm_ttl1">ks / month</p>
				</div>
			 </div>

			 <!-- floor and room -->
			 <div style="padding-top: 20px;overflow: auto; clear: both;">
				<!-- floor -->
				<div class="lm_search_form_sub_container">
					<label class="lm_ttl2" for="floor" style="margin-left: 13px;">Floor</label><br>
					<input id="floor" name="floor" class="search_input_form" type="number" value="0" min="0" step="1"  style="margin: 2px 13px 20px 13px;" />
				</div>
				<!-- room -->
				<div class="lm_search_form_sub_container" >
					<label class="lm_ttl2" for="room" style="margin-left: 12px;">Room</label><br>
					<input id="room" name="room" class="search_input_form" type="number" value="1" min="1" step="1" style="margin: 2px 13px 20px 13px;"/>
				</div>
			</div> 
			<!-- other service -->
			<div class="service_container">
				<label class="lm_ttl2" for="service" style="margin-left: 12px;">Service</label><br>
				<textarea  id="service" name="service" class="servic_textarea lm_ttl1" name="service" rows="4" cols="50" required></textarea>
			</div>

			<!-- phone -->
			 <div style="padding-top: 20px;overflow: auto; clear: both;">
				<!-- phone -->
				<div class="lm_search_form_sub_container">
					<label class="lm_ttl2" for="phone" style="margin-left: 13px;">Phone</label><br>
					<input id="phone" name="phone" class="search_input_form" type="tel" pattern="[0-9]{11}" style="margin: 2px 13px 20px 13px;" required />

					<!-- add -->
					<input  class="add_btn lm_btn" style="margin:0px 15px;padding-left: 10px; padding-right: 10px;" type="submit" value="Post">
				</div>
			</div>
		</form>
	</div>	
	<script type="text/javascript">
	
		function readURL(input) {
		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function (e) {
		      $('#blah').attr('src', e.target.result);
		    };

		    reader.readAsDataURL(input.files[0]);
		  }
		}
	</script>
	
</body>
</html>