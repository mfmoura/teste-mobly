<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class pedido extends Model
{

    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $fillable = ['nome'];
    	
}
