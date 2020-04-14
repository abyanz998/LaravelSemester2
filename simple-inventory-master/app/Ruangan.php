<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
  protected  $table = 'ruangan';

  protected $primaryKey = 'id';

  protected $fillable = ['jurusan_id','name'];

  public function jurusan()
  {
    return $this->belongsTo(Jurusan::class); //kalo gini ga perlu pake use App lagi
  }
}
