<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use App\Http\Resources\AssetResource;
use App\Models\Asset;
use App\Services\AssetService;
use Illuminate\Support\Facades\Gate;

class AssetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function list()
    {
        //
    }

    public function store(StoreAssetRequest $request)
    {
        if($asset = AssetService::create($request))
        {
            return response(AssetResource::make($asset), 201);
        }
        return response('',500);
    }

    public function show(Asset $asset)
    {
        Gate::authorize('show', $asset);
        return response(AssetResource::make($asset), 200);
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        
        if(AssetService::update($request, $asset))
        {
            return response('', 200);
        }
        return response('',500);
    }
}
