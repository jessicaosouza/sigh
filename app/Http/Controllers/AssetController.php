<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    public function index()
    {
        return Inertia::render('Asset/Index');
    }

    public function show(Asset $asset)
    {
        return Inertia::render('Asset/Show', [
            'asset' => $asset
        ]);
    }

    public function edit(Asset $asset)
    {
        return Inertia::render('Asset/Edit', [
            'asset' => $asset
        ]);
    }
}
