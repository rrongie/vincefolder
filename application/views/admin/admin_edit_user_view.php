<script type="text/javascript">

   $(document).ready(function(){
  $('#cp').click(function(){
      var currentId = $(this).attr('data-id');
      //alert(currentId);
      
   $.post("<?= base_url() . 'admin/user_changepassword/"+currentId+"/'?>",
    $("#form1").serialize(),
    function(result) {
     $("#error_message").html(result);
   },"html");
  });    
        });


</script>

<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            
           
           <a href="<?php echo site_url('admin/manage_user'); ?>" class="list-group-item">Account list</a>
            <a href="<?php echo site_url('admin/adduser'); ?>" class="list-group-item ">Create User</a>
           <a href="<?php echo site_url('admin/manage_user'); ?>" class="list-group-item active">Edit User</a>
          </div>
  </div>
          
         



           <?php echo form_open('admin/user_account_validate/'.$this->uri->segment(3));?>
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading"> Edit User</div>
          <div class="panel-body">
                  <?php

            if ($this->session->flashdata('edit_user_error')) {
            echo '<div class="alert alert-warning text-center">';
            echo $this->session->flashdata('edit_user_error');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }
        
        

                if ($this->session->flashdata('edit_user_success')) {
              echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('edit_user_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }


            ?>
{personal}

                                  <h4>Personal Information</h4>
                  <div class="row">

                  <div class="col-md-3">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="fname">First Name</label>
                    <div class="controls">
                      <input size="30" id="fname" value="{fname}"name="fname" type="text" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>
                 
                  <!-- Text input-->
                      <div class="control-group">
                      <label class="control-label" for="mobile">Username:</label>
                      <div class="controls">
                        <input size="30" id="mobile" value="{username}"name="username" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

               
  
                        



                          <!-- Select Basic -->
                    <div class="control-group">
                      <label class="control-label" for="gender">Position</label>
                      <div class="controls">
                          Current position:<button type="button" class="btn btn-xs btn-success">{type}</button><br><select id="gender" name="type" class="input-xlarge" >
                          
                          <option>User</option>
                          <option>admin</option>
                          <option>staff</option>
                        </select>
                      </div>
                    </div>

                         <!-- Text input-->
                                 <!-- <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select required id="category" name="category">
                                        <option  value=""></option>
                                          {department}
                                          <option value="">{name}</option>
                                          {/department}
                                      </select>
                                    </div>
                                  </div> -->
              

                  </div>

                  <div class="col-md-9">
                    <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="lname">Last Name</label>
                      <div class="controls">
                        <input size="30" id="lname" value="{lname}"name="lname" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

              

                <!-- Text input-->
                                 <!-- <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select required id="category" name="category">
                                        <option  value=""></option>
                                          {department}
                                          <option value="">{name}</option>
                                          {/department}
                                      </select>
                                    </div>
                                  </div> -->
                 
                  </div>

                  </div>
      
                  <div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-info">Submit</button>
  <?php echo form_close(); ?>
    <button data-toggle="modal" data-target="#myModal" class="btn btn-danger">Change Password</button>
   
</div>

          </div>
   </div>
  </div>





</div><!-- row -->
</div><!--container -->






<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Change password</h4>
      </div>
      <div class="modal-body">
          <!-- boody here -->                      

              <form id="form1">
                  


                  <div id="error_message" style="color:red"></div>
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
                  <div class="col-md-5">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="cpassword">Confirm Password</label>
                    <div class="controls">
                      <input size="30" id="cpassword" name="cpassword" type="password" placeholder="" class="input-xlarge" required>
                    </div>
                  </div>


                  </div>
                
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                   <input type="button" id="cp" data-id="{id}" class="btn btn-info" value="Submit" />
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
              </div>
            </form>   
             


          <!-- end of body -->
      </div>
   
    </div>
  </div>
</div>
{/personal}
