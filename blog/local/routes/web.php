<?php

Route::get('/','FrontendController@getHome');

Route::get('detail/{id}/{slug}.html','FrontendController@getDetail');
Route::post('detail/{id}/{slug}.html','FrontendController@postComment');


Route::get('category/{id}/{slug}.html','FrontendController@getCategory');

Route::get('search','FrontendController@getSearch');


Route::group(['prefix'=>'cart'],function(){
	Route::get('add/{id}','CartController@getAddCart');
	Route::get('show','CartController@getShowCart');
	Route::get('delete/{id}','CartController@getDeleteCart');
	Route::get('update','CartController@getUpdateCart');
	Route::post('show','CartController@postComplete');
});


Route::get('complete','CartController@getComplete');



Route::get('sayhello/{stn}/{sth}',function($stn,$sth){
	$tong = $stn + $sth ;
	return $tong;
});


Route::get('controller/{stn}/{sth}','MyFirstController@getController');
Route::get('view','MyFirstController@getView');
Route::get('post','MyFirstController@getPost');
//Route::get('category','MyFirstController@getCategory');

//root/admin/home

//root/sayhello/Linh

//root/admin/product/add
//root/admin/product/edit/12
//root/admin/product/view/12
//root/admin/product/delete/12

// ký hiệu {} trong laravel là đồng nghĩa vối biến xuất echo của php
//-----------------------------------------------------------------------------------------------------------------------

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});

	Route::get('logout','HomeController@getLogout');

	Route::group(['prefix'=>'admin'],function(){
		Route::get('home','HomeController@getHome');

			//------Phần Category Admin Backend-----------
		Route::group(['prefix'=>'category'],function(){
			Route::get('/','CategoryController@getCate');
			Route::post('/','CategoryController@postCate');

			Route::get('edit/{id}','CategoryController@getEditCate');
			Route::post('edit/{id}','CategoryController@postEditCate');

			Route::get('delete/{id}','CategoryController@getDeleteCate');
		});
			// Khai báo xong đường dẫn ta tạo thư mục CategoryController bằng lệnh cmd: php artisan make: Admin\CategoryController
			//----------------------------------------------------------------------


			//------Phần Product Admin Backend--------------------------------------
		Route::group(['prefix'=>'product'],function(){
			// Đường dẫn để xem trang chủ product vào website gõ http://localhost/blog/admin/product. Code của getProduct được viết bên trang ProductController.php . Phải làm hoàn thiện đường dẫn này và code bên kia(ProductController.php) thì mới chạy được trang website phần Product.
			Route::get('/','ProductController@getProduct');

			Route::get('add','ProductController@getAddProduct');
			Route::post('add','ProductController@postAddProduct');
			

			Route::get('edit/{id}','ProductController@getEditProduct');
			Route::post('edit/{id}','ProductController@postEditProduct');

			Route::get('delete/{id}','ProductController@getDeleteProduct');
			// Khai báo xong đường dẫn trên thì ta phải tạo thư mục ProductController bằng lệnh cmd: php artisan make: Admin\ProductController
			//----------------------------------------------------------------------
		});		
	});
});
Route::get('a', function () {
    $data = DB::table('vp_products')->select(DB::raw('count(*)'))->where('prod_cate','2')->get();
   //	print_r($data);
    echo $data;
});
//Hướng dẫn tạo bảng table trong thư mục migrations bằng lệnh cmd: php artisan make:migration vp_products create=vp_products. Sao đó chúng ta thấy trong thư mục migrations có file 2019_04_04_050109_vp_products.php .Là chúng ta đã tạo xong. Và tiếp theo chúng ta sẽ điền thông tin cho bảng table 2019_04_04_050109_vp_products.php. Điền thông tin xong chúng ta mở cmd lên và gõ lệnh tạo bảng table bằng lệnh cmd: php artisan migrate. Vậy kết quả là table vp_product trong database db_blog đã có dữ liệu như giá sp,phụ kiện,tình trạng,khuyến mãi,...... $users = DB::table('users')->select(DB::raw('count(*) as user_count, status'))->where('status', '<>', 1)->groupBy('status')->get();







