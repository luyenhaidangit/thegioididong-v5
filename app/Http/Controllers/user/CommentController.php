<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Logo;
use App\Models\Product;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Support\Carbon;
use App\Http\Controllers\user\Session;

class CommentController extends Controller
{
    //
    public function add_comment(Request $request){
        if (Auth::guard('account_customer')->check()) {
            Carbon::now('Asia/Ho_Chi_Minh');
            $time = Carbon::now();
            $comment = new Comment();
            $request->validate([
                'comment' => 'required',
                'product_id' => 'required',
                'rate_value' => 'required',
            ]);
            $comment->product_id = $request->product_id;
            $comment->comment_content = $request->comment;
            $comment->create_date = $time;
            $comment->comment_status = 1;
            $comment->star = $request->rate_value;
            $comment->customer_id=Auth::guard('account_customer')->id();
        $comment->save();
        return redirect()->back();
        }else{
            return Redirect()
                ->back()
                ->with('wishlist', 'Hãy đăng nhập');
        }
    }
}
