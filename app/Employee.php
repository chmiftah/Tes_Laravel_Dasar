<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable=['nama','email','companies_id'];

    public function companies(){
        return $this->belongsTo(Companie::class);
    }
}
