<div class="container">

  <div class="row">


    <div class="col-md-12">
      <div class="panel panel-primary" id="panels">



       <div class="panel-heading">Log History</div>
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
            <th>Item Type</th>
            <th>Item Name</th> 
            <th>Quantity Added</th>
            <th>Item Brand</th>
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





</div><!-- end of row -->
</div><!-- end of container -->






<script type="text/javascript">

  $(document).ready(function() {
    $('#accounts-view').dataTable( {
      "sDom":'T<"clear">ltrtip',
      "aaSorting": [[ 1, "desc" ]],
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
