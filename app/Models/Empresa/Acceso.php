<?php

namespace App\Models\Empresa;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Acceso extends Model
{
    use HasFactory,Notifiable;
    protected $table = 'accesos';
    protected $guarded = [];

    //==================================================================================
    //----------------------------------------------------------------------------------
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
    //----------------------------------------------------------------------------------
}
