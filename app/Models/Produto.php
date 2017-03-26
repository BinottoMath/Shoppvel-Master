<?php

namespace Shoppvel\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {

	protected $fillable = array('nome','descricao','avaliacao_qtde','avaliacao_total','qtde_estoque', 'preco_venda','imagem_nome','categoria_id','marca_id','desctacado');


    public function marca() {
        return $this->belongsTo(Marca::class);
    }
    
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
    
    public function scopeDestacado($query) {
        return $query->where('destacado', TRUE);
    }

    function novo(){
    	$data['categoria'] = Categoria::all(['nome','id'])->lists('nome','id');
    	$data['marca'] = Marca::all(['nome','id'])->lists('nome','id');    	
    	return view('novo-produto', $data);
    }

    function salvar(Request $request, Produto $produto){
    	$produto->create($request->all());
    }
}
