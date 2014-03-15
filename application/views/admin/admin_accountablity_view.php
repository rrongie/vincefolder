



<div class="container">
<h1 >Accountability</h1>
{product}

  <table class="sortable">
    <thead>
      <tr>
    
      	<th>item name</th>
        <th>Stocks</th>
        <th> input </th>
      </tr>
    </thead>
  <tbody>



                
     <ul class="products"> 
      <tr>
     
      <td>{item_name}</td>  
      <td>{item_qty}</td>
    
      
      <td><input size=5 class="qty" name="cart[{rowid}]" type="text" value="{item_qty}"></td>
      
      <td> <a href="<?php $segments = array('cart', 'add', '{item_id}');
                                    echo site_url($segments); ?>" class="btn btn-xs btn-default">Add</a> </td>
                    
  	 
  	

    </tr>
	 </ul>

</tbody>
</table>

{/product}

</div> <!-- end of container-->
