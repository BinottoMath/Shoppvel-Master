<?php
namespace Shoppvel\Http\Controllers;
use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Marca;
class MarcaController extends Controller {
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
        //dd($data);    	
    	return view('marcas.marca-nova');
    }
    function listar_admin(){
        $data['marcas'] = \Shoppvel\Models\Marca::all();
        return view('marcas.listar-marcas-admin', $data);
    }
    function salvar(Request $request, Marca $marca){
        $m = '';
        if ($request->has('id')){
            $m = ','.$request->get('id');
        }
        $this->validate($request, [
            'nome' => 'required|min:3|unique:marcas,nome'.$m.'',
            //'id' => 'required'
        ]);
        if ($request->has('id')) {
            $marca = $marca->find($request->get('id'));
            
            if ($marca != null) {
                $marca->update($request->all());
                return redirect()
                    ->route('marca.listaradmin');
            }
        }    
    	$marca->create($request->all());
         return redirect()
            ->route('marca.listaradmin');
    }
    function listar(){
        $data['categorias_pai'] = Categoria::where('categoria_id', '=', null)->get();
        return view('frente.categorias', $data);
    }
    function alterar(Marca $marca, $id){
        $data['marca'] = Marca::find($id);
        return view('marcas.alterar-marcas', $data);
    }
    function confirmar_exclusao(Marca $marca, $id){
        if($id != -1){
            $data['marca'] = Marca::find($id);
            return view('marcas.confirmar-exclusao', $data); 
        }

        return \Redirect::back()
            ->withErrors('Não é possível excluir esta marca, pois ela está associada à um produto.');
    }
    function excluir(Request $request, Marca $marca, $id){
        $marca = $marca->find($id);
        if ($marca != null) {
            $marca->destroy($marca->id);
           return redirect()
                    ->route('marca.listaradmin');
        } else {
            return redirect()
                    ->route('marca.listaradmin');
        }
    }
}