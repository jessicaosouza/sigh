<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreCompanyRequest $request)
    {
        if($company = CompanyService::create($request))
        {
            return response(CompanyResource::make($company), 201);
        }
        return response('',500);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        if(CompanyService::update($request, $company))
        {
            return response('', 200);
        }
        return response('',500);
    }

    public function show(Company $company)
    {
        return response(CompanyResource::make($company), 200);
    }

    public function list()
    {
        //
    }
}
