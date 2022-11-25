<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return $customers;
    }

    public function store(Request $request)
    {
        $customers = Customer::create($request->all());
        return response()->json(['msg' => 'Cliente inserido com sucesso!'], 201);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Cliente não encontrado!'], 404);
        }

        return response()->json($customer, 200);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Atualização não pode ser feita!'], 404);
        } else {
            $customer->update($request->all());
            return response()->json(['msg'=> 'Cliente alterado com sucesso!'], 200);
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Cliente não existe!'], 404);
        } else {
            $customer->delete();
            return response()->json(['msg'=> 'Cliente excluido com sucesso!'], 200);
        }
    }
}
