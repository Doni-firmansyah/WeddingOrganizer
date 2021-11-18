<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function wo()
    {
        return $this->belongsTo(Wo::class);
    }
    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class);
    }

}
