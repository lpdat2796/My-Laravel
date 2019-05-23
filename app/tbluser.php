<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbluser extends Model
{
    //
    protected $table='users';
    //sửa lỗi SQLSTATE[42S22]: Column not found: 1054 Unknown column
    public $timestamps = false;
    //sửa lỗi default primary là id
    protected $primaryKey ='iduser';
    use HasApiTokens, Notifiable;
}
