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
        return $customers;
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return['msg'=> 'Cliente não encontrado!'];
        } else {
            return $customer;
        }
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return['msg'=> 'Atualização não pode ser feita!'];
        } else {
            $customer->update($request->all());
            return['msg'=> 'Cliente alterado com sucesso!'];
        }
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if(empty($customer)) {
            return['msg'=> 'Cliente não existe!'];
        } else {
            $customer->delete();
            return['msg'=> 'Cliente excluido com sucesso!'];
        }
    }
}
