<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Loan;
use App\Services\LoanService;

class LoanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreLoanRequest $request)
    {
        if($loan = LoanService::create($request))
        {
            return response(LoanResource::make($loan), 201);
        }
        return response('',500);
    }

    public function list()
    {
        //
    }

    public function show(Loan $loan)
    {
        return response(LoanResource::make($loan), 200);
    }

    public function update(UpdateLoanRequest $request, Loan $loan)
    {
        if(LoanService::update($request, $loan))
        {
            return response('', 200);
        }
        return response('',500);
    }
}
