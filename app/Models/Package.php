<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'duration', 'price'];
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
}
