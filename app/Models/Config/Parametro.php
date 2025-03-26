<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parametro extends Model
{
    use HasFactory, Notifiable;
    protected $remember_token = false;
    protected $table = 'parametros';
    protected $guarded = [];
}
