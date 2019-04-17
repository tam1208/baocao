<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use DB;

class CategoryController extends Controller
{
    //
    public function getCate()//Xem danh mục
    {
    	$data['catelist'] = Category::all();
    	return view('backend.category',$data);
    }
    public function postCate(AddCateRequest $request)//hàm thêm danh mục cho người dùng
    {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();
    }

    public function getEditCate($id)//Tìm danh mục để sửa
    {
        $data['cate'] = Category::find($id);
    	return view('backend.editcategory',$data);
    }
    public function postEditCate(EditCateRequest $request,$id)//hàm sửa danh mục cho người dùng
    {
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }
    public function getDeleteCate($id)//Xóa tên danh mục có sẳn
    {
        /*$data['productlist'] = DB::table('vp_products')
        ->join('vp_categories','vp_products.prod_cate','=','vp_categories.cate_id')
        ->select('count(*)')
        ->where('prod_id','id')
        ->get();*/
        //$data['a'] = DB::table('vp_products')->select(DB::raw('count(*)'))->where('prod_cate', $id)->get();
        $data = DB::table('vp_products')->where('prod_cate', $id)->count();
        
        if ($data == 0) {
            # code...
            Category::destroy($id);
            return back();
        }
    	else
            dd('that bai');
        //echo $data ;
    }

}
