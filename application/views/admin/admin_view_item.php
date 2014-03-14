{items}
<div class="container">

<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item active">Item Details</a>
          
           
  </div>
  </div>
               <div class="col-md-9">
                  <div class="panel panel-primary" id="panels">
                      <div class="panel-heading">Item Details </div>
                      <div class="panel-body">
                      
<!-- body -->
    <div class="row">

                                    <div class="col-md-3">
                                        <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="supplier_id" required>
                                          
                                          <option value="{id}">{supplier_fname} {supplier_lname}</option>
                                          
                                          
                                         
                                         
                                      </select>
                                    </div>
                                  </div>


                                    <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="department_id" required>
                                       
                                          <option value="{id}">{name}</option>
                                        
                                      </select>
                                    </div>
                                  </div>

                                                  
                                                                <!-- Select Basic -->
                                  <div class="control-group">
                                    <label class="control-label" for="mstatus">Item Type:</label>
                                    <div class="controls">
                                      <select id="mstatus" name="item_type" class="input-xlarge" required>
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
                                        <input size="30" value="{item_unit}" name="item_unit" type="text" placeholder="" class="input-xlarge" required>
                                        
                                      </div>
                                    </div>

                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Serial:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_serial}"id="item_name" name="item_serial" type="text" placeholder="" class="input-xlarge" required>
                                        
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

<!-- end of body -->

                      </div>
                   </div>
                </div>



</div><!-- end of row -->
</div><!-- end of container -->


