<div class="container">

<div class="row">
	<div class="col-md-3">
	
		<div class="list-group">
            <a href="<?php echo site_url('customer/dashboard'); ?>" class="list-group-item active">Fixed</a>
            <a href="<?php echo site_url('customer/account'); ?>" class="list-group-item">Consumable Items</a>
            <a href="<?php echo site_url('admin/add_items'); ?>" class="list-group-item">Add Items</a>
           
          </div>
	</div>


                  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading"> Fixed Items <a href="<?php echo site_url('admin/add_items'); ?>" class="pull-right btn btn-default">Add Fixed Items</a></div>
          <div class="panel-body">
             
               <table id="accounts-view" class="table">
            <thead>
                <tr>
                      <th>Id</th>
                    <th>Quantity</th>
                    <th>Item Name</th>
                    <th>Amount</th>
                    <th>Serial</th>
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
        "aaSorting": [[ 3, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_fixed_items'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="account/'+oObj.aData[0]+'"><img src="<?php echo base_url() . 'assets/img/edit.png' ?>"></a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

