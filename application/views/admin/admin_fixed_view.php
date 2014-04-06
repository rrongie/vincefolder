<div class="container">

<div class="row">
<div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo base_url('admin/fixed'); ?>" class="list-group-item active">Fixed Items</a>
            <a href="<?php echo base_url('admin/consumable'); ?>" class="list-group-item ">Consumable Items</a>
           
           
          </div>
  </div>
                  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Fixed Items 
              
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Company</th>
                      <th>Item Name</th>
                      <th>Item Brand</th>
                      <th>Serial</th>
                      <th>Asset Code</th>
                      <th>Status</th>
                      <th>Date Add</th>
                      <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
            </table>


          </div>
   </div>
  </div>

</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 7, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_fixed'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    
                    a = ' <a class="label label-info" href="edit_fixed_item/'+oObj.aData[0]+'">Update</a> ';
                    z = ' <a class="test label label-danger" href="delete_fixed_item/'+oObj.aData[0]+'">Remove</a> ';
                    b = ' <a class="label label-success" href="item_history/'+oObj.aData[0]+'">History</a> ';
                  return a + z + b;
                 
                },
                "aTargets": [ 8 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>



<!--modal for add + -->


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><b style="font-size:15px;">+ Form</b>
        </div>
              <!-- modal Body -->
              <div class="modal-body">
                      
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
                        
              </div>              

              <!-- end of modal body-->
    
    </div>
  </div>
</div>

<!-- end of  + modal -->
<script>

$(document).on('click', '.test', function(){

  return confirm("Do you want to remove?");

});

</script>

