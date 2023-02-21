<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Http\Resources\V1\CustomerResource;
use App\Filters\V1\CustomerFilter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param HttpRequest $request
     * @return Response
     */
    public function index(HttpRequest $request)
    {
        $filter = new CustomerFilter();
        $filterItens = $filter->transform($request); //[['column', 'operator', 'value']]

        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($filterItens);

        if ($includeInvoices) {
            $customers = Customer::with('invoices');
        }

        return new CustomerCollection($customers->paginate()->appends($request->query()));
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
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     * @return Response
     */
    public function show(Customer $customer)
    {
        $includeInvoices = request()->query('includeInvoices');

        if($includeInvoices) {
            return new CustomerResource($customer->loadMissing('invoices'));    
        } 

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
        $customer->update($request->all());
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
