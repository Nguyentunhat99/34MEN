<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Login;
use App\Models\Social;
use App\Models\Statistical;
use App\Models\Visitors;
use App\Models\Product;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Video;
use App\Models\Order;
use Auth;
use Carbon\Carbon;
use Socialite;


session_start();
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function index(){
    	return view('admin_login');
    }
    public function show_dashboard(Request $request){
    $this->AuthLogin();
    $user_ip_address = $request->ip();
    $early_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
    $end_of_last_month = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    $early_this_month = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
    $onyears = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    
    $visitor_of_lastmonth = Visitors::whereBetween('date_visitors',[$early_last_month,$end_of_last_month])->get();
    $visitor_last_month_count = $visitor_of_lastmonth->count();

    $visitor_of_thismonth = Visitors::whereBetween('date_visitors',[$onyears,$now])->get();
    $visitor_this_month_count = $visitor_of_thismonth->count();

    $visitor_of_year = Visitors::whereBetween('date_visitors',[$early_last_month,$end_of_last_month])->get();
    $visitor_year_count = $visitor_of_year->count();

    $visitor_current = Visitors::where('ip_address',$user_ip_address)->get();
    $visitor_count = $visitor_current->count();

    if($visitor_count < 1){
        $visitor = new Visitors();
        $visitor->ip_address = $user_ip_address;
        $visitor->date_visitors = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $visitor->save();
    }
    // total visitor

    $visitors = Visitors::all();
    $visitors_total = $visitors->count();
    // total
    
    $app_product = Product::all()->count();
    $app_post = Post::all()->count();
    $app_order = Order::all()->count();
    $app_video = Video::all()->count();
    $app_customer = Customer::all()->count();
    $product_views = Product::orderBy('product_views','DESC')->take(20)->get();
    $post_views = Post::orderBy('post_views','DESC')->take(20)->get();
    return view('admin.dashboard')->with(compact('visitors_total','visitor_count','visitor_last_month_count','visitor_this_month_count','visitor_year_count','app_product','app_post','app_order','app_video','app_customer','product_views','post_views'));

    }
    public function dashboard(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count>0){
                    Session::put('admin_name',$login->admin_name);
                    Session::put('admin_id',$login->admin_id);
                    return Redirect::to('/dashboard');
            } 
        }else{
                    Session::put('message','Mật khẩu hoặc tài khoản bị sai.Hãy nhập lại');
                    return Redirect::to('/admin');
            }

    }
    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }

    public function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Statistical::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach($get as $key =>$val){
            $chart_data[]=array(
                'period' => $val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
    public function order_date(Request $request){
        $order_date= $_GET['date'];
        $order = Order::where('order_date',$order_date)->orderBy('created_at','DESC')->get();
        return view('admin.order_date')->with(compact(order));
    }
    public function dashboard_filter(Request $request){
        $data = $request->all();
        // echo $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H-i-s');
        // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H-i-s');
        // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H-i-s');
        // $sub5days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(5)->format('d-m-Y H-i-s');
        // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(5)->format('d-m-Y H-i-s');

        
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
    
        $sub7day = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        if ($data['dashboard_value'] == '7-day') {
            $get = Statistical::whereBetween('order_date',[$sub7day,$now])->orderBy('order_date','ASC')->get();
        } elseif($data['dashboard_value'] == 'last-month') {
            $get = Statistical::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','ASC')->get();
        } elseif($data['dashboard_value'] == 'this-month') {
            $get = Statistical::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        } elseif($data['dashboard_value'] == '7-day') {
            $get = Statistical::whereBetween('order_date',[$sub7day,$now])->orderBy('order_date','ASC')->get();
        } elseif($data['dashboard_value'] == 'last-year') {
            $get = Statistical::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }        

        foreach($get as $key => $val){
            $chart_data[] =array(
                'period' => $val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
            ); 
        }
        echo $data = json_encode($chart_data);
    }
    public function days_order(){
        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistical::whereBetween('order_date',[$sub30days,$now])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
            $chart_data[] =array(
                'period' => $val->order_date,
                'order'=>$val->total_order,
                'sales'=>$val->sales,
                'profit'=>$val->profit,
                'quantity'=>$val->quantity
            ); 
        }
        echo $data = json_encode($chart_data);
    }
}