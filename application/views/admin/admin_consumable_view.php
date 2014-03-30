
<div class="container">

<div class="row">
<div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo base_url('admin/fixed'); ?>" class="list-group-item ">Fixed Items</a>
            <a href="<?php echo base_url('admin/consumable'); ?>" class="list-group-item active">Consumable Items</a>
           
           
          </div>
  </div>
                  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Comsumable Items 
              <a href="<?php echo site_url('admin/add_consumable_item'); ?>"><button class="btn btn-default pull-right">Add Consumable item</button></a>
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Brand</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Date Add</th>
                      <th> &nbsp; Action</th> 
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
            </table>
<?php if ($cart == TRUE) { ?>
       <hr/>
       <legend>Requested Items</legend>
       <table id="accounts-view" class="table table-bordered">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Item Brand</th>
            <th>Item Price</th> 
            <th>Item Quantity</th>
            <th>Item Subtotal</th>

          </tr>
        </thead>
        <tbody>
          {cartdata}
          <tr> 
            <td>{name}</td> 
            <td>{brand}</td>
            <td>{price}</td>
            <td>{qty}</td>
            <th>{subtotal}</th>
          </tr>
          {/cartdata}
        </tbody>
        <tfoot>
        </tfoot>
      </table>

     <div class="text-center"> 
      
        <button class="final_con btn btn-info">Finalize Request</button>
        <a class="btn btn-danger" href="<?php echo site_url('admin/clear_form_con')?>" >Destroy</a>

      </form>
</div>

      <?php } ?>


          </div>
   </div>

  

  </div>





</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 8, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_consumable'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    z ='<a class="remove_con label label-danger" data-itemidcon="'+oObj.aData[0]+'" data-toggle="modal" data-target=".bs-example-modal-sm1" href="#/'+oObj.aData[0]+'">-</a>';
                    a = ' <a class="label label-info" href="edit_consumable_item/'+oObj.aData[0]+'">Update</a> ';
                    b = '<a data-itemidcon = "'+oObj.aData[0]+'"class="add_con label label-primary" data-toggle="modal" data-target=".bs-example-modal-sm" href="#/'+oObj.aData[0]+'">+</a>';
                    return z + a + b;
                },
                "aTargets": [ 7 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

<script>

$(document).on('click', '.add_con', function(){

  var id = $(this).data('itemidcon');
  $('#add_con').val(id);

});

</script>

<script>

$(document).on('click', '.remove_con', function(){

  var id = $(this).data('itemidcon');
  $('#remove_con').val(id);

});

</script>

<script>

$(document).on('click', '.final_con', function(){

 $('#final_con').modal('show');

});

</script>

<!--modal for add + -->


<div class="modal fade bs-example-modal-sm" id="final_con" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>Additional Infomation        </div>
              <!-- modal Body -->
              <div class="modal-body text-center">


              <form action="<?php echo site_url('admin/finalize_con')?>" method="POST">
                      
          <input id="add_con" type="hidden" name="item-id" value>
                            <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="name">Requestor Name</label>
        <div class="controls">
          <input id="name" name="r_name" type="text" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="idnum">Requestor's Id</label>
        <div class="controls">
          <input id="idnum" name="r_id" type="text" placeholder="" class="input-xlarge" required="">
          <input type="hidden" name="cart_data" value='<?php echo serialize($this->cart->contents())?>'>
          
        </div>
      </div>

      <!-- Select Basic -->
      <div class="control-group">
        <label class="control-label" for="dept">Department</label>
        <div class="controls">
          <select id="dept" name="dept" class="input-xlarge">
            <option>...</option>
            {department}
            <option>{name}</option>
            {/department}
          </select>
        </div>
      </div>
      <br/><br/>
      <!-- Text input-->
      <div class="control-group">
        <div class="controls">
          <input class="btn btn-info btn-large genpdf" id="id" name="id" value="Submit" type="submit" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

</form>
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  + modal -->





<!--modal for add - -->


<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">Consumable Request</b>
        </div>
              <!-- modal Body -->
              <div class="modal-body text-center">

              <form action="<?php echo site_url('admin/remove_con')?>" method="POST">
                      
                            <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="name">Quantity</label>
        <div class="controls">
          <input id="remove_con" type="hidden" name="item-id" value>
          <input id="name" name="qty" type="number" placeholder="" size="2" required="">
          
        </div>
      </div>
  <br/>

            <div class="control-group">
        <div class="controls">
          <input class="btn btn-info btn-large genpdf" id="id" name="id" value="Submit" type="submit" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

</form>
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  - modal -->

<!--modal for add + -->


<div class="modal fade bs-example-modal-sm" id="" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>Additional Infomation        </div>
              <!-- modal Body -->
              <div class="modal-body text-center">


              <form action="<?php echo site_url('admin/add_consumable')?>" method="POST">
                      
          <input id="add_con" type="hidden" name="item-id" value>
                            <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="name">Quantity</label>
        <div class="controls">
          <input id="name" name="qty" type="text" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Text input-->
      <div class="control-group">
        <label class="control-label" for="idnum">Delivery Number</label>
        <div class="controls">
          <input id="idnum" name="deliverynum" type="text" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

      <!-- Select Basic -->
      <div class="control-group">
        <label class="control-label" for="dept">Department</label>
        <div class="controls">
          <select id="dept" name="dept" class="input-xlarge">
            <option>...</option>
            {department}
            <option>{name}</option>
            {/department}
          </select>
        </div>
      </div>
      <br/><br/>
      <!-- Text input-->
      <div class="control-group">
        <div class="controls">
          <input class="btn btn-info btn-large genpdf" id="id" name="id" value="Submit" type="submit" placeholder="" class="input-xlarge" required="">
          
        </div>
      </div>

</form>
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  + modal -->
