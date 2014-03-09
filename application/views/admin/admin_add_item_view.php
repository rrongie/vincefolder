<div class="container">

<div class="row">
    <div class="col-md-3">
   
        <div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item">Fixed Consumable</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Consumable Items</a>
            <a href="<?php echo site_url('admin/add_items'); ?>" class="list-group-item active">Add Items</a>
           
          </div>
    </div>

            <?php
                  $attributes = array('class' => 'form-horizontal');
                  echo form_open('admin/add_item', $attributes);
            ?>

    <div class="col-md-9">
        <div class="panel panel-primary" id="panels">
               <div class="panel-heading">
             Add Items <a href="<?php echo site_url('administrator/book_add'); ?>" class="pull-right btn btn-default">Add Supplier</a> <a href="<?php echo site_url('admin/add_department'); ?>" class="pull-right btn btn-default">Add department</a>
          </div>
            <div class="panel-body">
       <fieldset>
          
                                <div class="row">

                                    <div class="col-md-3">
                                        <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="supplier_id">
                                        <option  name="" value=""></option>
                                          {supplier}
                                          <option value="{supplier_id}">{supplier_fname} {supplier_lname}</option>
                                          {/supplier}
                                      </select>
                                    </div>
                                  </div>


                                    <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="department_id">
                                        <option  name="" value=""></option>
                                          {department}
                                          <option value="{department_id}">{name}</option>
                                          {/department}
                                      </select>
                                    </div>
                                  </div>

                                                   <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="price">Item Price:</label>
                                      <div class="controls">
                                        <input size="30" id="price" name="item_price" min="0" max="99999"type="number" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                 

                           

                                    </div>

                                    <div class="col-md-9">
                                   

                                      <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="brand">Item Brand:</label>
                                      <div class="controls">
                                        <input size="30" id="brand" name="item_brand" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                       <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Item Name:</label>
                                      <div class="controls">
                                        <input size="30" id="item_name" name="item_name" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>
                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="unit">Unit:</label>
                                      <div class="controls">
                                        <input size="30" id="unit" name="item_unit" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                          

                                         <!-- Text input-->
                                            <div class="control-group">
                                      <label class="control-label" for="quantity">Quantity</label>
                                      <div class="controls">
                                        <input id="quantity" name="item_quantity" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                    

                              


                                    </div>

                                    </div>

                                  

                                    <div class="row">

                                    <div class="col-md-3">

                              

                                    </div>

                                    <div class="col-md-9">
                                      <!-- Text input-->
                            

                                 
                                 

                                    <!-- Select Basic -->
                               

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