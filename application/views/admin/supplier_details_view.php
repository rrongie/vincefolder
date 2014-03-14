<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('admin/suppliers'); ?>" class="list-group-item">Suppliers list</a>
         
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item">Add Supplier</a>
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item active">Supplier Details</a>
           
          </div>
  </div>
 		         
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Supplier Details</div>
          <div class="panel-body">
             {sup}
                    <div class="col-md-6">

                  <div class="panel panel-default">
                  <div class="panel-heading">Contact Information <a href="#"><span class="pull-right" data-toggle="modal" data-target=".bs-example-modal-sm2">Edit</span></a></div>
                  <div class="panel-body">
                    <address>                
                    <strong>{supplier_fname} {supplier_lname}</strong>
                    <br>{address}<br>
                    <abbr title="Mobile">Phone:</abbr> {mobile}<br>
                    
                    </address>
                  </div>

                  </div>

              </div>
                                
          </div>
        </div>

</div><!-- row -->
</div><!--container -->



<!--modal for add supplier -->

<div class="modal fade bs-example-modal-sm2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Edit Contact</b>
        </div>
             
    
            <div class="modal-body">
                
                  <form id="form1">
                   <div class="row">


                  <div id="error_message" style="color:red"></div>
                  
                  <div class="col-md-4">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="fname">First Name:</label>
                    <div class="controls">
                      <input size="30" id="fname" value="{supplier_fname}"name="fname" type="text" placeholder="" class="input-xlarge" required>
                      
                    </div>
                  </div>
                 
                  <!-- Text input-->
                      <div class="control-group">
                      <label class="control-label" for="mobile">Last Name:</label>
                      <div class="controls">
                        <input size="30" id="mobile" value="{supplier_lname}"name="lname" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>

               
                     <!-- Text input-->
                <div class="control-group">
                 <label class="control-label" for="street">Street Address:</label>
                  <div class="controls">
              <input size="80" value="{address}" name="address" type="text" placeholder="" class="input-xlarge" required>
              
                  </div>
                </div>
                        

                 </div>

                  <div class="col-md-4">
               
                   <!-- Text input-->
                    <div class="control-group">
                      <label class="control-label" for="lname">Mobile:</label>
                      <div class="controls">
                        <input size="30" value="{mobile}" value=""name="mobile" type="text" placeholder="" class="input-xlarge" required>
                        
                      </div>
                    </div>


                 
                  </div>

                  </div>

                <label class="control-label" for="submit"></label>
                <div class="controls">
                  <input type="button" data-id="{id}"id="ajaxsub" class="btn btn-info" value="Submit" />
                  <a href="<?php echo site_url('admin/supplier_details/{id}');?>"><button class="btn btn-danger">Close</button></a>
                </div>
      </div> <!-- end of modal body -->  
            
             
           </form>

        </div>
  </div>
</div>

 {/sup} 

 <script type="text/javascript">

   $(document).ready(function(){
   $('#ajaxsub').click(function(){
    var currentId = $(this).attr('data-id');
    $.post("<?= base_url() . 'admin/supplier_edit_contact_validate/"+currentId+"/'?>",
    $("#form1").serialize(),
    function(result) {
    $("#error_message").html(result);
    },"html");
  });    
        });


</script>