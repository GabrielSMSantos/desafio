<?php

namespace App\Services;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class CustomerService
{
    public function store(Request $request)
    {
        try {
            Customer::create([
                'cpf' => $request->cpf,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date,
                'email' => $request->email,
                'gender' => $request->gender,
            ]);

            session()->flash('status', 'success');
            session()->flash('message', 'Cliente criado com sucesso!');
        } catch (QueryException $error) {
            session()->flash('status', 'error');
            session()->flash('message', 'Erro ao criar cliente.');
        }
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update([
                'cpf' => $request->cpf,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'birth_date' => $request->birth_date,
                'email' => $request->email,
                'gender' => $request->gender,
            ]);

            session()->flash('status', 'success');
            session()->flash('message', 'Cliente editado com sucesso!');
        } catch (QueryException $error) {
            session()->flash('status', 'error');
            session()->flash('message', 'Erro ao editar cliente.');
        }
    }

    public function delete(Customer $customer)
    {
        try {
            $customer->delete();

            session()->flash('status', 'success');
            session()->flash('message', 'Cliente deletado com sucesso!');
        } catch (QueryException $error) {
            session()->flash('status', 'error');
            session()->flash('message', 'Erro ao deletar cliente.');
        }
    }
}
