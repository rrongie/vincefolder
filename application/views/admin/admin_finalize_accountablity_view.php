<div class="container">

<div class="row">
  

                  <div class="col-md-12">
    <div class="panel panel-primary" id="panels">



         <div class="panel-heading">Accountability Form</div>
          <div class="panel-body text-center">
          <form action="<?php echo site_url('admin/view_form_content'); ?>" method="POST" accept-charset="utf-8">

            Name: <input required type="text" name="name">
            ID Number: <input required type="text" name="idnum">
          <select required name="dept">
            <option value="">...</option>
            <option value="IT Department">IT Department</option>
            <option value="Leasing Department">Leasing Department</option>
            <option value="Accounting Department">Accounting Department</option>
          </select>


          
          
<hr/>
<div class="text-center col-md-12" >
 <input class="btn btn-info" type="submit" value="Create Accountability Form"> 
</div>
          </div>
   </div>

  </div>

</form> 



</div><!-- end of row -->
</div><!-- end of container -->




<script type="text/javascript">
    
                $(document).ready(function() {
    $('#accounts-view').dataTable( {
        "aaSorting": [[ 10, "asc" ]],
        "bProcessing": true,
        "sAjaxSource": "<?php echo site_url('admin/datatables_accountability'); ?>",
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
                "aTargets": [ 8 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

