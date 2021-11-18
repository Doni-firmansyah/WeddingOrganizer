<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_wo');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
