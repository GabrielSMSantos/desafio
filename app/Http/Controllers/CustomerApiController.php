<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerApiService;
use App\Http\Requests\CustomerApiRequest;

class CustomerApiController extends Controller
{
    private $customerApiService;

    public function __construct(CustomerApiService $customerApiService)
    {
        $this->customerApiService = $customerApiService;
    }

    public function store(CustomerApiRequest $request)
    {
        return $this->customerApiService->store($request);
    }
}
