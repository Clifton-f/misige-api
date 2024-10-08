<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudante extends Model
{
    use HasFactory;
    protected $table = 'estudantes';
    protected $fillabel =  [
        'cuso_id',
        'data_entrada',
        'data_saida',
        'numeroEstudante'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
        
    }
    public function curso():BelongsTo{
        return $this->belongsTo(Curso::class);
    }
}
