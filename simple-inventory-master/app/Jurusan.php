<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Jurusan extends Model
{
    protected  $table = 'jurusan';

    protected $primaryKey = 'id_jurusan'; // karena Jurusan ini ngelink ke ruangan jadi di deklarasikan $primaryKey nya

    protected $fillable = ['name_jurusan', 'fakultas_id'];


    public function fakultas()
    {
    	return $this->belongsTo(Fakultas::class);
    }

}
