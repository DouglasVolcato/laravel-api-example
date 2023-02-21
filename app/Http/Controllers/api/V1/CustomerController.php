<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return new CustomerCollection(Customer::paginate());
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @return RedirectResponse
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * @return Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @return RedirectResponse
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return RedirectResponse
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
