
<div class="container">

<div class="row">
               <div class="col-md-12">
                  <div class="panel panel-primary" id="panels">
                      <div class="panel-heading">Item Details </div>
                      <div class="panel-body">
                       <?php echo form_open('admin/view_item_validate/'.$this->uri->segment(3));?>
<!-- body -->
          <div class="row">   
            <?php

              if ($this->session->flashdata('edit_item_failed')) {
            echo '<div class="alert alert-danger text-center">';
            echo $this->session->flashdata('edit_item_failed');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }
            
            if ($this->session->flashdata('edit_item_success')) {
            echo '<div class="alert alert-success text-center">';
            echo $this->session->flashdata('edit_item_success');
            echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo '</div>';
      
            }

            ?>

                                    <div class="col-md-3">
                                        <!-- Text input-->
                                
                                  <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:
                                      </label>
                                  
                                       <div class="controls">
                                       <select / id="category" name="supplier_id" required>
                                       
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
                                         {department}
                                          <option value="{id}">{name}</option>
                                         {/department}
                                      </select>
                                    </div>
                                  </div>

                                                  
                                    {items}                            <!-- Select Basic -->
                                  <div class="control-group">
                                    <label class="control-label" for="mstatus">Item Type:</label>
                                   
                                    <div class="controls">
                                      <select id="mstatus" name="item_type" class="input-xlarge" disabled>
                                          <option value="{id}">{item_type}</option>
                                         
                                      </select>
                                    </div>
                                  </div>



                                                   <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="price">Item Price:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_price}" name="item_price" min="0" max="99999"type="number" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                                 

                                                          <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="price">Item Quantity:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_qty}" name="item_qty" min="0" max="99999"type="number" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                           

                                    </div>

                                    <div class="col-md-9">
                                   

                                      <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="brand">Item Brand:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_brand}" name="item_brand" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                                       <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Item Name:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_name}" name="item_name" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>
                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="unit">Unit:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_unit}" name="item_unit" type="text" placeholder="" class="input-xlarge">
                                        
                                      </div>
                                    </div>

                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Serial:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_serial}"id="item_name" name="item_serial" type="text" placeholder="" class="input-xlarge">
                                        
                                      </div>
                                    </div>   

                                      
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
{/items}
<?php echo form_close();?>
<!-- end of body -->

                      </div>
                   </div>
                </div>



</div><!-- end of row -->
</div><!-- end of container -->


