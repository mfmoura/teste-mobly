<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class token extends Model
{

    protected $fillable = ['nome', 'token', 'pedido'];

    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $table = 'tokens';
}
