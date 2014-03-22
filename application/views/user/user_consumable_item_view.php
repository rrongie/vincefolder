<div class="container">

<div class="row">
<div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo base_url('user/user_fixed_item'); ?>" class="list-group-item">Fixed Items</a>
            <a href="<?php echo base_url('user/user_consumable_item'); ?>" class="list-group-item active">Consumable Items</a>
           
           
          </div>
  </div>
                  <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Consumable Items 
             
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Company</th>
                      <th>Item Brand</th>
                      <th>Department</th>
                      <th>Unit</th>
                      <th>Quantity</th>
                      <th>Date Add</th>
                      
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
             
                "aTargets": [ 6 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>



