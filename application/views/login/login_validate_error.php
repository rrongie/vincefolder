<html>
   
     <head>
	<!-- Meta Tags -->
	<meta name="description" content="{meta_desc}">
	<meta name="keywords" content="{meta_keywords}">
        <meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
        <title>login Page</title>
        <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/login-style.css'?>">
       
		
	<!-- Favicon -->
	
	<!-- Vendor JS -->
      
    </head>
<img id="logo"src="<?php echo base_url();?>assets/images/jcentre_mall_cebu.jpg"/>



<body>
			     <?php
               
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('account/login_validate', $attributes);
            ?>		
		  <div id="cont">
		  <h1>Employer Log in</h1>
		 	
		 	<span style="margin-left:42px; font-weight:bold;"><?php echo validation_errors();?></span>

		  <div class="inset">
		 
		  <p>
			
			<label>USERNAME</label>
			<input type="text" name="username" id="email" required>
		  </p>
		  <p>
			<label>PASSWORD</label>
			<input type="password" name="password" id="password" required>
		  </p>

		  </div>
		  <p class="p-container">
			<input type="submit" name="sign_in" id="go" value="Log in">
		  </p>
		</div>
</body>
</html>
