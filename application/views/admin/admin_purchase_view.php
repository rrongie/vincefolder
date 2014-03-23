<div class="container">

<div class="row">
                  <div class="col-md-12">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Purchase Order</div>
          <div class="panel-body">
             
             <div class="text-center">
               <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:</label>
                                    <div class="controls">
                                    <form action="<?php echo site_url('admin/purchase')?>" method="POST">
                                      <input type="hidden" name="itemid" class="itemid" value>
                                      <select id="supplier_id" name="supplier_id" required>
                                        <option  name="" value=""></option>
                                          {supplier}
                                          <option value="{id}">{company}</option>
                                          {/supplier}
                                      </select>
                                    </form>
                                       
                                    </div>
                  </div>
             </div>
                

            
           
               <table id="accounts-view" class="table table-bordered">
            <thead>
                <tr>
                      <th>Item Id</th>
                      <th>Company</th>
                      <th>Item Brand</th>
                      <th>Item Name</th>
                      <th>Item Price</th>
                      <th>Action</th>
                    
                     
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
            </table>

              <div class="col-md-12">

       <?php if ($cart == TRUE) { ?>
       <hr/>
       <legend>Items that are added to the form.</legend>
       <table id="accounts-view" class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>

          </tr>
        </thead>
        <tbody>
          {cart_data}
          <tr> 
            <td>{name}</td> 
            <td>{brand}</td>
            <td>{qty}</td>
            <th>{price}</th>
          </tr>
          {/cart_data}
          <tr>
          <td colspan="2"></td>
          <td colspan=""><b>Total</b></td>
          <td colspan=""><?php echo $this->cart->total()?></td>
          <tr>
        </tbody>
        <tfoot>
        </tfoot>
      </table>

      <?php } ?>

    </div>

<hr>
<div class="text-center col-md-12" >
  <a href="#" class="finalize_po btn btn-lg btn-info">Finalize Purchase Order</a> 
  <a href="<?php echo site_url('admin/clear_form_po'); ?>" class="btn btn-lg btn-danger">Clear Form</a> 
</div>
          </div>
   </div>
  </div>





</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 0, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_po/{supplier_id}'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    b = '<a class="label label-info getmodal" data-toggle="modal"  data-itemid="'+oObj.aData[0]+'" data-method="add"  href="#">Add Item</a>';
                 
                    return b;
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

<script type="text/javascript">
  
  $(document).on('click', '.getmodal', function(){

    var method = $(this).data('method');
    var id = $(this).data('itemid');

    if (method == 'remove') {
      $(".itemid-item").val(id);
      $('#remove').modal('show');
    }else{
      $(".itemid-item").val(id);
      $('#add').modal('show');
    }


  });


</script>>

<script type="text/javascript">
  
  $(document).on('click', '.finalize_po',function(e){

    $('#po_form').modal('show');


  });

</script>

<script type="text/javascript">
  
  $(document).on('change', '#supplier_id', function(e){
    this.form.submit();
  });

</script>

<!--modal for add + -->


<div id="add" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Add Quantity</b>
        </div>
              <!-- modal Body -->
              <div class="modal-body text-center">
                      
      <form action="<?php echo site_url('admin/add_po_qty')?>" method="POST">
        
        <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="name">Quantity:</label>
        <div class="controls">
         <input type="hidden" name="itemid-item" class="itemid-item" value>
          <input id="name" name="qty" type="number" placeholder="" class="input-xlarge" required>
          
        </div>
      </div>
     
      <!-- Text input-->
      <div class="control-group">
        <div class="controls">
          <input class="btn btn-info btn-large genpdf" id="id" name="id" value="Submit" type="submit" placeholder="" class="input-xlarge" required>
          
        </div>
      </div>

      </form>
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  + modal -->


<!--modal for add + -->


<div id="po_form" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Finalize Purchase Order</b>
        </div>
              <!-- modal Body -->
              <div class="modal-body text-center">
                      
      <form action="<?php echo site_url('admin/view_po_form')?>" method="POST">
        

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="dept">Department</label>
  <div class="controls">
     <select id="" name="department_id" required>
                                        <option  name="" value=""></option>
                                          {department}
                                          <option value="{id}">{name}</option>
                                          {/department}
                                      </select>
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="terms">Terms</label>
  <div class="controls">
    <select id="terms" name="terms" class="input-xlarge">
      <option>15 Days</option>
      <option>30 Days</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="genpopdf"></label>
  <div class="controls">
    <button id="genpopdf" name="genpopdf" class="btn btn-info">Generate PO Form</button>
  </div>
</div>


      </form>
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  + modal -->
