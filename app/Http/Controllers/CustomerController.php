<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customer->all();
        return response()->json($customers, 200);
    }

    public function store(Request $request)
    {
        $customers = $this->customer->create($request->all());
        return response()->json(['msg' => 'Cliente inserido com sucesso!'], 201);
    }

    public function show($id)
    {
        $customer = $this->customer->find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Cliente não encontrado!'], 404);
        }

        return response()->json($customer, 200);
    }

    public function update(Request $request, $id)
    {
        $customer = $this->customer->find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Atualização não pode ser feita!'], 404);
        } else {
            $customer->update($request->all());
            return response()->json(['msg'=> 'Cliente alterado com sucesso!'], 200);
        }
    }

    public function destroy($id)
    {
        $customer = $this->customer->find($id);

        if(empty($customer)) {
            return response()->json(['msg'=> 'Cliente não existe!'], 404);
        } else {
            $customer->delete();
            return response()->json(['msg'=> 'Cliente excluido com sucesso!'], 200);
        }
    }
}
