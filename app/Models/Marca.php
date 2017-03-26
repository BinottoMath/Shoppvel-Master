<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
	protected $fillable = array('nome');


    public function produtos() {
        return $this->hasMany(Produto::class);
    }
}
