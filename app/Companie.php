<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companie extends Model
{
    protected $fillable = ['name','email','website','logo'];

    public function employes(){
        return $this->hasMany(Employee::class, 'companies_id');
    }

}
