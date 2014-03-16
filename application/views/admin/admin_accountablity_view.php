<div class="container">

<div class="row">
  

                  <div class="col-md-12">
    <div class="panel panel-primary" id="panels">



         <div class="panel-heading">Accountability Form</div>
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
                      <th>ID</th>
                      <th>Supplier name</th>
                      <th>Department Name</th>
                      <th>Item Brand</th>
                      <th>Item Name</th>
                      <th>Item type</th>
                      <th>Item Unit</th>
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
            <br/>
<hr/>
<div class="text-center col-md-12" >
 <a href="<?php echo site_url('admin/view_form_content'); ?>" class="btn btn-lg btn-info">Create Accountability Form PDF</a> 
</div>
          </div>
   </div>

  </div>





</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 10, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_items'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    var a;
                    var b;
                    z ='<a class="label label-danger" href="remove_item/'+oObj.aData[0]+'">-</a>';
                    a = ' <a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    b = '<a class="label label-primary" href="add_item/'+oObj.aData[0]+'">+</a>';
                    return z + a + b;
                },
                "aTargets": [ 10 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

