

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
          <li style="font-size:15px; margin-top:5px;"><a href="<?php echo base_url('admin/fixed'); ?>">ITEMS</a></li>
           <li class="dropdown" style="font-size:15px; margin-top:5px;">

              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">SUPPLY</a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li style="font-size:15px; margin-top:5px;"><a href="<?php echo site_url('admin/suppliers'); ?>">SUPPLIERS</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/supplier_c'); ?>">SUPPLIER ITEMS (CONSUMABLE)</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/supplier_f'); ?>">SUPPLIER ITEMS (FIXED)</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/accountability'); ?>">ASSIGN ITEM (ACCOUNTABILITY)</a></li>
              </ul>

           </li>


<li class="dropdown" style="font-size:15px; margin-top:5px;">

              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">LISTS</a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
               <!-- <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/purchase_list'); ?>">PURCHASES LIST</a></li > -->
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/borrowers'); ?>">BORROWERS LIST</a></li>
              </ul>

           </li>

<li class="dropdown" style="font-size:15px; margin-top:5px;">

              <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">REPORTS</a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="drop1">
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/receiving'); ?>">RECEIVING REPORT</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/reconcile'); ?>">RECONCILE REPORT</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/consumables_list'); ?>">CONSUMABLE REPORT</a></li>
                <li role="presentation"><a style="font-size:15px; margin-top:5px;" role="menuitem" tabindex="-1" href="<?php echo site_url('admin/logger'); ?>">ITEMS ADDED REPORT</a></li>
              
              </ul>

           </li>

           <?php 

           $var = unserialize($_COOKIE['ci_session']);

           $type = $var['login']['type'];
           if ($type == 'admin') { ?>
           
           <!-- <li style="font-size:15px; margin-top:5px;"><a href="<?php echo site_url('admin/logger'); ?>">ITEMS ADDED REPORT</a></li> -->
      <li style="font-size:15px; margin-top:5px;"><a href="<?php echo site_url('admin/manage_user'); ?>">MANAGE USER</a></li>

            <?php } ?>

           
            
           
           
        </ul>
        <ul class="nav navbar-nav pull-right">
        <?php 
          $sess = $this->session->userdata('login');
          $name = $sess['name']
        ?>
          <li><a style="font-size:15px; margin-top:5px"><?php echo $name?></a></li>
          <li><a style="font-size:15px; margin-top:5px;" href="<?php echo base_url() . "account/logout"?>">LOGOUT</a></li>
        </ul>
     
      

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>

</body>
</html>
