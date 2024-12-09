<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductSaveRequest;
use App\Models\Category;
use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Illuminate\Http\Request;
use Storage;
use Str;

class ProductController
{
    //
    public function list(){
        $products = Product::latest()->paginate(15);
        return view("admin.products.list",compact("products"));
    }

    public function create(){
        $categories = Category::all();
        return view("admin.products.create",compact("categories"));
    }

    public function save(ProductSaveRequest $request){
        $input = $request->validated();
        if($request->hasFile("image")){
            $extension = $request->image->extension();
            $filename = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs("images", $filename, 'public');
            $input['image']= $filename;
        }
        
        Product::create($input);
        
        return redirect("products")->with("message","Product saved successfully");
        

    }

    public function delete($id){
        $product = Product::find( decrypt($id));
        if(!empty($product->image)){
            Storage::delete("images/".$product->image);
        }
        $product->delete();
        return redirect("products")->with("message","Product deleted successfully");
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::find( decrypt($id));
        return view('admin.products.edit',compact('product','categories'));
    }

    public function update(ProductSaveRequest $request){
        $input = $request->validated();
        $product = Product::find(decrypt($request->product_id));
        
        if($request->hasFile("image")){
            
            
            if(!empty($product->image)){
                $old_file= "images/".$product->image;
                //return $old_file."---new---".$filename;
                Storage::delete($old_file);
                //return $old_file;
            }
            $extension = $request->image->extension();
            $filename = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs("images", $filename);
            $input['image']= $filename;
        }
        
        

        $product->update($input);
        
        return redirect("products")->with("message","Product updated successfully");
        

    }
    
}
