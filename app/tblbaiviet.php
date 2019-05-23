<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblbaiviet extends Model
{
    //
    protected $table = "tblbaiviet";
   	public function tbldanhmucbaiviet(){
   		return $this->belongsto('App\tbldanhmucbaiviet','iddanhmucbaiviet','idbaiviet');
   	}
}
