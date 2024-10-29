<?php

namespace App\Models;

use App\Models\User\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    use HasFactory;

    protected $guarded = [''];

    const TAGS = [
        'kost putra',
        'kost putri',
        'kost campur',
    ];

    public function facilities()
    {
        return $this->hasMany(Facility::class);
    }

    public function rules()
    {
        return $this->hasMany(Rules::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'kost_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
