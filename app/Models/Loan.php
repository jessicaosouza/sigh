<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'lended_at',
        'retrieved_at',
        'asset_id',
        'lended_by',
        'user_id',
        'observations',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function lender()
    {
        return $this->belongsTo(User::class, 'lended_by');
    }
}
