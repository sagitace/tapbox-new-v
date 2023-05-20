<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;
use App\Models\User;
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function view_category(){

        if(Auth::id()){

             $data=category::all();
            return view('admin.category',compact('data'));

        }
        else{
            return redirect('/login');
        }


    }

    public function add_category(Request $request){
       $data=new Category;
        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Added Successfully');
    }

    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category deleted successfully');
    }

    public function view_product(){
        $category = category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request){
        $product = new product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount;
        $product->category = $request->input('category');
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message','Successfully added new product');
    }

    public function show_product(){
        $product=product::all();
        $total_product=product::all()->count();

        return view('admin.show_product', compact('product','total_product'));
    }

    public function delete_product($id){
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully!');
    }

    public function update_product($id){

        $product = product::find($id);
        $category = category::all();
        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $request, $id){

        if(Auth::id()){
            $product=product::find($id);

        $product -> title = $request->title;
        $product -> description = $request->description;
        $product -> price = $request->price;
        $product -> discount_price = $request->discount;
        $product -> category = $request->category;
        $product -> quantity = $request->quantity;


        $image = $request->image;

        if($image){
             $imagename=time().'.'.$image->getClientOriginalExtension();
        $request -> image-> move('product',$imagename);

        $product -> image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product updated successfully');
        }
        else{
            return redirect('/login');
        }


    }

    public function order(){
        $order=order::all();
        return view('admin.order',compact('order'));
    }

    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status='delivered';
        $order->payment_status='Paid';
        $order->save();
        return redirect()->back()->with('message','Order delivered successfully!');
    }

    public function print($id){

        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_reciept.pdf');
    }

    public function send_email($id){
        $order=order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request,$id){
        $order=order::find($id);
        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();
    }

    public function searchdata(Request $request){
        $search=$request->search;
        $order=order::where('name','LIKE',"%$search%")->orWhere('phone','LIKE',"%$search%")->orWhere('product_title','LIKE',"%$search%")->orWhere('name','LIKE',"%$search%")->orWhere('email','LIKE',"%$search%")->orWhere('address','LIKE',"%$search%")->orWhere('payment_status','LIKE',"%$search%")->orWhere('delivery_status','LIKE',"%$search%")->get();
        return view('admin.order',compact('order'));
    }

    public function customer(Request $request){

        return view('admin.customer');
    }
    public function admin_account(Request $request){
        $user=user::all();
        return view('admin.admin_account',compact('user'));
    }
    public function customer_account(Request $request){
        $user=user::all();
        return view('admin.customer_account',compact('user'));
    }

    public function isdelivered(Request $request){
        $order=order::all();
        return view('admin.delivered',compact('order'));
    }

    public function processing(Request $request){
        $order=order::all();
        return view('admin.processing', compact('order'));
    }

    public function detailed_orders(Request $request){
        $order=order::all();
        return view('admin.detailed_orders', compact('order'));
    }
}
