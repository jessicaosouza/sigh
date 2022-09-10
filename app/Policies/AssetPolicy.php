<?php

namespace App\Policies;

use App\Models\Asset;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Asset $asset)
    {
        dd($user->department->company->id, $asset->company_id);
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Asset $asset)
    {
        //
    }
}
