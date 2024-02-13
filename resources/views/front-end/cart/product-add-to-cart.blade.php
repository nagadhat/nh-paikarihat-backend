@php
    use Illuminate\Support\Str;
    $title = 'Shopping Cart';
    Cart::add('192ao12', 'Product 1', 1, 9.99);
    Cart::add('1239ad0', 'Product 2', 2, 5.95, ['size' => 'large']);
    // Set an additional cost (on the same page where you display your cart content)

    // Cart::addCost(Cart::COST_TRANSACTION, 0.10);
    // Cart::addCost(Cart::COST_SHIPPING, 5.00);
    // Cart::addCost('Cost_transaction', 2.11);
    // Cart::addCost('Cost_shipping', 120);
    Cart::addCost('somethingelse', 1.11);
@endphp
@extends('front-end.layouts.app')
@section('page_content')

<table>
   	<thead>
       	<tr>
           	<th>Product</th>
           	<th>Qty</th>
           	<th>Price</th>
           	<th>Subtotal</th>
           	<th>Action</th>
       	</tr>
   	</thead>

   	<tbody>
   		<?php foreach(Cart::content() as $row) :?>
       		<tr>
           		<td>
               		<p><strong><?php echo $row->name; ?></strong></p>
               		<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
           		</td>
           		<td><input type="text" value="<?php echo $row->qty; ?>"></td>
           		<td>$<?php echo $row->price; ?></td>
           		<td>$<?php echo $row->subtotal; ?></td>
                <td> 
                    <a href="{{ route('remove_cart_item', $row->rowId) }}">
                        delete
                    </a>
                </td>
       		</tr>
	   	<?php endforeach;?>

   	</tbody>

   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td><?php echo Cart::tax(); ?></td>
   		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_TRANSACTION); ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_SHIPPING); ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost('somethingelse'); ?></td>
		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Total</td>
   			<td><?php echo Cart::total(); ?></td>
   		</tr>
   	</tfoot>
</table>
@endsection

@section('scripts')
@endsection
