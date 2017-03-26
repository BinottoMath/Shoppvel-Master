<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Categoria;

class CategoriaController extends Controller {

    function getCategoria($id = null) {
        if ($id == null) {
            $data['categorias_pai'] = Categoria::where('categoria_id', '=', null)->get();
            return view('frente.categorias', $data);
        }
        
        // se um id foi passado
        $models['categoria'] = \Shoppvel\Models\Categoria::find($id);
        return view('frente.produtos-categoria', $models);
    }

    function nova(){
    	$data['categoriasPai'] = Categoria::all(['nome','id'])->lists('nome','id');
        //dd($data);    	
    	return view('categorias.categoria-nova', $data);
    }
    function listar_admin(){
        $data['categorias'] = Categoria::all();
        return view('categorias.listar-categorias-admin', $data);
    }


    function salvar(Request $request, Categoria $categoria){
        $c = '';

        if ($request->has('id')){
            $c = ','.$request->get('id');
        }

        $this->validate($request, [
            'nome' => 'required|min:3|unique:categorias,nome'.$c.'',
            //'id' => 'required'
        ]);

        if ($request->has('id')) {
            $categoria = $categoria->find($request->get('id'));
            
            if ($categoria != null) {
                $categoria->update($request->all());
                return redirect()
                    ->route('categoria.listaradmin');
            }
        }    

    	$categoria->create($request->all());
         return redirect()
            ->route('categoria.listaradmin');
    }

    function listar(){
        $data['categorias_pai'] = Categoria::where('categoria_id', '=', null)->get();
        return view('frente.categorias', $data);
    }

    function alterar(Categoria $categoria, $id){
        $data['categoriasPai'] = Categoria::all(['nome','id']);
        $data['categoria'] = Categoria::find($id);
        return view('categorias.alterar-categorias', $data);
    }

    function confirmar_exclusao(Categoria $categoria, $id){
        if($id != -1){
            $data['categoria'] = Categoria::find($id);
            return view('categorias.confirmar-exclusao', $data); 
        }

        return \Redirect::back()
            ->withErrors('Não é possível excluir esta categoria, pois ela está associada à um produto.');

        
    }

    function excluir(Request $request, Categoria $categoria, $id){
        $categoria = $categoria->find($id);
        if ($categoria != null) {
            $categoria->destroy($categoria->id);
            return redirect()
                    ->route('categoria.listaradmin');
        } else {
            return redirect()
                    ->route('categoria.listaradmin');
        }
    }       

}
