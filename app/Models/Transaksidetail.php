<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksidetail extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function riwayat()
    {
        return $this->belongsTo(Riwayat::class);
    }

}
