<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Papel extends Model
{
    protected $fillable = [
        'nome',
        'descricao'
    ];
    protected $table = 'papeis';
    
    use HasFactory;

    public function user():HasMany{
        return $this->hasMany(User::class);
    }
    public function  permissao():BelongsToMany{
        return $this->belongsToMany(Permissao::class,'papel_permissao','papel_id','permissao_id');
    }
}
