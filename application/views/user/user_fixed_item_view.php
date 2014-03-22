
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
              <a href="<?php echo site_url('admin/add_fixed_item'); ?>"><button class="btn btn-default pull-right">Add Fixed item</button></a>
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Item Brand</th>
                      <th>Item Name</th>
                      <th>Department</th>
                      <th>Item type</th>
                      <th>Item Serial</th>
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
        "sAjaxSource": "<?php echo site_url('user/datatables_fixed'); ?>",
        "aoColumnDefs": [
            {
                
                "aTargets": [ 9 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>