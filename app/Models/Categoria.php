<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {
    protected $fillable = array('nome','categoria_id');


    public function produtos() {
        return $this->hasMany(Produto::class);
    }

    public function childs()
	{
		return $this->hasMany(Categoria::class, 'categoria_id');
	}



}
