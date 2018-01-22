<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    protected $fillable = [
        'remark', 'particular_id'
    ];

    public function particular(){
        return $this->belongsTo('App\Particular');
    }
}
