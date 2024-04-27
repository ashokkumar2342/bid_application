<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $table='login_log';
    public $timestamps=false;

    public function insArr($insArr){
    	return $this->insertGetId($insArr);
    }
}
