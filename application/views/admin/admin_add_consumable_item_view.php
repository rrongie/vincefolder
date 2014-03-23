<script type="text/javascript">

   $(document).ready(function(){
  $('#add_department').click(function(){
          
   $.post("<?= base_url() . 'admin/add_department_validate/'?>",
    $("#form1").serialize(),
    function(result) {
     $("#error_message").html(result);
   },"html");
  });    
        });


      $(document).ready(function(){
  $('#add_supplier').click(function(){
          
   $.post("<?= base_url() . 'admin/add_supplier_validate/'?>",
    $("#form2").serialize(),
    function(result) {
     $("#error_message2").html(result);
   },"html");
  });    
        });


</script>

<div class="container">

<div class="row">
    <div class="col-md-3">
   
        <div class="list-group">
           
            
            <a href="<?php echo site_url('admin/add_consumable_item'); ?>" class="list-group-item active">Consumable Items</a>
              <a href="<?php echo site_url('admin/consumable'); ?>" class="list-group-item ">Consumable Items List</a>
          </div>
    </div>
<!--modal for add supplier -->

<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Add Supplier</b>
        </div>
             
    
            <div class="modal-body">
                                       <h4>Supplier Information</h4>
                                           <div id="error_message2" style="color:red;"></div>
                  <div class="row">
                  <form id="form2">
                  <div class="col-md-4">
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
                    </div>

               
                     <!-- Text input-->
                    <div class="control-group">
                     <label class="control-label" for="street">Street Address:</label>
                     <div class="controls">
                       <input size="80" id="street" name="address" type="text" placeholder="" class="input-xlarge" required>
              
                    </div>
                     </div>
                        

                 </div>

                  <div class="col-md-4">
               
                   <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="lname">Mobile:</label>
                      <div class="controls">
                        <input size="30" id="lname" value=""name="mobile" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>


                 
                  </div>

                  </div>     
            
                      <div class="modal-footer">
                  <a href="<?php echo site_url('admin/add_consumable_item');?>" class="btn btn-danger">Close</a>
                 <input type="button" id="add_supplier" class="btn btn-info" value="Submit" />
                </form>
              </div>
            </div>

        </div>
  </div>
</div>
<!--end modal for add supplier -->
          
<!--modal for add department-->


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Add Department</b>
        </div>
              <form id="form1">
            
              <div class="modal-body">
                      <div id="error_message" class="text-center btn-danger"></div>
                    <label for="category">Department Name:</label><input type="text" name="adddepartment" required> 
              </div>

               <div class="modal-footer">
                  <a href="<?php echo site_url('admin/add_consumable_item');?>" class="btn btn-danger">Close</a>
                 <input type="button" id="add_department" class="btn btn-info" value="Submit" />
              </div>
              </form>
    </div>
  </div>
</div>

<!-- end of modal -->
          

    <div class="col-md-9">
        <div class="panel panel-primary" id="panels">
               <div class="panel-heading">
             Add Consumable Items <button class="btn btn-default pull-right" data-toggle="modal" data-target=".bs-example-modal-sm2">Add Supplier</button><button class="btn btn-default pull-right" data-toggle="modal" data-target=".bs-example-modal-sm">Add Department</button>
          </div>
            <div class="panel-body">
              <?php
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open('admin/add_consumable_item_validate', $attributes);
            ?>

             <?php

            if ($this->session->flashdata('add_item_success')) {
            echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('add_item_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }

            ?>
       <fieldset>
          
                                <div class="row">

                                    <div class="col-md-3">
                                        <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="supplier_id" required>
                                        <option  name="" value=""></option>
                                          {supplier}
                                          <option value="{id}">{supplier_fname} {supplier_lname}</option>
                                          {/supplier}
                                      </select>
                                    </div>
                                  </div>


                                    <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="department_id" required>
                                        <option  name="" value=""></option>
                                          {department}
                                          <option value="{id}">{name}</option>
                                          {/department}
                                      </select>
                                    </div>
                                  </div>

                                                  
                            


                                                   <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="price">Item Price:</label>
                                      <div class="controls">
                                        <input size="30" id="price" name="item_price" min="0" max="99999"type="number" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                                 

                                                          <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="price">Item Quantity:</label>
                                      <div class="controls">
                                        <input size="30" id="price" name="item_qty" min="0" max="99999"type="number" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                           

                                    </div>

                                    <div class="col-md-9">
                                   

                                      <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="brand">Item Brand:</label>
                                      <div class="controls">
                                        <input size="30" id="brand" name="item_brand" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                                       <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Item Name:</label>
                                      <div class="controls">
                                        <input size="30" id="item_name" name="item_name" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>
                               

                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Unit:</label>
                                      <div class="controls">
                                        <input size="30" id="item_name" name="item_unit" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>   

                                      
                                    </div>

                                    </div>

                                  

                                    <div class="row">

                                    <div class="col-md-3">

                              

                                    </div>

                          

                                    
                            </div>
   
                             <div class="row">
                              <div class="col-md-12">
                              <!-- Button -->
                            <div class="control-group">
                              <label class="control-label" for="submit"></label>
                              <div class="controls">
                                <button id="submit" type="submit" class="btn btn-info">Submit</button>
                              </div>
                            </div>
                            </div>
                            </div>

    </div>
  </div>









</div> <!-- row -->
</div> <!-- container -->

