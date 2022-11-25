<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->all();
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $request->validate($this->product->rules(), $this->product->feedback());

        $product = $this->product->create($request->all());
        return response()->json(['msg' => 'Produto inserido com sucesso!'], 201);
    }

    public function show($id)
    {
        $product = $this->product->find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Produto não encontrado!'], 404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $product = $this->product->find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Atualização não pode ser feita!'], 404);
        } else {
            $product->update($request->all());
            return response()->json(['msg'=> 'Produto alterado com sucesso!'], 200);
        }
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);

        if(empty($product)) {
            return response()->json(['msg'=> 'Não foi possivel excluir o produto!'], 404);
        } else {
            $product->delete();
            return response()->json(['msg'=> 'Produto excluido com sucesso!'], 200);
        }
    }
}
