<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {


		function __construct(){
		parent::__construct();
		$this->load->model('cart_model');
		
	}

	public function index(){
		
		$cart['total_price'] = $this->cart->format_number($this->cart->total());
		$cart['total_items'] = $this->cart->total_items();
		//$cart['updated_cart'] = $this->cart_model->check_product_qty($this->cart->contents());
	
		//$this->parser->parse('cart/cart', $cart);	
	}



	public function add($id){

		$product_info = $this->cart_model->get_product_info($id);
		
		//Check if the book already exist in the cart.
		//$this->check_cart($id);
		//If yes it append +1 qty in the cart.
		$product = array(
               'id'      => $product_info[0]['item_id'],
               'qty'     => $product_info[0]['item_qty'],
               'item_price'   => $product_info[0]['item_price'],
               'item_name'    => $product_info[0]['item_name'],
               'item_serial' => $product_info[0]['item_serial']

            
            );
		   $this->cart->insert($product); 
		   echo"<pre>";
		   print_r($product);
		echo"</pre>";
	}

	
}