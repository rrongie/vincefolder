<div class="container">

  <div class="row">


    <div class="col-md-12">
      <div class="panel panel-primary" id="panels">



       <div class="panel-heading">Items Added Report</div>
       <div class="panel-body">

        <?php 

        if ($this->session->flashdata('item_add')){ ?>

        <div class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
          <?php echo $this->session->flashdata('item_add')?>
        </div>

        <?php
      }

      ?>
      <table id="accounts-view" class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Item Name</th> 
            <th>Item Brand</th>
            <th>Item Type</th>
            <th>Quantity Added</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <br/>
  </div>
</div>

</div>

<!-- for purchase list -->
   <div class="col-md-12">
      <div class="panel panel-primary" id="panels">



       <div class="panel-heading">Purchases List</div>
       <div class="panel-body">

        <?php 

        if ($this->session->flashdata('item_add')){ ?>

        <div class="alert alert-info text-center">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
          <?php echo $this->session->flashdata('item_add')?>
        </div>

        <?php
      }

      ?>
      <table id="accounts-view2" class="table">
        <thead>
          <tr>
            <th>Purchase Id</th>
            <th>Department</th> 
            <th>Company</th>
            <th>Total Cost(PHP)</th>
           
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        </tfoot>
      </table>
      <br/>
  </div>
</div>

</div>
<!-- end of purchase -->



</div><!-- end of row -->
</div><!-- end of container -->

<!--modal for + -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Items purchased</h4>
      </div>
      <div class="modal-body  modal-area">
        <!-- boody here -->                      


   <!-- end of body -->
 </div>

</div>
</div>
</div>

<!-- end of modal + -->




<script type="text/javascript">

  $(document).ready(function() {
    $('#accounts-view').dataTable( {
      "sDom": '<"H"Tfr>t<"F"ip>',
      
      "aaSorting": [[ 8, "asc" ]],
        
      "bProcessing": true,
      "sAjaxSource": "<?php echo site_url('admin/datatables_logger'); ?>",
      "aoColumnDefs": [
      {
                          "aTargets": [ 3 ],
                  "sDefaultContent": ""
                }
                ]
              } );
} );

</script>
<script type="text/javascript">

  $(document).ready(function() {
    $('#accounts-view2').dataTable( {
      "aaSorting": [[ 5, "desc" ]],
      "bProcessing": true,
      "sAjaxSource": "<?php echo site_url('admin/datatables_purchase_list'); ?>",
      "aoColumnDefs": [
      {
        "fnRender": function ( oObj ) {
          var a;
          var b;
                    //z = '<a class="label label-danger" data-id="'+oObj.aData[0]+'"  data-method="minus" id="modal" href="#">-</a>';
                    //z = '<a class="label label-info" href="remove_item/'+oObj.aData[0]+'">-</a> ';
                    a = '<a href="#" class="label received-item label-info" data-id="'+oObj.aData[0]+'">View</a> <br>';  
                   // b = '<a class="test label label-danger" href="delete_purchases_list/'+oObj.aData[0]+'">Remove</a> ';
                    //b = '<a class="label label-primary" data-id="'+oObj.aData[0]+'" data-toggle="modal" data-method="plus" id="modal" href="#">+</a>';

                    return a;
                  },
                  "aTargets": [ 5 ],
                  "sDefaultContent": ""
                }
                ]
              } );
} );

</script>

</script>

<script type="text/javascript">
  

$(document).on('click', '.received-item', function(e){
e.preventDefault();

var id = $(this).data('id');
$('.modal-area').load('<?php echo site_url('admin/purchases_cartdata')?>', {id: id});
$('#myModal').modal('show');

});



</script>

  <script>

$(document).on('click', '.test', function(){

  return confirm("Do you want to delete?");

});

</script>
