<div class="container">

<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item active">Fixed & Consumable Items</a>
               <a href="<?php echo site_url('admin/add_items'); ?>" class="list-group-item">Add Item</a>
           
          </div>
  </div>


                  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Fixed & Comsumable list items</div>
          <div class="panel-body">
             
               <table id="accounts-view" class="table">
            <thead>
                <tr>
                      <th>Supplier Name</th>
                      <th>Department Name</th>
                      <th>Item Brand</th>
                      <th>Item Name</th>
                      <th>Item type</th>
                      <th>Item Unit</th>
                      <th>Item Quantity</th>
                      <th>Item Price</th>
                      <th>Date Add</th>
                      <th>View</th>
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
        "aaSorting": [[ 9, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_items'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="account/'+oObj.aData[0]+'"><img src="<?php echo base_url() . 'assets/img/edit.png' ?>"></a>';
                },
                "aTargets": [ 9 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

