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
            <th>Item Id</th> 
            <th>Brand</th>
            <th>Name</th>
            <th>Serial</th>
            <th>Asset</th>
            <th>Quantity</th>
            <th>Price</th>
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

      <div class="col-md-12">

       <?php if ($cart == TRUE) { ?>
       <hr/>
       <legend>Items that are added to the form.</legend>
       <table id="accounts-view" class="table">
        <thead>
          <tr>
            <th>Asset Code</th>
            <th>Serial Code</th>
            <th>Name</th>
            <th>Brand</th>

          </tr>
        </thead>
        <tbody>
          {cartdata}
          <tr> 
            <td>{asset}</td> 
            <td>{serial}</td>
            <td>{name}</td>
            <th>{brand}</th>
          </tr>
          {/cartdata}
        </tbody>
        <tfoot>
        </tfoot>
      </table>

      <?php } ?>

    </div>
    <hr/>
    <div class="text-center col-md-12" >

      <a href="#myModal" class="btn btn-lg btn-info" data-toggle="modal">Finalize Accountability Form</a>  
      <a href="<?php echo site_url('admin/clear_form'); ?>" class="btn btn-lg btn-danger">Clear Form</a> 
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
        <h4 class="modal-title" id="myModalLabel">Finalize Accountability Form</h4>
      </div>
      <div class="modal-body text-center modal-area">
        <!-- boody here -->                      



  <form class="form-horizontal" action="<?php echo site_url('admin/view_form_content'); ?>" method="POST" accept-charset="utf-8">


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="idnum">Id Number</label>
  <div class="controls">
    <input id="idnum" name="idnum" type="number" placeholder="" class="input-xlarge" required>
    
  </div>
</div>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="dept">Department</label>
  <div class="controls">
    <select id="dept" name="dept" class="input-xlarge" required>
    <option>...</option>
       {department}
      <option>{name}</option>
      {/department}
   
    </select>
  </div>
</div>
<br/><br/>
<!-- Text input-->
<div class="control-group">
  <div class="controls">
    <input class="btn btn-info btn-large genpdf" id="id" name="id" value="Generate Accountability Form" type="submit" placeholder="" class="input-xlarge" required="">
    
  </div>
</div>

</form>
 
   <!-- end of body -->
 </div>

</div>
</div>
</div>

<!-- end of modal + -->







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
                    //z = '<a class="label label-danger" data-id="'+oObj.aData[0]+'"  data-method="minus" id="modal" href="#">-</a>';
                    z = '<a class="label label-info" href="remove_item/'+oObj.aData[0]+'">-</a> ';
                    a = '<a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    b = '<a class="label label-info" href="add_item/'+oObj.aData[0]+'">+</a> ';
                    //b = '<a class="label label-primary" data-id="'+oObj.aData[0]+'" data-toggle="modal" data-method="plus" id="modal" href="#">+</a>';

                    return z + a + b;
                  },
                  "aTargets": [ 8 ],
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