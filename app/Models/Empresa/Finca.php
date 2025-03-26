<?php

namespace App\Models\Empresa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Finca extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'fincas';
    protected $guarded = [];
}
