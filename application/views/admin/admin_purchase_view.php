<div class="container">

<div class="row">
                  <div class="col-md-12">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Purchase Order</div>
          <div class="panel-body">
             
             
                <div class="control-group">
                                    <label class="control-label" for="title">Supplier Name:</label>
                                    <div class="controls">
                                       <select / id="category" name="supplier_id" required>
                                        <option  name="" value=""></option>
                                          {supplier}
                                          <option value="{id}">{supplier_fname} {supplier_lname}</option>
                                          {/supplier}
                                      </select>
                                    </div>
                  </div>

            
            <table id="accounts-view" class="table">
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Item Brand</th>
                      <th>Item Name</th>
                      <th>Item type</th>
                      <th>Item Unit</th>
                      <th>Item Quantity</th>
                      <th>Item Price</th>
                      <th>Date Add</th>
                      <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            </tfoot>
            </table>
<hr>
<div class="text-center col-md-12" >
 <a href="<?php echo site_url('admin/finalize_form_po'); ?>" class="btn btn-lg btn-info">Finalize Purchase Order</a> 
</div>
          </div>
   </div>
  </div>





</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 10, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_purchase_order'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    z ='<a class="label label-danger" href="po_remove_item/'+oObj.aData[0]+'">-</a>';
                    a = ' <a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    b = '<a class="label label-primary" href="po_add_item/'+oObj.aData[0]+'">+</a>';
                    return z + a + b;
                },
                "aTargets": [ 9 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

