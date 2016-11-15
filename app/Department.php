<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
        # return $this->belongsToMany('App\User', 'users_x_departments', 
        #             'department_id', 'user_id' );
    } 
}
