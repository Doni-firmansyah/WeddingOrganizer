<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function wo()
    {
        return $this->belongsToMany(WO::class);
    }
    // public function wo()
    // {
    //     return $this->belongsTo(Wo::class);
    // }


}
