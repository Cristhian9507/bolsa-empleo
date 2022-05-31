<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertLaboral extends Model
{
  use HasFactory;
   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nombre', 'activo',
  ];

  public function users() {
    return $this->belongsToMany('App\Models\User', 'ofertas_users', 'oferta_laboral_id', 'user_id')->withTimestamps();
  }
}
