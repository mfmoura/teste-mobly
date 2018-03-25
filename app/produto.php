<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class produto extends Model
{

    protected $fillable = ['nome','descricao','imagem', 'preco'];

    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $table = 'produtos';

}
