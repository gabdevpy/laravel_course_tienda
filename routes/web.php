<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Product;
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function(){
    return 'Esta es la url raiz';
});

Route::get('products', function (){
    //return 'Listado de productos';
    //$products = Product->all();
    $products = Product::orderBy('price', 'desc')->get();
    return view('products.index', compact('products'));
})
->name('products.index');

Route::get('products/create', function (){
    return view('products.create');
})->name('products.create');

//save product with params que vienen del form
Route::post('products', function (Request $request){
    //return 'Guardando producto...';
    //return $request->all();

    //save product with inputs
    $newProduct = new Product;
    $newProduct->description = $request->input('description');
    $newProduct->price = $request->input('price');
    $newProduct->save();

    //redirect to lista de productos
    return redirect()->route('products.index')->with('info', 'Producto registrado exitosamente');

})->name('products.store');

Route::delete('products/{id}', function($id){
    //return $id;
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info','El producto fue eliminado exitosamente');
})->name('products.destroy');

Route::get('product/{id}/edit', function($id)  {
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
})->name('products.edit');

Route::put('/products/{id}', function(Request $request, $id){
    //- return $id;
    $product = Product::findOrFail($id);
    //- return $product;
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->save();
    return redirect()->route('products.index')->with('info','El producto fue actualizado exitosamente');
})->name('products.update');
