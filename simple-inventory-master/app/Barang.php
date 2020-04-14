<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
  protected  $table = 'barang';

  protected $primaryKey = 'id_barang';

  protected $fillable = ['ruangan_id','name_barang','total','broken','created_by','updated_by'];

  public function ruangan()
  {
    return $this->belongsTo(Ruangan::class); //kalo gini ga perlu pake use App lagi
  }

  public function user()
  {
    return $this->belongsTo(User::class); //kalo gini ga perlu pake use App lagi
  }
}
