

<div class="container">

<div  style="border-radius: 4px; background-color:white" class="col-md-12 text-center panel-body">
Date Range <input type="text" name="reservation" id="reservation" />
</div>

<div class="row">

<div class="col-md-3">
  
   
  </div>
                  <div class="col-md-12">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Reconcile Report/Fixed Items 
             
         </div>
          
          <div class="panel-body">
               
               <table id="accounts-view" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Company</th>
                      <th>Name</th>
                      <th>Department</th>
                      <th>Serial</th>
                      <th>Asset Code</th>
                      <th>Status</th>
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
  

    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Reconcile Report/Consumable Items 
              
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view1" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Brand</th>
                      <th>Name</th>
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
  </div>


</div><!-- end of row -->
</div><!-- end of container -->


<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 7, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_reconcile_fixed'); ?>",
        "aoColumnDefs": [
            {
                
                  
                 
                
                "aTargets": [ 7 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>


<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view1').dataTable( {
        "aaSorting": [[ 6, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_reconcile_consumable'); ?>",
        "aoColumnDefs": [
            {
                
                "aTargets": [ 6 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>




<script type="text/javascript">
$(document).ready(function() {
    $('#reservation').daterangepicker();
});
</script>