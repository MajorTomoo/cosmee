<?php 
namespace App\Http\Controllers;
use App\Product;

class HomeController extends Controller{
    
    
    public function getHome(){
        $products=Product::select('id','created_at','img_extension','name','brand','category','type','current_price')->limit(25)->get();
        return view('welcome',['products'=>$products]);
    }
    public function getAdminPage(){
        $products=Product::all();
        return view('admin.admin',['products'=>$products]);
    }
    public function getAddProduct(){
        
        return view('admin.add-product');
    }
    
}



?>