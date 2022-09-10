<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'lended_at' => $this->lended_at,
            'retrieved_at' => $this->retrieved_at,
            'lended_by' => UserResource::make($this->lender),
            'user' => UserResource::make($this->user),
            'asset' => AssetResource::make($this->asset),
            'observations' => $this->observations,
        ];
    }
}
