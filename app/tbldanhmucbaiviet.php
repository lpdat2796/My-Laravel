<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldanhmucbaiviet extends Model
{
    //
    protected $table = "tbldanhmucbaiviet";
    public function tblbaiviet(){
    	return $this->hasMany('App\tblbaiviet','iddanhmucbaiviet','iddanhmucbaiviet');//([3] là khóa chính, [2] là khóa ngoại)
    }
}
