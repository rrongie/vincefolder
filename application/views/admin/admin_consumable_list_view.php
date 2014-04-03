<div class="container">


<div class="row">

<div class="col-md-3">
  
   
  </div>
                  <div class="col-md-12">

    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">Consumable Reports
              
         </div>
          
          <div class="panel-body">
                
               <table id="accounts-view1" class="table">
                
            <thead>
                <tr>
                      <th>Consumable Id</th>
                      <th>Department</th>
                      <th>Requestor Name</th>
                      <th>Requestor Id</th>
                      <th>Date</th>
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
  </div>


</div><!-- end of row -->
</div><!-- end of container -->

<!--modal for + -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Requested Items</h4>
      </div>
      <div class="modal-body text-center modal-area">
        <!-- boody here -->                      

   <!-- end of body -->
 </div>

</div>
</div>
</div>

<!-- end of modal + -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view1').dataTable( {
       "sDom": '<"H"Tfr>t<"F"ip>',
        "aaSorting": [[ 4, "desc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_consumable_list'); ?>",
        "aoColumnDefs": [
            {
              "fnRender": function(oObj) {
                     
                    a = '<a class="con-info label label-info" data-conid="'+oObj.aData[0]+'" href="#">View Items</a> ';
                    return a;

              },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

       <script>
$(document).on('click', '.con-info', function(e){
e.preventDefault();

var id = $(this).data('conid');
$('.modal-area').load('<?php echo site_url('admin/consumable_cartdata')?>', {id: id});
$('#myModal').modal('show');

});


        </script>



