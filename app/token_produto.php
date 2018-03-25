<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class token_produto extends Model
{
    protected $fillable = ['token', 'produto'];

    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $table = 'token_produto';
}
