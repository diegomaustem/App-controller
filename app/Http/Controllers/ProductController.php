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
        return response()->json(['msg' => 'Produto inserido com sucesso!'], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Produto não encontrado!'], 404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Atualização não pode ser feita!'], 404);
        } else {
            $product->update($request->all());
            return response()->json(['msg'=> 'Produto alterado com sucesso!'], 200);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Não foi possivel excluir o produto!'], 404);
        } else {
            $product->delete();
            return response()->json(['msg'=> 'Produto excluido com sucesso!'], 200);
        }
    }
}
