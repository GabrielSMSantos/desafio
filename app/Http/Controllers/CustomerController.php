<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $countPerPage = 5;
        $customers    = Customer::orderByDesc('id')->paginate($countPerPage);
        $pages        = $customers->count() ? round($customers->total() / $countPerPage) : 1;

        return view('customers.index', compact('customers', 'pages'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request)
    {
        $this->customerService->store($request);
        return redirect()->route('customer.index');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        $this->customerService->update($request, $customer);
        return redirect()->route('customer.index');
    }

    public function delete(Customer $customer)
    {
        $this->customerService->delete($customer);
        return redirect()->route('customer.index');
    }
}
