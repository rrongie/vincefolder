<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('admin/suppliers'); ?>" class="list-group-item">Suppliers list</a>
         
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item active">Add Supplier</a>
           
           
          </div>
  </div>
 		 <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('admin/add_supplier_validate1', $attributes);
            ?>
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Add Suplier</div>
         <div class="panel-body">
             
             	       <?php
			
			if ($this->session->flashdata('add_success')) {
            echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('add_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }


            ?>

                                  <h4>Personal Information</h4>
                  <div class="row">

                  <div class="col-md-3">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="fname">First Name:</label>
                    <div class="controls">
                      <input size="30" id="fname" value=""name="fname" type="text" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>
                 
                  <!-- Text input-->
                      <div class="control-group">
                      <label class="control-label" for="mobile">Last Name:</label>
                      <div class="controls">
                        <input size="30" id="mobile" value=""name="lname" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div




                  <!-- Text input-->
                      <div class="control-group">
                      <label class="control-label" for="mobile">Company:</label>
                      <div class="controls">
                        <input size="30" id="mobile" value=""name="company" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>
               
  					         <!-- Text input-->
					<div class="control-group">
					  <label class="control-label" for="street">Street Address:</label>
					  <div class="controls">
					    <input size="80" id="street" name="address" type="text" placeholder="" class="input-xlarge" required>
					    
					  </div>
					</div>
                        

                 </div>

                  <div class="col-md-9">
               
              	   <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="lname">Contact Number:</label>
                      <div class="controls">
                        <input size="30" id="lname" value=""name="mobile" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

                      <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="lname">Email:</label>
                      <div class="controls">
                        <input size="30" id="lname" value=""name="email" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

                 
                  </div>

                  </div>
      
                  <div class="control-group">
  <label class="control-label" for="submit"></label>
  <div class="controls">
    <button id="submit" name="submit" class="btn btn-info">Submit</button>


          </div>
   </div>
  </div>





</div><!-- row -->
</div><!--container -->




