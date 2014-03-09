<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
                 <a href="<?php echo site_url('admin/manage_user'); ?>" class="list-group-item">Account list</a>
            <a href="<?php echo site_url('admin/adduser'); ?>" class="list-group-item active">Create User</a>
           
          </div>
  </div>
  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">
            <div class="panel-heading">
            Create User
            </div>
            <div class="panel-body">
              <div class="col-md-12">

           
            <?php

            if ($this->session->flashdata('add_user_error')) {
            echo '<div class="alert alert-warning text-center">';
            echo $this->session->flashdata('add_user_error');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }
        
        

                if ($this->session->flashdata('add_user_success')) {
              echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('add_user_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }


            ?>

            <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('admin/add_user_validate', $attributes);
            ?>
  <fieldset>

                                  <h4>Personal Information</h4>
                  <div class="row">

                  <div class="col-md-3">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="fname">First Name</label>
                    <div class="controls">
                      <input size="30" id="fname" name="fname" type="text" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>
                 
                  <!-- Text input-->
                      <div class="control-group">
                      <label class="control-label" for="mobile">Username:</label>
                      <div class="controls">
                        <input size="30" id="mobile" name="username" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

               
  
                        



                          <!-- Select Basic -->
                    <div class="control-group">
                      <label class="control-label" for="gender">Position</label>
                      <div class="controls">
                        <select id="gender" name="type" class="input-xlarge" required>
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
                        <input size="30" id="lname" name="lname" type="text" placeholder="" class="input-xlarge" required>
                        
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
                  
                 
                <h4>Login Information</h4>
                  <div class="row">


                  <div class="col-md-3">
                  <!-- Text input-->
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                      <input size="30" id="password" name="password" type="password" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>

                  </div>
                  <div class="col-md-9">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="cpassword">Confirm Password</label>
                    <div class="controls">
                      <input size="30" id="cpassword" name="cpassword" type="password" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>
                  </div>




                  </div>



                  <!-- button -->
                  <div class="control-group">
                  <label class="control-label" for="submit"></label>
                  <div class="controls">
                    <button id="submit" name="submit" class="btn btn-info">Submit</button>
                  </div>
                </div>   


            </div>
                
           </div>
  </div>
</div>

</div><!--container -->
</fieldset>
</form>