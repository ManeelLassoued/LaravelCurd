<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    //show product
   public function index(){
    $products =Product::orderBy('created_at','DESC')->paginate(5);
return view('products.list',['products'=>$products]);
   }
   //show create product page
   public function create(){
return view('products.create');
   }
   //add product in db
   public function store(Request $request){
$rules =[
'name'=> 'required|min:5',
'sku'=> 'required|min:3',
'price'=> 'required|numeric',
];
if($request->image !=""){
    $rules['image'] = 'image';
}
$validator = Validator::make($request->all(),$rules);
if($validator->fails()){
    return redirect()->route('products.create')->withInput()->withErrors($validator);
}
$product = new Product();
$product->name = $request->name;
$product->price = $request->price;
$product->qty = $request->qty;
$product->description = $request->description;
$product->sku = $request->sku;
$product->save() ;
if($request->image !=""){
$image = $request->image;

$imageName = time() . '_' . $image->getClientOriginalName();
$image->move(public_path('uploads/products'),$imageName);
$product->image = $imageName;
$product->save() ;}

return redirect()->route('products.index')->with('success','Product added successfully.');
   }
   //show edit product page
   public function edit($id)
   {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
   }
   public function update(Request $request, $id)
   {
        $request->validate([
          'name'=> 'required|min:5',
          'sku'=> 'required|min:3',
          'price'=> 'required|numeric',
       ]);

        $product = Product::findOrFail($id);

       $product->name = $request->input('name');
       $product->price = $request->input('price');
       $product->description = $request->input('description');
       $product->qty = $request->input('qty');
       $product->sku = $request->input('sku');

        if ($request->hasFile('image')) {
            if ($product->image) {
                File::delete(public_path('uploads/products/' . $product->image));
                       }

           $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
           $request->file('image')->move(public_path('uploads/products'), $imageName);
           $product->image = $imageName;
       }

       $product->save();
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
   }
   public function remove($id){
    $product = Product::findOrFail($id);
    if ($product->image) {
         File::delete(public_path('uploads/products/' . $product->image));
    }

     $product->delete();
    return redirect()->route('products.index')->with('success', 'Product removed successfully!');

   }
}
