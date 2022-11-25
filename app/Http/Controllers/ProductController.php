<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return $products;
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return['msg'=> 'Produto não encontrado!'];
        } else {
            return $product;
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return['msg'=> 'Atualização não pode ser feita!'];
        } else {
            $product->update($request->all());
            return['msg'=> 'Produto alterado com sucesso!'];
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return['msg'=> 'Produto não existe!'];
        } else {
            $product->delete();
            return['msg'=> 'Produto excluido com sucesso!'];
        }
    }
}
