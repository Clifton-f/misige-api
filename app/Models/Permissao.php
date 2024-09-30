<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissao extends Model
{

    protected $table = 'permissoes';
    use HasFactory;
    public function papel():BelongsToMany{
        return $this->belongsToMany(Papel::class,'papel_permissao','permissao_id','papel_id');
    }
    

}
