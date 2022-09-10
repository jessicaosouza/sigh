<?php

namespace App\Services;

use App\Models\Asset;

class AssetService
{
    public static function create($request)
    {
        return Asset::create($request->all());
    }

    public static function update($request, $asset)
    {
        return $asset->update($request->all());
    }
}