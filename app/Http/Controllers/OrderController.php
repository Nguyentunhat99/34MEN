<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Statistical;
use App\Models\Slider;
use Carbon\Carbon;
use App\Models\CategoryPostModel;

use PDF;

session_start();


class OrderController extends Controller
{
    public function manage_order(){
    	$order = Order::orderby('created_at','DESC')->paginate(10);
    	return view('admin.manage_order')->with(compact('order'));
    }
    public function view_order($order_code){
		$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
		$order = Order::where('order_code',$order_code)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

		foreach($order_details_product as $key => $order_d){

			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();
			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;
		}
		
		return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order','order_status'));

	}
    public function order_code(Request $request ,$order_code){
		$order = Order::where('order_code',$order_code)->first();
		$order->delete();
		 Session::put('message','Xóa đơn hàng thành công');
        return redirect()->back();

	}
	public function print_order($checkout_code){
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_order_convert($checkout_code));
		return $pdf->stream();
	}
	public function print_order_convert($checkout_code){
		$order_details = OrderDetails::where('order_code',$checkout_code)->get();
		$order = Order::where('order_code',$checkout_code)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
		}
		$customer = Customer::where('customer_id',$customer_id)->first();
		$shipping = Shipping::where('shipping_id',$shipping_id)->first();

		$order_details_product = OrderDetails::with('product')->where('order_code', $checkout_code)->get();

		foreach($order_details_product as $key => $order_d){

			$product_coupon = $order_d->product_coupon;
		}
		if($product_coupon != 'no'){
			$coupon = Coupon::where('coupon_code',$product_coupon)->first();

			$coupon_condition = $coupon->coupon_condition;
			$coupon_number = $coupon->coupon_number;

			if($coupon_condition==1){
				$coupon_echo = $coupon_number.'%';
			}elseif($coupon_condition==2){
				$coupon_echo = number_format($coupon_number,0,',','.').'đ';
			}
		}else{
			$coupon_condition = 2;
			$coupon_number = 0;

			$coupon_echo = '0';
		
		}

		$output = '';

		$output.='<style>body{
			font-family: DejaVu Sans;
		}
		.table-styling{
			border:1px solid #000;
		}
		.table-styling tbody tr td{
			border:1px solid #000;
		}
		</style>
		<h1><center34MEN Xin chân thành cảm ơn quý khách đã mua hàng!</center></h1>
		<h4><center>Cộng hòa xã hội chủ nghĩa Việt Nam</center></h4>
		<h4><center>Độc lập- tự do- hạnh phúc</center></h4>
		<p>Người đặt hàng</p>
		<table class="table-styling">
				<thead>
					<tr>
						<th>Tên khách đặt</th>
						<th>Số điện thoại</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>';
		$output.='		
					<tr>
						<td>'.$customer->customer_name.'</td>
						<td>'.$customer->customer_phone.'</td>
						<td>'.$customer->customer_email.'</td>
					</tr>';
		$output.='				
				</tbody>
		</table>
		<p>Ship hàng tới</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên người nhận</th>
						<th>Địa chỉ</th>
						<th>Sdt</th>
						<th>Email</th>
						<th>Ghi chú</th>
					</tr>
				</thead>
				<tbody>';
		$output.='		
					<tr>
						<td>'.$shipping->shipping_name.'</td>
						<td>'.$shipping->shipping_address.'</td>
						<td>'.$shipping->shipping_phone.'</td>
						<td>'.$shipping->shipping_email.'</td>
						<td>'.$shipping->shipping_notes.'</td>
					</tr>';
		$output.='				
				</tbody>
		</table>
		<p>Đơn hàng đặt</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Tên sản phẩm</th>
						<th>Mã giảm giá</th>
						<th>Phí ship</th>
						<th>Số lượng</th>
						<th>Giá sản phẩm</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>';
				$total = 0;
				foreach($order_details_product as $key => $product){

					$subtotal = $product->product_price*$product->product_sales_quantity;
					$total+=$subtotal;

					if($product->product_coupon!='no'){
						$product_coupon = $product->product_coupon;
					}else{
						$product_coupon = 'không mã';
					}		
		$output.='		
					<tr>
						<td>'.$product->product_name.'</td>
						<td>'.$product_coupon.'</td>
						<td>'.number_format($product->product_feeship,0,',','.').'đ'.'</td>
						<td>'.$product->product_sales_quantity.'</td>
						<td>'.number_format($product->product_price,0,',','.').'đ'.'</td>
						<td>'.number_format($subtotal,0,',','.').'đ'.'</td>\
					</tr>';
				}
				if($coupon_condition==1){
					$total_after_coupon = ($total*$coupon_number)/100;
	                $total_coupon = $total - $total_after_coupon;
				}else{
                  	$total_coupon = $total - $coupon_number;
				}
		$output.= '<tr>
				<td colspan="2">
					<p>Tổng giảm: '.$coupon_echo.'</p>
					<p>Phí ship: '.number_format($product->product_feeship,0,',','.').'đ'.'</p>
					<p>Thanh toán : '.number_format($total_coupon + $product->product_feeship,0,',','.').'đ'.'</p>
				</td>
		</tr>';
		$output.='				
				</tbody>
		</table>
		<p>Ký tên</p>
			<table>
				<thead>
					<tr>
						<th width="200px">Người lập phiếu</th>
						<th width="800px">Người nhận</th>
						
					</tr>
				</thead>
				<tbody>';
		$output.='				
				</tbody>
		</table>
		';
		return $output;

	}
	public function update_qty(Request $request){
		$data = $request->all();
		$order_details = OrderDetails::where('product_id',$data['order_product_id'])->where('order_code',$data['order_code'])->first();
		$order_details->product_sales_quantity = $data['order_qty'];
		$order_details->save();
	}

	public function update_order_qty(Request $request){
		//update order
		$data = $request->all();
		$order = Order::find($data['order_id']);
		$order->order_status = $data['order_status'];
		$order->save();
		// order date
		$order_date = $order->order_date;
		$statistical = Statistical::where('order_date',$order_date)->get();
		if($statistical){
			$statistical_count = $statistical->count();
		}else{
			$statistical_count = 0;
		}

		if($order->order_status==2){
			$total_order = 0;
			$sales = 0;
			$profit = 0;
			$quantity = 0;
			foreach($data['order_product_id'] as $key => $product_id){	
				$product = Product::find($product_id);
				$product_quantity = $product->product_quantity;
				$product_sold = $product->product_sold;
				$product_price = $product->product_price;
				$product_cost = $product->product_cost;
				$now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
				foreach($data['quantity'] as $key2 => $qty){
					if($key==$key2){
						$pro_remain = $product_quantity - $qty;
						$product->product_quantity = $pro_remain;
						$product->product_sold = $product_sold + $qty;
						$product->save();

						// update doanhb thu
						$quantity  += $qty;
						$total_order += 1;
						$sales += $product_price*$qty;
						$profit = $sales-($product_cost*$qty);
					}
				}
			}
			// update doanh số
			if ($statistical_count > 0) {
				$statistical_update = Statistical::where('order_date',$order_date)->first();
				$statistical_update->sales = $statistical_update->sales + $sales;
				$statistical_update->profit = $statistical_update->profit + $profit;
				$statistical_update->quantity = $statistical_update->quantity + $quantity;
				$statistical_update->total_order = $statistical_update->total_order + $total_order;
				$statistical_update->save();
			} else {
				$statistical_new = new Statistical();
				$statistical_new->order_date = $order_date;
				$statistical_new->sales = $sales;
				$statistical_new->profit = $profit;
				$statistical_new->quantity = $quantity;
				$statistical_new->total_order = $total_order;
				$statistical_new->save();
			}
		}
	}
	public function history_order(Request $request){
		 //slide
		 $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
		 //seo 
		 //seo 
		 $meta_desc = "Lịch sử mua hàng"; 
		 $meta_keywords = "Lịch sử mua hàng";
		 $meta_title = "34MEN-STORE Chuyên thời trang nam";
		 $url_canonical = $request->url();
		 // //--seo
		 
		 $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->OrderBy('category_order','ASC')->get(); 
		 $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
		 $category_post = CategoryPostModel::where('cate_post_status','0')->orderby('cate_post_id','desc')->get(); 
		 
		 $getorder = Order::where('customer_id', Session::get('customer_id'))->orderBy('order_date','DESC')->paginate(5);
		 return view('pages.history-order.history_order')
		 ->with('category',$cate_product)
		 ->with('brand',$brand_product)
		 ->with('category_post',$category_post)
		 ->with('meta_desc',$meta_desc)
		 ->with('meta_keywords',$meta_keywords)
		 ->with('meta_title',$meta_title)
		 ->with('url_canonical',$url_canonical)
		 ->with('slider',$slider)
		 ->with('getorder',$getorder);
		}

		public function view_history_order(Request $request, $order_code){
			//slide
			$slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
			//seo 
			//seo 
			$meta_desc = "Lịch sử mua hàng"; 
			$meta_keywords = "Lịch sử mua hàng";
			$meta_title = "34MEN-STORE Chuyên thời trang nam";
			$url_canonical = $request->url();
			// //--seo
			
			$cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_parent','desc')->OrderBy('category_order','ASC')->get(); 
			$brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
			$category_post = CategoryPostModel::where('cate_post_status','0')->orderby('cate_post_id','desc')->get(); 
			
			// xem lịch sử đơn hàng

			$order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();
			$order = Order::where('order_code',$order_code)->get();
		foreach($order as $key => $ord){
			$customer_id = $ord->customer_id;
			$shipping_id = $ord->shipping_id;
			$order_status = $ord->order_status;
		}
			$customer = Customer::where('customer_id',$customer_id)->first();
			$shipping = Shipping::where('shipping_id',$shipping_id)->first();

			$order_details_product = OrderDetails::with('product')->where('order_code', $order_code)->get();

			foreach($order_details_product as $key => $order_d){
				$product_coupon = $order_d->product_coupon;
			}
			if($product_coupon != 'no'){
				$coupon = Coupon::where('coupon_code',$product_coupon)->first();
				$coupon_condition = $coupon->coupon_condition;
				$coupon_number = $coupon->coupon_number;
			}else{
				$coupon_condition = 2;
				$coupon_number = 0;
			}

			return view('pages.history-order.view_history_order')
			->with('category',$cate_product)
			->with('brand',$brand_product)
			->with('category_post',$category_post)
			->with('meta_desc',$meta_desc)
			->with('meta_keywords',$meta_keywords)
			->with('meta_title',$meta_title)
			->with('url_canonical',$url_canonical)
			->with('slider',$slider)
			->with('order_details',$order_details)
			->with('customer',$customer)
			->with('shipping',$shipping)
			->with('coupon_condition',$coupon_condition)
			->with('coupon_number',$coupon_number)
			->with('order',$order)
			->with('order_code',$order_code)
			->with('order_status',$order_status);

		   }
	public function cancel_order(Request $request){
		$data = $request->all();
		$order = Order::where('order_code',$data['order_code'])->first();
		$order->order_destroy = $data['reason_order'];
		$order->order_status = 3;
		$order->save();
	}
}

		
			
		

