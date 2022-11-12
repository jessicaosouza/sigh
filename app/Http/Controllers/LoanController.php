<?php

namespace App\Http\Controllers;

use App\Services\LoanService;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Loan/Index', [
            'loans' => LoanService::getLoans($request),
            'filters' => $request->only(['search'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Loan/Create');
    }

    public function show(Loan $loan)
    {
        return Inertia::render('Loan/Show', [
            'loan' => $loan
        ]);
    }

    public function edit(Loan $loan)
    {
        return Inertia::render('Loan/Edit', [
            'loan' => $loan
        ]);
    }
}
