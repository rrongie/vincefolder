
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
              <a href="<?php echo site_url('admin/add_items'); ?>"><button class="btn btn-default pull-right">Add Consumable item</button></a>
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
                      <th>Price</th>
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
        "aaSorting": [[ 9, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_consumable'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    z ='<a class="label label-danger" href="out_item/'+oObj.aData[0]+'">-</a>';
                    a = ' <a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    b = '<a class="label label-primary" href="in_item/'+oObj.aData[0]+'">+</a>';
                    return z + a + b;
                },
                "aTargets": [ 8 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

