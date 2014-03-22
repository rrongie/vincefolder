<html>
<head>
  <title>test</title>
</head>
<!-- Latest compiled and minified CSS -->

<body>
  <center class="container">
      <div style="background-color:#0e4599;border-radius: 3px;"><img class="mainlogo" src="<?php echo base_url() . 'assets/img/logo.png' ?>" alt=""> <div>
  </center>
<div class="container">


  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url() . "user/user_account"?>"><img src="<?php echo base_url() . 'assets/img/user.png' ?>">User panel</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li style="font-size:15px; margin-top:5px;"><a href="<?php echo base_url('user/user_fixed_item'); ?>">ITEMS</a></li>
           
        </ul>
     
        <ul class="nav navbar-nav navbar-right">
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" style="margin-top:5px;"data-toggle="dropdown"><?php 
                    
                    if ($this->session->userdata('login')) {
                        $var = $this->session->userdata('login');
                        echo '<p class="glyphicon glyphicon-user"></p>'.'&nbsp'.$var["name"].'!';
                        }

                    ?>
 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url() . "user/user_account"?>">Account dashboard</a></li>
              <li><a href="<?php echo base_url() . "account/logout"?>">Account Logout</a></li>
             
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

</body>
</html>
