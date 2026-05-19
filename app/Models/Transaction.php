<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    'member_id',
    'package_id',
    'price',
    'start_date',
    'end_date'
];
    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function package(){
        return $this->belongsTo(Package::class);
    }
}
