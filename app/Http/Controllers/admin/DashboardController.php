<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Spatie\Analytics\Period;
use Analytics;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\AccountCustomer;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Order_Details;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\InteractsWithTime;
class DashboardController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct() {
    $this->middleware('CheckAdminLogin');
    $this->viewprefix = 'admin.dashboard.';
    $this->viewnamespace = 'panel/dashboard';
    $this->index = 'dashboard.index';
  }

//   public function index(Request $request) {

//   // Google Analytic
//     $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(28));
//     $visitor = $analyticsData->pluck("visitors");
//     $date_time_add = $analyticsData->pluck("date");
//     $pageview = $analyticsData->pluck("pageViews");
//     $topBrowers = Analytics::fetchTopBrowsers(Period::days(28));
//     $topViewPage = Analytics::fetchMostVisitedPages(Period::days(28));

//  // Order
// //    $users = DB::table('order')
// //      ->join('order_details', 'order.order_id', '=', 'order_details.order_id')
// //      ->join('customer', 'order.customer_id', '=', 'customer.customer_id')
// //      ->select('order.*', 'order_details.*', 'customer.*')
// //      ->get();
//     //         dump($users);
//     $abc = [];
//     $customers = Shipping::all();
//     $account = AccountCustomer::where('status','=',1)->get();
//     $count = count($account);
//     $order = Order::where('order_status','=',4)->get();
//     $order_detail = Order_Details::join('order', 'order.order_id', '=', 'order_details.order_id')->join('product', 'order_details.id', '=', 'product.id')
//     ->where('order_status','=',4)->get();
// //    dump($order_detail);

//     $quantity = [];
//     foreach ($order_detail as $count_quantity) {
//       $quantity[] = $count_quantity->quantity;
//     }
//     $total_quantity = array_sum($quantity);



//     $count_order = count($order);
//     $aa = [];
//     foreach ($order as $count_item) {
//       $aa[] = $count_item->order_total;
//     }
//     $total_order_money = array_sum($aa);

//    // Pie Chart
//     $pie_order_0 = Order::where('order_status','=',0)->get();
//     $pie_order_1 = Order::where('order_status','=',1)->get();
//     $pie_order_2 = Order::where('order_status','=',2)->get();
//     $pie_order_3 = Order::where('order_status','=',3)->get();
//     $pie_order_4 = Order::where('order_status','=',4)->get();

//     $count_pie_order_0 = count($pie_order_0);
//     $count_pie_order_1 = count($pie_order_1);
//     $count_pie_order_2 = count($pie_order_2);
//     $count_pie_order_3 = count($pie_order_3);
//     $count_pie_order_4 = count($pie_order_4);

//     $dataPoints = array(
//       array("label"=>"Đơn đã hủy ", "y"=>$count_pie_order_0),
//       array("label"=>"Đơn hàng mới", "y"=>$count_pie_order_1),
//       array("label"=>"Đơn hàng đã xác nhận", "y"=>$count_pie_order_2),
//       array("label"=>"Đơn hàng đang vận chuyển", "y"=>$count_pie_order_3),
//       array("label"=>"Đơn hàng đã giao hàng thành công", "y"=>$count_pie_order_4),
//     );

//     // Top Blog
//       $blog_view = Blog::where('status','=',1)->orderBy('view','DESC')->limit(7)->get();
//     // Top product view
//       $product_top_view = Product::where('status','=',1)->orWhere('status','=',2)->orWhere('status','=',3)->orderBy('view_number','DESC')->limit(8)->get();
//     // Top Product in Orders
// //      $order_top_sale = Order::
//       $topsales = DB::table('order_details')
//         ->leftJoin('product','product.id','=','order_details.id')
//         ->leftJoin('order', 'order.order_id', '=', 'order_details.order_id')
//         ->select('product.id','product.name','order_details.id',
//           DB::raw('SUM(order_details.quantity) as total'))
//         ->where('order_status','=',4)
//         ->groupBy('product.id','order_details.id','product.name')
//         ->orderBy('total','desc')
//         ->limit(8)
//         ->get();

//     $users_test = Order::select('order_total', 'created_at')->where('order_status','=',4)
//       ->get()
//       ->groupBy(function ($date) {
//         return Carbon::parse($date->created_at)->format('m');
//       });

//     $usermcount = [];
//     $userArr = [];

//     foreach ($users_test as $key=> $value) {
//       $bb = [];
//       foreach ($value as $ass) {
//         $bb[] = $ass->order_total;
//       }
//       $usermcount[(int)$key - 1] = array_sum($bb);
//     }

//     $month = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

//     for ($i = 0; $i <= 11; $i++) {
//       $userArr[$i]['label'] = $month[$i];
//       if (!empty($usermcount[$i])) {
//         $userArr[$i]['y'] = $usermcount[$i];
//       } else {
//         $userArr[$i]['y'] = 0;
//       }

//     }
//     $dataPoints_order = $userArr;
// //    dump($dataPoints1);

// //    $category_product = Category::all();

//     $categorymcount = [];
//     $cateArr = [];
//     $category_product = Category::join('product', 'product.idcat', '=', 'category.category_id')->where('category_status','=',1)->where('status','!=',0)->get()->groupBy('category_id');
// //    dump($category_product);
//     $count_name_cate = count($category_product);
//     $arr_cate_name = [];
//     foreach ($category_product as $key=> $value) {
//       $categorymcount[] = count($value);
//       foreach ($value as $ass) {
//         $cate_name = $ass->category_name;
//       }
//       $arr_cate_name[] = $cate_name;
//     }
//      $name_category_column = $arr_cate_name;
//     for ($i = 0; $i <= $count_name_cate - 1; $i++) {
//       $cateArr[$i]['label'] = $arr_cate_name[$i];
//       if (!empty($categorymcount[$i])) {
//         $cateArr[$i]['y'] = $categorymcount[$i];
//       } else {
//         $cateArr[$i]['y'] = 0;
//       }
//     }
//     $dataPoints_category = $cateArr;
//     return view($this->viewprefix . 'layout',
//       compact('count','customers', 'count_order', 'total_order_money', 'total_quantity','visitor','date_time_add','pageview'
//         ,'topBrowers','topViewPage','dataPoints','blog_view','product_top_view','order_detail','topsales','dataPoints_order','dataPoints_category'
//       ));
//   }

public function index(Request $request) {

  // Google Analytic
    
    return view($this->viewprefix . 'layout');
  }

  public function search_order(Request $request) {
      $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(28));
      $visitor = $analyticsData->pluck("visitors");
      $date_time_add = $analyticsData->pluck("date");
      $pageview = $analyticsData->pluck("pageViews");
      $topBrowers = Analytics::fetchTopBrowsers(Period::days(28));
      $topViewPage = Analytics::fetchMostVisitedPages(Period::days(28));

    $account = AccountCustomer::all();
    $count = count($account);
    $order = Order::where('order_status','=',4)->get();
    $order_detail = Order_Details::join('order', 'order.order_id', '=', 'order_details.order_id')->join('product', 'order_details.id', '=', 'product.id')
      ->where('order_status','=',4)->get();
    $quantity = [];
    foreach ($order_detail as $count_quantity) {
      $quantity[] = $count_quantity->quantity;
    }
    $total_quantity = array_sum($quantity);
    $count_order = count($order);
    $aa = [];
    foreach ($order as $count_item) {
      $aa[] = $count_item->order_total;
    }
    $total_order_money = array_sum($aa);


    $st_date=$request->start_date;
    $date_start=date('d/m/Y',  strtotime($st_date));
    $st_end=$request->end_date;
    $date_end=date('d/m/Y',  strtotime($st_end));
    $customers = Shipping::all();

    if (isset ($request->start_date) && !empty($request->start_date) && isset($request->end_date) && !empty($request->end_date)) {
      $orders_search = Order::select("order.*")
        ->whereBetween('created_at', [
          $request->start_date . " 00:00:00",
          $request->end_date . " 23:59:59",
        ])
        ->get();
//      foreach ($orders_search as $item) {
//        $status_item = $item->order_status;
//        if($status_item == '0')
//        {
//          $pie_st_order_0[] = $item;
//        }
//        if($status_item == '1')
//        {
//          $pie_st_order_1[] = $item;
//        }
//        if($status_item == '2')
//        {
//          $pie_st_order_2[] = $item;
//        }
//        if($status_item == '3')
//        {
//          $pie_st_order_3[] = $item;
//        }
//        if($status_item == '4')
//        {
//          $pie_st_order_4[] = $item;
//        }
//      }
//      if(isset($pie_st_order_0) and !empty($pie_st_order_0)) {
//        $count_pie_st_order_0 = count($pie_st_order_0);
//      }
//      else
//      {
//        $count_pie_st_order_0 = 0;
//      }
//      if(isset($pie_st_order_1) and !empty($pie_st_order_1)) {
//        $count_pie_st_order_1 = count($pie_st_order_1);
//      }
//      else
//      {
//        $count_pie_st_order_1 = 0;
//      }
//      if(isset($pie_st_order_2) and !empty($pie_st_order_2)) {
//        $count_pie_st_order_2 = count($pie_st_order_2);
//      }
//      else
//      {
//        $count_pie_st_order_2 = 0;
//      }
//      if(isset($pie_st_order_3) and !empty($pie_st_order_3)) {
//        $count_pie_st_order_3 = count($pie_st_order_3);
//      }
//      else
//      {
//        $count_pie_st_order_3 = 0;
//      }
//      if(isset($pie_st_order_4) and !empty($pie_st_order_4)) {
//        $count_pie_st_order_4 = count($pie_st_order_4);
//      }
//      else
//      {
//        $count_pie_st_order_4 = 0;
//
//      }
//      $dataPoints1 = array(
//        array("label"=>"Đơn đã hủy", "y"=>$count_pie_st_order_0),
//        array("label"=>"Đơn hàng mới", "y"=>$count_pie_st_order_1),
//        array("label"=>"Đơn hàng đã xác nhận", "y"=>$count_pie_st_order_2),
//        array("label"=>"Đơn hàng đang vận chuyển", "y"=>$count_pie_st_order_3),
//        array("label"=>"Đơn hàng đã giao hàng thành công", "y"=>$count_pie_st_order_4),
//      );
      }

    $pie_order_0 = Order::where('order_status','=',0)->get();
    $pie_order_1 = Order::where('order_status','=',1)->get();
    $pie_order_2 = Order::where('order_status','=',2)->get();
    $pie_order_3 = Order::where('order_status','=',3)->get();
    $pie_order_4 = Order::where('order_status','=',4)->get();

    $count_pie_order_0 = count($pie_order_0);
    $count_pie_order_1 = count($pie_order_1);
    $count_pie_order_2 = count($pie_order_2);
    $count_pie_order_3 = count($pie_order_3);
    $count_pie_order_4 = count($pie_order_4);

    $dataPoints = array(
      array("label"=>"Đơn đã hủy ", "y"=>$count_pie_order_0),
      array("label"=>"Đơn hàng mới", "y"=>$count_pie_order_1),
      array("label"=>"Đơn hàng đã xác nhận", "y"=>$count_pie_order_2),
      array("label"=>"Đơn hàng đang vận chuyển", "y"=>$count_pie_order_3),
      array("label"=>"Đơn hàng đã giao hàng thành công", "y"=>$count_pie_order_4),
    );

    // Top Blog
    $blog_view = Blog::where('status','=',1)->orderBy('view','DESC')->limit(7)->get();
    // Top product view
    $product_top_view = Product::where('status','=',1)->orWhere('status','=',2)->orWhere('status','=',3)->orderBy('view_number','DESC')->limit(8)->get();
    // Top Product in Orders
    //      $order_top_sale = Order::
    $topsales = DB::table('order_details')
      ->leftJoin('product','product.id','=','order_details.id')
      ->leftJoin('order', 'order.order_id', '=', 'order_details.order_id')
      ->select('product.id','product.name','order_details.id',
        DB::raw('SUM(order_details.quantity) as total'))
      ->where('order_status','=',4)
      ->groupBy('product.id','order_details.id','product.name')
      ->orderBy('total','desc')
      ->limit(8)
      ->get();


    $users_test = Order::select('order_total', 'created_at')->where('order_status','=',4)
      ->get()
      ->groupBy(function ($date) {
        return Carbon::parse($date->created_at)->format('m');
      });

    $usermcount = [];
    $userArr = [];

    foreach ($users_test as $key=> $value) {
      $bb = [];
      foreach ($value as $ass) {
        $bb[] = $ass->order_total;
      }
      $usermcount[(int)$key - 1] = array_sum($bb);
    }
      $month = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

      for ($i = 0; $i <= 11; $i++) {
        $userArr[$i]['label'] = $month[$i];
        if (!empty($usermcount[$i])) {
          $userArr[$i]['y'] = $usermcount[$i];
        } else {
          $userArr[$i]['y'] = 0;
        }

      }
      $dataPoints_order = $userArr;

    $categorymcount = [];
    $cateArr = [];
    $category_product = Category::join('product', 'product.idcat', '=', 'category.category_id')->where('category_status','=',1)->where('status','!=',0)->get()->groupBy('category_id');
    $count_name_cate = count($category_product);
    $arr_cate_name = [];
    foreach ($category_product as $key=> $value) {
      $categorymcount[] = count($value);
      foreach ($value as $ass) {
        $cate_name = $ass->category_name;
      }
      $arr_cate_name[] = $cate_name;
    }
    $name_category_column = $arr_cate_name;
    for ($i = 0; $i <= $count_name_cate - 1; $i++) {
      $cateArr[$i]['label'] = $arr_cate_name[$i];
      if (!empty($categorymcount[$i])) {
        $cateArr[$i]['y'] = $categorymcount[$i];
      } else {
        $cateArr[$i]['y'] = 0;
      }
    }
    $dataPoints_category = $cateArr;

    return view($this->viewprefix . 'search',
      compact('orders_search', 'customers', 'count', 'count_order','dataPoints','dataPoints_order',
        'total_order_money', 'total_quantity','date_start','date_end','visitor','date_time_add','pageview','topBrowers','topViewPage',
        'blog_view','product_top_view','topsales','dataPoints_category'

      ));
  }

  public function search_line_order(Request $request) {
    $analyticsData = Analytics::fetchTotalVisitorsAndPageViews(Period::days(28));
    $visitor = $analyticsData->pluck("visitors");
    $date_time_add = $analyticsData->pluck("date");
    $pageview = $analyticsData->pluck("pageViews");
    $topBrowers = Analytics::fetchTopBrowsers(Period::days(28));
    $topViewPage = Analytics::fetchMostVisitedPages(Period::days(28));

    $account = AccountCustomer::all();
    $count = count($account);
    $order = Order::where('order_status','=',4)->get();
    $order_detail = Order_Details::join('order', 'order.order_id', '=', 'order_details.order_id')->join('product', 'order_details.id', '=', 'product.id')
      ->where('order_status','=',4)->get();
    $quantity = [];
    foreach ($order_detail as $count_quantity) {
      $quantity[] = $count_quantity->quantity;
    }
    $total_quantity = array_sum($quantity);
    $count_order = count($order);
    $aa = [];
    foreach ($order as $count_item) {
      $aa[] = $count_item->order_total;
    }
    $total_order_money = array_sum($aa);


    $st_date=$request->start_date;
    $date_start=date('d/m/Y',  strtotime($st_date));
    $st_end=$request->end_date;
    $date_end=date('d/m/Y',  strtotime($st_end));
    $customers = Shipping::all();

//    if (isset ($request->start_date) && !empty($request->start_date) && isset($request->end_date) && !empty($request->end_date)) {
//      $orders_search = Order::select("order.*")
//        ->whereBetween('created_at', [
//          $request->start_date . " 00:00:00",
//          $request->end_date . " 23:59:59",
//        ])
//        ->get();
//      foreach ($orders_search as $item) {
//        $status_item = $item->order_status;
//        if($status_item == '0')
//        {
//          $pie_st_order_0[] = $item;
//        }
//        if($status_item == '1')
//        {
//          $pie_st_order_1[] = $item;
//        }
//        if($status_item == '2')
//        {
//          $pie_st_order_2[] = $item;
//        }
//        if($status_item == '3')
//        {
//          $pie_st_order_3[] = $item;
//        }
//        if($status_item == '4')
//        {
//          $pie_st_order_4[] = $item;
//        }
//      }
//      if(isset($pie_st_order_0) and !empty($pie_st_order_0)) {
//        $count_pie_st_order_0 = count($pie_st_order_0);
//      }
//      else
//      {
//        $count_pie_st_order_0 = 0;
//      }
//      if(isset($pie_st_order_1) and !empty($pie_st_order_1)) {
//        $count_pie_st_order_1 = count($pie_st_order_1);
//      }
//      else
//      {
//        $count_pie_st_order_1 = 0;
//      }
//      if(isset($pie_st_order_2) and !empty($pie_st_order_2)) {
//        $count_pie_st_order_2 = count($pie_st_order_2);
//      }
//      else
//      {
//        $count_pie_st_order_2 = 0;
//      }
//      if(isset($pie_st_order_3) and !empty($pie_st_order_3)) {
//        $count_pie_st_order_3 = count($pie_st_order_3);
//      }
//      else
//      {
//        $count_pie_st_order_3 = 0;
//      }
//      if(isset($pie_st_order_4) and !empty($pie_st_order_4)) {
//        $count_pie_st_order_4 = count($pie_st_order_4);
//      }
//      else
//      {
//        $count_pie_st_order_4 = 0;
//
//      }
//      $dataPoints1 = array(
//        array("label"=>"Đơn đã hủy", "y"=>$count_pie_st_order_0),
//        array("label"=>"Đơn hàng mới", "y"=>$count_pie_st_order_1),
//        array("label"=>"Đơn hàng đã xác nhận", "y"=>$count_pie_st_order_2),
//        array("label"=>"Đơn hàng đang vận chuyển", "y"=>$count_pie_st_order_3),
//        array("label"=>"Đơn hàng đã giao hàng thành công", "y"=>$count_pie_st_order_4),
//      );
//
//      $test_ter = Order::whereYear('created_at', date('Y', strtotime('-1 year')))->get();
//
//      $data = DB::table('order')
//        ->select('order_id')
//        ->whereYear('created_at', '=', 2021)
//        ->orderby('order_id', 'desc')
//        ->get();
//      dump($data);
//
//
//
//    }

    $pie_order_0 = Order::where('order_status','=',0)->get();
    $pie_order_1 = Order::where('order_status','=',1)->get();
    $pie_order_2 = Order::where('order_status','=',2)->get();
    $pie_order_3 = Order::where('order_status','=',3)->get();
    $pie_order_4 = Order::where('order_status','=',4)->get();

    $count_pie_order_0 = count($pie_order_0);
    $count_pie_order_1 = count($pie_order_1);
    $count_pie_order_2 = count($pie_order_2);
    $count_pie_order_3 = count($pie_order_3);
    $count_pie_order_4 = count($pie_order_4);

    $dataPoints = array(
      array("label"=>"Đơn đã hủy ", "y"=>$count_pie_order_0),
      array("label"=>"Đơn hàng mới", "y"=>$count_pie_order_1),
      array("label"=>"Đơn hàng đã xác nhận", "y"=>$count_pie_order_2),
      array("label"=>"Đơn hàng đang vận chuyển", "y"=>$count_pie_order_3),
      array("label"=>"Đơn hàng đã giao hàng thành công", "y"=>$count_pie_order_4),
    );


    // Top Blog
    $blog_view = Blog::where('status','=',1)->orderBy('view','DESC')->limit(7)->get();
    // Top product view
    $product_top_view = Product::where('status','=',1)->orWhere('status','=',2)->orWhere('status','=',3)->orderBy('view_number','DESC')->limit(8)->get();
    // Top Product in Orders
    //      $order_top_sale = Order::
    $topsales = DB::table('order_details')
      ->leftJoin('product','product.id','=','order_details.id')
      ->leftJoin('order', 'order.order_id', '=', 'order_details.order_id')
      ->select('product.id','product.name','order_details.id',
        DB::raw('SUM(order_details.quantity) as total'))
      ->where('order_status','=',4)
      ->groupBy('product.id','order_details.id','product.name')
      ->orderBy('total','desc')
      ->limit(8)
      ->get();

    if(isset($_GET['submit_chose'])){
      if(!empty($_GET['value_year'])) {
        $selected = $_GET['value_year'];
      }
    }
          $data = DB::table('order')
            ->select('order_total','created_at')
            ->where('order_status','=',4)
            ->whereYear('created_at', '=', $selected)
            ->get();
//    dump($data);

    $users_test = Order::select('order_total', 'created_at')->where('order_status','=',4)
      ->whereYear('created_at', '=', $selected)
      ->get()
      ->groupBy(function ($date) {
        return Carbon::parse($date->created_at)->format('m');
      });
    //    dump($users_test);

    $usermcount = [];
    $userArr = [];
    foreach ($users_test as $key=> $value) {
      $bb = [];
      foreach ($value as $ass) {
        $bb[] = $ass->order_total;
      }
      $usermcount[(int)$key - 1] = array_sum($bb);
    }

    $month = ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'];

    for ($i = 0; $i <= 11; $i++) {
      $userArr[$i]['label'] = $month[$i];
      if (!empty($usermcount[$i])) {
        $userArr[$i]['y'] = $usermcount[$i];
      } else {
        $userArr[$i]['y'] = 0;
      }

    }

    $dataPoints_order = $userArr;

    $categorymcount = [];
    $cateArr = [];
    $category_product = Category::join('product', 'product.idcat', '=', 'category.category_id')->where('category_status','=',1)->where('status','!=',0)->get()->groupBy('category_id');
    $count_name_cate = count($category_product);
    $arr_cate_name = [];
    foreach ($category_product as $key=> $value) {
      $categorymcount[] = count($value);
      foreach ($value as $ass) {
        $cate_name = $ass->category_name;
      }
      $arr_cate_name[] = $cate_name;
    }
    $name_category_column = $arr_cate_name;
    for ($i = 0; $i <= $count_name_cate - 1; $i++) {
      $cateArr[$i]['label'] = $arr_cate_name[$i];
      if (!empty($categorymcount[$i])) {
        $cateArr[$i]['y'] = $categorymcount[$i];
      } else {
        $cateArr[$i]['y'] = 0;
      }
    }
    $dataPoints_category = $cateArr;


//    dump($dataPoints_order);
    return view($this->viewprefix . 'search_line',
      compact('customers', 'count', 'count_order','dataPoints_order','dataPoints',
        'total_order_money', 'total_quantity','date_start','date_end','visitor','date_time_add','pageview','topBrowers','topViewPage',
        'blog_view','product_top_view','topsales','selected','dataPoints_category'
      ));
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

}
