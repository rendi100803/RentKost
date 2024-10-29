<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['kost_id', 'type', 'facility'];

    public function kost()
    {
        return $this->belongsTo(Kost::class, 'kost_id');
    }
}
