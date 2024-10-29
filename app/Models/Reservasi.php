<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasis';

    protected $fillable = ['user_id', 'kost_id', 'start_date'];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
