<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //getProducts

    public function getProduct(){
        return response()->json(Product::all(),200);
    }


      //getProductById
      public function getProductByuId($id){
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json(['message' => 'Produit introuvable'],404);
        }
        return response()->json(Product::find($id),200);
    }


   // add Product
   public function addProduct(Request $request){
       $product = Product::create($request->all());
       return response($product,201);
}

  // update Product
  public function updateProduct(Request $request, $id){
    $product = Product::find($id);
    if(is_null($product)){
        return response()->json(['message' => 'Produit introuvable'],404);
    }
    $product->update($request->all());
    return response($product,200);
}

//delete Product

public function deleteProduct($id){
    $product=Product::find($id);
    if(is_null($product)){
        return response()->json(['message' => 'Produit introuvable'],404);
    }
    $product->delete();
    return response(null,204);
    
}

}
