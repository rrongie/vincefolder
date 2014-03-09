<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('admin/suppliers'); ?>" class="list-group-item">Suppliers list</a>
         
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item">Add Supplier</a>
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item active">Supplier Details</a>
           
          </div>
  </div>
 		          <?php echo form_open('admin/edit_supplier_validate/'.$this->uri->segment(3));?>
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Supplier Details</div>
          <div class="panel-body">
             {sup}
                    <div class="col-md-6">

                  <div class="panel panel-default">
                  <div class="panel-heading">Supplier Contact Information <span class="pull-right"><a href="<?php echo site_url('customer/account')?>">Edit</a></span></div>
                  <div class="panel-body">
                    <address>                
                    <strong>{supplier_fname} {supplier_lname}</strong>
                    <br>{address}<br>
                    <abbr title="Mobile">Phone:</abbr> {mobile}<br>
                    
                    </address>
                  </div>

                  </div>

              </div>
             {/sup}                     
          </div>
        </div>

</div><!-- row -->
</div><!--container -->




