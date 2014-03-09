<div class="container">

<div class="row">
	<div class="col-md-3">
	
		    <div class="list-group">
             <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item">Fixed</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Consumable Items</a>
            <a href="<?php echo site_url('admin/add_items'); ?>" class="list-group-item active">Add Items</a>
           
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
          Add Department <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Supplier</a> <a href="<?php echo site_url('admin/add_items'); ?>" class="pull-right btn btn-default">Add Item</a>
            </div>
            <div class="panel-body">


           <?php

                  if ($this->session->flashdata('department_error')) {
            echo '<div class="alert alert-warning text-center">';
            echo $this->session->flashdata('department_error');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }




            if ($this->session->flashdata('dept_success')) {
            echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('dept_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }

            ?>

                  <?php
                  echo validation_errors();
                  ?>

                  <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'add_category');
                  echo form_open('admin/add_department_validate', $attributes);
                  ?>


                  <div class="col-md-offset-3 col-md-8">
                    <label for="category">Department Name: </label><input type="text" name="adddepartment" required> <button class="btn btn-info" type="submit">Submit</button>
                  </div>

            </form>





	 
            </div>
           
          </div>
	</div>
</div>


</div>