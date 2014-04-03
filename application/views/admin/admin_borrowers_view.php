<div class="container">

  <div class="row">


    <div class="col-md-12">
      <div class="panel panel-primary" id="panels">



       <div class="panel-heading">Borrower's List</div>
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
            <th>Borrower Id</th>
            <th>Name</th> 
            <th>Id Num</th>
            <th>Department</th>
            <th>Borrowed Status</th>
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





</div><!-- end of row -->
</div><!-- end of container -->


<!--modal for + -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Items that will be returned</h4>
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
      "aaSorting": [[ 5, "desc" ]],
      "bProcessing": true,
      "sAjaxSource": "<?php echo site_url('admin/datatables_borrowers'); ?>",
      "aoColumnDefs": [
      {
        "fnRender": function ( oObj ) {
          var a;
          var b;
                    //z = '<a class="label label-danger" data-id="'+oObj.aData[0]+'"  data-method="minus" id="modal" href="#">-</a>';
                    //z = '<a class="label label-info" href="remove_item/'+oObj.aData[0]+'">-</a> ';
                    a = '<a href="#" class="label return-item label-info" data-id="'+oObj.aData[0]+'">Return</a> <br>';  
                    b = '<a class="test label label-danger" href="remove_borrowers/'+oObj.aData[0]+'">Remove</a> ';
                    //b = '<a class="label label-primary" data-id="'+oObj.aData[0]+'" data-toggle="modal" data-method="plus" id="modal" href="#">+</a>';

                    return a + b;
                  },
                  "aTargets": [ 6 ],
                  "sDefaultContent": ""
                }
                ]
              } );
} );

</script>

<script type="text/javascript">
  

$(document).on('click', '.return-item', function(e){
e.preventDefault();

var id = $(this).data('id');
$('.modal-area').load('<?php echo site_url('admin/borrowers_cartdata')?>', {id: id});
$('#myModal').modal('show');

});



</script>

  <script>

$(document).on('click', '.test', function(){

  return confirm("Do you want to remove?");

});

</script>