<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Particular extends Model
{
    protected $fillable = [
        'particular', 'account_code'
    ];

    public function remarks(){
        return $this->hasMany('App\Remark');
    }
}
