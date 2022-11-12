<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Inertia::render('Company/Index');
    }

    public function create()
    {
        return Inertia::render('Company/Create');
    }

    public function show(Company $company)
    {
        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    public function edit(Company $company)
    {
        return Inertia::render('Company/Edit', [
            'company' => $company
        ]);
    }
}
