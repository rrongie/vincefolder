

<div class="container">

<div  style="border-radius: 4px; background-color:white" class="col-md-12 text-center panel-body">
Date Range <input type="text" name="reservation" id="reservation" />
</div>

<div class="row">

<div class="col-md-3">
  
   
  </div>
                  <div class="col-md-12">

    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Receiving Reports
              
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view1" class="table">
                
            <thead>
                <tr>
                      <th>Id</th>
                      <th>Date</th>
                      <th>Supplier</th>
                      <th>Item Name</th>
                      <th>Quantity</th>
                      <th>Unit Price</th>
                      <th>Requestor</th>
                      <th>Net Cost</th>
                  
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
    $('#accounts-view1').dataTable( {
        "aaSorting": [[ 1, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_rr'); ?>",
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
