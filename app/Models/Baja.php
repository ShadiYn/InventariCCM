<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    use HasFactory;
    protected $fillable=[
        'fecha_baja','motivo','baja_certificado','personal_id'
    ];

    public function personal(){
        return $this->belongsTo(Personal::class);
    }


}
