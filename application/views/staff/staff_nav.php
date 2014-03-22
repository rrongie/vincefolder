
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
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul style="color: white; " class="nav navbar-nav">
          <li style="font-size:15px; margin-top:5px;"><a href="<?php echo base_url('staff/fixed'); ?>">ITEMS</a></li>
           <li class="dropdown" style="font-size:15px; margin-top:5px;">

              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">FORMS/REPORTS</a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('staff/accountability'); ?>">ACCOUNTABILITY</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('staff/purchase'); ?>">PURCHASE ORDER</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('staff/borrowers'); ?>">BORROWER'S LIST</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('staff/receiving'); ?>">RECEIVING REPORT</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('staff/reconcile'); ?>">RECONCILE REPORT</a></li>

              </ul>

           </li>
           <li style="font-size:15px; margin-top:5px;"><a href="<?php echo site_url('staff/suppliers'); ?>">SUPPLIER</a></li>
         
             <li style="font-size:15px; margin-top:5px;"><a href="<?php echo site_url('staff/log_history'); ?>">LOG HISTORY</a></li>
        </ul>
        <ul class="nav navbar-nav pull-right">
          <li><a style="font-size:15px; margin-top:5px;" href="<?php echo base_url() . "account/logout"?>">LOGOUT</a></li>
        </ul>
     
      

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

</body>
</html>
