<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    //
    protected $table="tblpelanggan";

    protected $fillable = ['nama','alamat','telepon'];
}
