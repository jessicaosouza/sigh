<?php

namespace App\Services;

use App\Models\Loan;

class LoanService
{
    public static function create($request)
    {
        return Loan::create($request->all());
    }

    public static function update($request, $loan)
    {
        return $loan->update($request->all());
    }
}