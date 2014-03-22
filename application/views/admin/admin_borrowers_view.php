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
      <table id="accounts-view" class="table">
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








<script type="text/javascript">

  $(document).ready(function() {
    $('#accounts-view').dataTable( {
      "aaSorting": [[ 0, "asc" ]],
      "bProcessing": true,
      "sAjaxSource": "<?php echo site_url('admin/datatables_borrowers'); ?>",
      "aoColumnDefs": [
      {
        "fnRender": function ( oObj ) {
          var a;
          var b;
                    //z = '<a class="label label-danger" data-id="'+oObj.aData[0]+'"  data-method="minus" id="modal" href="#">-</a>';
                    //z = '<a class="label label-info" href="remove_item/'+oObj.aData[0]+'">-</a> ';
                    a = '<a class="label label-info" href="return_item/'+oObj.aData[0]+'">Return</a> ';
                    b = '<a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    //b = '<a class="label label-info" href="add_item/'+oObj.aData[0]+'">+</a> ';
                    //b = '<a class="label label-primary" data-id="'+oObj.aData[0]+'" data-toggle="modal" data-method="plus" id="modal" href="#">+</a>';

                    return a+b;
                  },
                  "aTargets": [ 6 ],
                  "sDefaultContent": ""
                }
                ]
              } );
} );

</script>
<!--
<script type="text/javascript">
  

$(document).on('click', '.genpdf', function(e){
e.preventDefault();


$('.modal-area').html('<h4>Items has been processed.</h4>');


});


</script>

-->