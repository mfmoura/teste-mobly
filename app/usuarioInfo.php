<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class usuarioInfo extends Model
{
    protected $fillable = ['user','endereco', 'bairro', 'cidade', 'estado', 'telefone1', 'telefone2', 'cep', 'cpf', 'rg'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'usuario_info';
}
