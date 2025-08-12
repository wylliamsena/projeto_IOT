<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'status'
    ];

    public function sensores(){
        return $this->hasMany(Sensor::class);
    }
    use HasFactory;
}
