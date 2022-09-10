<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class CompanyService
{
    public static function create($request)
    {
        return Company::create($request->all());
    }

    public static function update($request, $company)
    {
        return $company->update($request->all());
    }
}