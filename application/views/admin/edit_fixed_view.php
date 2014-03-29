<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('admin/fixed'); ?>" class="list-group-item active">Item Details</a>
            <a href="<?php echo site_url('admin/fixed'); ?>" class="list-group-item ">Fixed Item List</a>
           
           
          </div>
  </div>
 
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Fixed Item Details</div>
          <div class="panel-body">
             
                                    <?php echo form_open('admin/edit_fixed_validate/'.$this->uri->segment(3));?>
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

                                    {items}    
              
                                    <div class="col-md-3">
                                        <!-- HERE -->
                                      
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
                                      <label class="control-label" for="item_name">Serial:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_serial}"id="item_name" name="item_serial" type="text" placeholder="" class="input-xlarge">
                                        
                                      </div>
                                    </div>   



                                               <!-- Text input-->
                                    <div class="control-group">
                                      <label class="control-label" for="item_name">Asset:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_asset}" name="item_asset" type="text" placeholder="" class="input-xlarge">
                                        
                                      </div>
                                    </div>   


                           

                                    </div>

                                    <div class="col-md-9">
                                    
                                      <div class="control-group">
                                      <label class="control-label" for="price">Item Price:</label>
                                      <div class="controls">
                                        <input size="30" value="{item_price}" name="item_price" min="0" max="99999"type="number" placeholder="" class="input-xlarge" required>
                                        
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





</div><!-- row -->
</div><!--container -->




