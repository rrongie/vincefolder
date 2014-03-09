<div class="container">

<div class="row">
	<div class="col-md-3">
	
		    <div class="list-group">
             <a href="<?php echo site_url('admin/suppliers'); ?>" class="list-group-item active">Suppliers list</a>
         
            <a href="<?php echo site_url('admin/add_supplier'); ?>" class="list-group-item">Add Supplier</a>
           
        </div>


	</div>
	<div class="col-md-9">
		<div class="panel panel-primary" id="panels">
            <div class="panel-heading">
         List of suppliers
            </div>
            <div class="panel-body">


         
            			   <table id="accounts-view" class="table">
				            <thead>
				                <tr>
				                      <th>Id</th>
				                   
				                    <th>First Name</th>
				                    <th>Last Name</th>
				                    <th>Address</th>
				                    <th>Mobile</th>
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
        "aaSorting": [[ 3, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_supplier'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="supplier_details/'+oObj.aData[0]+'"><img src="<?php echo base_url() . 'assets/img/edit.png' ?>"></a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>