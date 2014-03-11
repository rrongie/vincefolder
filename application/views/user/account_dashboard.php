<div class="container">
{user_info}
<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item active">Account Dashboard</a>
            
          </div>
	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Account Dashboard
            </div>
            <div class="panel-body">
           			<div class="col-md-12">

					      <div class="row">
       
            
            <div class="col-md-12">

        
           
<fieldset>

<!-- Form Name -->
          <?php

                  if ($this->session->flashdata('edit_success')) {
            echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('edit_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }
          ?>
<?php echo form_open('user/account_validate');?>
<h4>Edit Account Information</h4>
<div class="row">

<div class="col-md-5">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="fname">First Name:</label>
  <div class="controls">
    <input value="{fname}" size="30" id="fname" name="fname" type="text" placeholder="" class="input-xlarge" required>

  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="email">Username:</label>
  <div class="controls">
    <input value="{username}" size="30" id="email" name="email" type="text" placeholder="" class="input-xlarge" disabled>
  
  </div>
</div>


 <!-- Select Basic -->
                
  <label class="control-label" for="gender">Position:</label>
      <div class="controls">
        Current position:<button type="button" class="btn btn-xs btn-success">{type}</button><br>
                       
      </div>
                    


</div>

<div class="col-md-7">
  <!-- Text input-->
  <div class="control-group">
    <label class="control-label" for="lname">Last Name:</label>
    <div class="controls">
      <input value="{lname}" size="30" id="lname" name="lname" type="text" placeholder="" class="input-xlarge" required>
   
    </div>
  </div>



        

</div>
	
</div>
<div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
   <button id="submit" name="submit" class="btn btn-info">Submit</button>
  <?php echo form_close() ?>
  <button data-toggle="modal" data-target="#myModal" class="btn btn-danger">Change Password</button>
  </div>
</div>
            	</div>
          
           
            </div>
          </div>
	</div>

{/user_info}
</div><!-- end of row-->



</div><!-- end of container-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Account Change password</h4>
      </div>
      <div class="modal-body">
          <!-- boody here -->                      

        <form id="form1">
                  

<?php 
echo validation_errors(); 

if ($this->session->flashdata('success_change_pw')) {
            $wishlist = $this->session->flashdata('success_change_pw');

            echo '<div class="text-center alert alert-warning">';
            echo $wishlist;
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'; 
            echo '</div>';
          }  
?>
  <div id="error_message" style="color:red"></div>
<div class="row">
   <div class="col-md-5">
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="old_password">Old Password</label>
      <div class="controls">
        <input size="30" id="old_password" name="old_password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>
     <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="conf_password">Confirm Password</label>
      <div class="controls">
        <input size="30" id="conf_password" name="conf_password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>


</div>
<div class="row">
    <div class="col-md-5">
    <!-- Text input-->
    <div class="control-group">
      <label class="control-label" for="password">New Password</label>
      <div class="controls">
        <input size="30" id="password" name="password" type="password" placeholder="" class="input-xlarge" required>
      </div>
    </div>


    </div>
   
  </div>
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                   <input type="button" id="cp" class="btn btn-info" value="Submit" />
                   <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
              </div>
    </form>   
       <!-- end of body -->
      </div>
   
    </div>
  </div>
</div>

<script type="text/javascript">

   $(document).ready(function(){
  $('#cp').click(function(){
      //alert('hello');
      
   $.post("<?= base_url() . 'user/change_password/'?>",
    $("#form1").serialize(),
    function(result) {
     $("#error_message").html(result);
   },"html");
  });    
        });


</script>