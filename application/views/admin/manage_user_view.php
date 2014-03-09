<div class="container">
<div class="row">
  <div class="col-md-3">
  
    <div class="list-group">
            <a href="<?php echo site_url('admin/manage_user'); ?>" class="list-group-item active">Account list</a>
            <a href="<?php echo site_url('admin/adduser'); ?>" class="list-group-item ">Create User</a>
           
           
          </div>
  </div>
 
   <div class="col-md-9">
    <div class="panel panel-primary" id="panels">

         <div class="panel-heading">  List of accounts</div>
          <div class="panel-body">
             
               <table id="accounts-view" class="table">
            <thead>
                <tr>
                      <th>Id</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Type</th>
                    <th>Update</th>
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





</div><!-- row -->
</div><!--container -->

<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 3, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_accounts'); ?>",
        "aoColumnDefs": [
            {
                "fnRender": function ( oObj ) {
                    return '<a href="account/'+oObj.aData[0]+'"><img src="<?php echo base_url() . 'assets/img/edit.png' ?>"></a>';
                },
                "aTargets": [ 5 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>


