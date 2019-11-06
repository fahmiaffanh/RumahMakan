<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function getKelompokAttribute($kelompok){
        $namakelompok = "";
        if($kelompok=="m"){
            $namakelompok = "Makanan";
        }elseif($kelompok=="n"){
            $namakelompok = "Minuman";
        }
        return $namakelompok;
    }

    protected $table="tblmenu";

    protected $fillable = ['nama','kelompok','harga'];
}
