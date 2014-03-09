<div class="container">

<div class="row">
    <div class="col-md-3">
    
        <div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item">Fixed</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Consumable Items</a>
            <a href="<?php echo site_url('admin/add_items'); ?>" class="list-group-item active">Add Items</a>
           
          </div>
    </div>

            <?php
                  $attributes = array('class' => 'form-horizontal', 'id' => 'login');
                  echo form_open('admin/add_fixed_item', $attributes);
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
                                       <select / id="category" name="supplier_name">
                                        <option  value=""></option>
                                          {supplier}
                                          <option value="">{supplier_fname} {supplier_lname}</option>
                                          {/supplier}
                                      </select>
                                    </div>
                                  </div>


                                    <!-- Text input-->
                                  <div class="control-group">
                                    <label class="control-label" for="title">Department Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="department">
                                        <option  value=""></option>
                                          {department}
                                          <option value="">{name}</option>
                                          {/department}
                                      </select>
                                    </div>
                                  </div>

                                                   <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="fname">Item Price:</label>
                                      <div class="controls">
                                        <input size="30" id="fname" name="item_price" min="0" max="99999"type="number" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                 

                           

                                    </div>

                                    <div class="col-md-9">
                                   

                                      <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="city">Item Brand:</label>
                                      <div class="controls">
                                        <input size="30" id="city" name="city" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                       <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="fname">Item Name:</label>
                                      <div class="controls">
                                        <input size="30" id="fname" name="item_name" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>
                                             <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="city">Unit:</label>
                                      <div class="controls">
                                        <input size="30" id="city" name="city" type="text" placeholder="" class="input-xlarge" />
                                        
                                      </div>
                                    </div>

                                          

                                         <!-- Text input-->
                                            <div class="control-group">
                                      <label class="control-label" for="telephone">Quantity</label>
                                      <div class="controls">
                                        <input id="telephone" name="quantity" type="text" placeholder="" class="input-xlarge" />
                                        
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
                                <button id="submit" name="submit" class="btn btn-info">Submit</button>
                              </div>
                            </div>
                            </div>
                            </div>

    </div>
  </div>









</div> <!-- row -->
</div> <!-- container -->