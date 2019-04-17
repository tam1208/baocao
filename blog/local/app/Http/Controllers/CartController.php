<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
class CartController extends Controller
{
    //
    public function getAddCart($id){
    	$product = Product::find($id);
    	Cart::add(['id' =>$id, 'name' =>$product->prod_name, 'qty' => 1, 'price' =>$product->prod_price, 'weight' => 550, 'options' => ['img' => $product->prod_img]]);
    	return redirect('cart/show');
    }
    public function getShowCart()
    {
        $data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart',$data);
    }
    public function getDeleteCart($id)
    {
        if($id=='all')
        {
            Cart::destroy();
        }
        else
        {
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
    }
    public function postComplete(Request $request)
    {
        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();

        Mail::send('frontend.email', $data, function($message) use ($email){
            $message->from('www.vietpro.edu.vn@gmail.com','Nampro');

            $message->to($email, $email);

            $message->cc('nam.nguyenhuynhnhatd15th06@gmail.com','Nhật Nam');

            $message->subject('Xác nhận hóa đơn mua hàng HagolaShop');
        });
        Cart::destroy();
        return redirect('complete');
    }
    public function getComplete()
    {
        return view('frontend.complete');
    }
}
