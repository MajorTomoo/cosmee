<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller{
    
 public function addProduct(Request $request){
     $this->validate($request, [
      'name'=>'required|unique:products',
      'brand'=>'required',
      'current_price'=>'required|Numeric',
      'orginal_price'=>'required|Numeric',
      'size'=>'required',
      'description'=>'required',
      'type'=>'required',
      'stock'=>'required|integer',
      'image'=>'required|image',
      'category'=>'required'
      
     ]);
     
    $product=new Product();
    $product->name=$request['name'];
    $product->current_price=$request['current_price'];
    $product->orginal_price=$request['orginal_price'];
    $product->size=$request['size'];
    $product->description=$request['description'];
    $product->type=$request['type'];
    $product->stock=$request['stock'];
    $product->brand=$request['brand'];
    $product->category=$request['category'];
  
    //file handle
    $file=$request->file('image');
    $tmp_name=$_FILES['image']['name'];
    $extension = pathinfo($tmp_name)['extension'];
    //
    $product->img_extension=$extension;
    $product->save();
  
    $current_product=Product::where('name',$request['name'])->first();
    
    $filename=date("Ymd")."/".$current_product->id."_".$current_product->brand.".".$extension;
    Storage::disk('local')->put($filename,File::get($file));
    //
    return redirect()->route('admin')->with('message','success');
 } 
 //edit product
 public function getEdit($id){
     $product=Product::where('id',$id)->first();
    return view('admin.edit-product',['product'=>$product]); 
 }
 public function editProduct(Request $request){
     $this->validate($request, [
         'name'=>'required',
         'brand'=>'required',
         'current_price'=>'required|Numeric',
         'orginal_price'=>'required|Numeric',
         'size'=>'required',
         'description'=>'required',
         'type'=>'required',
         'stock'=>'required|integer',
         'category'=>'required'
         
         
     ]);
     Product::where('id',$request['id'])->update([
      'name'=>$request['name'],   
         'current_price'=>$request['current_price'],
         'orginal_price'=>$request['orginal_price'],
         'size'=>$request['size'],
         'description'=>$request['description'],
         'type'=>$request['type'],
         'stock'=>$request['stock'],
         'brand'=>$request['brand'],
         'category'=>$request['category']
         
         
     ]);
     //upload image
     if($_FILES['image']['name']){
     $file=$request->file('image');
     $tmp_name=$_FILES['image']['name'];
     $extension = pathinfo($tmp_name)['extension'];
     $filename=date("Ymd")."/".$request['id']."_".$request['brand'].".".$extension;
     Storage::disk('local')->put($filename,File::get($file));
     }
     return redirect()->route('admin')->with('message','success');;
 }
 //delete product
 public function deleteProduct($id){
   $product=Product::find($id);
   $product->delete();
   return redirect()->route('admin')->with('message','success');
     
 }
 public function getProductImage($filedate,$filename){
     $file=Storage::disk('local')->get($filedate.'/'.$filename);
     
     return response($file,200);
 }
    
}