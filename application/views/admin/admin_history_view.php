<div class="container">

  <div class="row">


    <div class="col-md-12">
      <div class="panel panel-primary" id="panels">



       <div class="panel-heading">Item's History</div>
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
            <th>Item Name</th>
            <th>Item Serial</th>
            <th>Item Asset</th>
            <th>Borrowed Status</th>
            <th>Borrowed Date</th>
            <th>Return Date</th>
            <th>Remarks</th>
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
        <h4 class="modal-title" id="myModalLabel">Add remarks to the item <b class="title"></b></h4>
        <form method="POST" action="<?php echo site_url('admin/return_borrowed_item'); ?>">
        <!-- Textarea -->
        <div class="control-group">
          <div class="controls">                     
            <input type="hidden" id="table_borrowed_id" name="table_borrowed_id" value>
            <input type="hidden" id="itemid" name="item_id" value>
            <textarea id="textarea" name="remark" style="margin: 0px; width: 551px; height: 137px;"></textarea>
          </div>
        </div>
          <input type="submit" class="btn btn-xs btn-info" name="submit">
        </form>
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
      "aaSorting": [[ 8, "desc" ]],
      "bProcessing": true,
      "sAjaxSource": "<?php echo site_url('admin/datatables_history/{itemid}'); ?>"
              } );
} );

</script>

<script type="text/javascript">
  

$(document).on('click', '.return-item', function(e){
e.preventDefault();

var name = $(this).data('name');
var itemid = $(this).data('itemid');
var tableid = $(this).data('tableid');

$('#table_borrowed_id').val(tableid);
$('#itemid').val(itemid);

$('#myModal').modal('show');

});



</script>

  <script>

$(document).on('click', '.test', function(){

  return confirm("Do you want to remove?");

});

</script>