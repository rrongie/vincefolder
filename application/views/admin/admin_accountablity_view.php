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
 <a href="<?php echo site_url('admin/finalize_form'); ?>" class="btn btn-lg btn-info">Finalize Form</a> 
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
        <h4 class="modal-title" id="myModalLabel">+ modal</h4>
      </div>
      <div class="modal-body">
          <!-- boody here -->                      

           <div class="row">
                  <div class="col-md-5">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="password">Asset Code</label>
                    <div class="controls">
                      <input size="30" id="password" name="asset" type="text" placeholder="" class="input-xlarge" required>
                    </div>
                  </div>


                  </div>
                  <div class="col-md-5">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="cpassword">Quantiy</label>
                    <div class="controls">
                      <input size="30" id="cpassword" name="cpassword" type="text" placeholder="" class="input-xlarge" required>
                    </div>
                  </div>


                  </div>
                
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                   <input type="button" id="cp" data-id="{id}" class="btn btn-info" value="Submit" />
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
              </div>
            </form>   
             


          <!-- end of body -->
      </div>
   
    </div>
  </div>
</div>

<!-- end of modal + -->


<!--modal for - -->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">- modal</h4>
      </div>
      <div class="modal-body">
          <!-- boody here -->                      

           <div class="row">
                  <div class="col-md-5">
                  <!-- Text input-->
                  <div class="control-group">
                    <label class="control-label" for="password">Quantity</label>
                    <div class="controls">
                      <input size="30" id="password" name="asset" type="text" placeholder="" class="input-xlarge" required>
                    </div>
                  </div>



                   <!-- Text input-->
                  <!-- 
                  </div>
                  <div class="col-md-5">
                
                  <div class="control-group">
                    <label class="control-label" for="cpassword">Asset Code</label>
                    <div class="controls">
                      <input size="30" id="cpassword" name="cpassword" type="number" placeholder="" class="input-xlarge" required>
                    </div>
                  </div> -->


                  </div>
                
              </div>
              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                   <input type="button" id="cp" data-id="{id}" class="btn btn-info" value="Submit" />
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>
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
                    z ='<a class="label label-danger" data-toggle="modal" data-target="#myModal2" href="#/'+oObj.aData[0]+'">-</a>';
                    a = ' <a class="label label-info" href="view_item/'+oObj.aData[0]+'">View</a> ';
                    b = '<a class="label label-primary" data-toggle="modal" data-target="#myModal" href="#'+oObj.aData[0]+'">+</a>';
                    return z + a + b;
                },
                "aTargets": [ 8 ],
                "sDefaultContent": ""
            }
        ]
    } );
} );

</script>

<!-- <script type="text/javascript">
$('#myModal').modal('show')


</script> -->