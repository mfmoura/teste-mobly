<?php

namespace Mobly;

use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{

    protected $fillable = ['nome'];

    protected $guarded = ['id', 'created_at', 'update_at'];
    
    protected $table = 'categorias';

}
