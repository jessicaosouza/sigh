<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'series_number',
        'description',
        'ordered_by',
        'acquired_by',
    ];

    public function orderedBy()
    {
        return $this->belongsTo(User::class, 'ordered_by');
    }

    public function acquiredBy()
    {
        return $this->belongsTo(User::class, 'acquired_by');
    }
}
