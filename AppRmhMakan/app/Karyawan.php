<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    public function getjenisAttribute($jenis){
        $namajenis = "";
        if($jenis=="w"){
            $namajenis = "Waiter";
        }elseif($jenis=="k"){
            $namajenis = "Koki";
        }elseif($jenis=="c"){
            $namajenis = "Kasir";
        }
        return $namajenis;
    }

    protected $table="tblkaryawan";

    protected $fillable = ['nama','alamat','telepon','jenis'];
}
