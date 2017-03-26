<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Produto;
use Shoppvel\Models\Categoria;
use Shoppvel\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProdutoController extends Controller {


    function getProdutoDetalhes($id) {
        $models['produto'] = Produto::find($id);
        return view('frente.produto-detalhes', $models);
    }

    function avaliar(Request $request, Produto $produto, $id) {
        if ($request['avaliacao_total'] != null) {
            $produto = Produto::find($id);
            $request['avaliacao_total'] = $request['avaliacao_total'] + $produto->avaliacao_total;
            $request['avaliacao_qtde'] = $produto->avaliacao_qtde + 1;
            $produto->update($request->all());
            return redirect()
                ->route('produto.detalhes', $id);
        }else{
            return \Redirect::back()
            ->withErrors('Selecione uma nota para avaliar.');
        }
    }

    function getBuscar(Request $request) {
        $this->validate($request, [
            'termo-pesquisa' => 'required|filled'
                ]
        );

        $termo = $request->get('termo-pesquisa');

        $produtos = Produto::where('nome', 'LIKE', '%' . $termo . '%')
                ->paginate(10);
        //$produtos->setPath('buscar/'.$termo);

        foreach ($produtos as $prod) {
            if($prod->qtde_estoque > 0){
                $prod->qtde_estoque = "Produto Disponível";
            }
            else{
                $prod->qtde_estoque = "Produto Indisponível";
            }
        }

        $models['produtos'] = $produtos;
        $models['termo'] = $termo;
        return view('frente.resultado-busca', $models);
    }

    function novo(){
        $data['categoria'] = Categoria::all(['nome','id'])->lists('nome','id');
        $data['marca'] = Marca::all(['nome','id'])->lists('nome','id');      
        return view('produtos.produto-novo', $data);
    }

    function salvar(Request $request, Produto $produto){

        $p = '';
        if ($request->has('id')){
            $p = ','.$request->get('id');
        }

        $this->validate($request, [
            'nome' => 'required|min:3|unique:produtos,nome'.$p.'',
        ]);

        if ($request->has('id')) {
            $produto = $produto->find($request->get('id'));
            
            if ($produto != null) {
                $produto->update($request->all());
                return redirect()
                    ->route('produto.listaradmin');
            }
        }

        //$request['imagem_nome'] = $this->setImagemFile($request['imagem']);
        $request['imagem_nome'] = ImagemController::setImagemFile($request['imagem']);
        $produto->create($request->all());
        return redirect()
            ->route('produto.listaradmin');
    }

    function listaradmin(){
        $data['produtos'] = Produto::all();
        return view('produtos.listar-produtos-admin', $data);
    }

    function alterar(Produto $produto, $id){
        $data['categorias'] = Categoria::all();
        $data['marcas'] = Marca::all();
        $data['produto'] = Produto::find($id);
        return view('produtos.alterar-produtos', $data);
    }

    function confirmar_exclusao(Produto $produto, $id){
        $data['produto'] = Produto::find($id);
        return view('produtos.confirmar-exclusao', $data);
    }

    function excluir(Produto $produto, $id){
        $produto = $produto->find($id);
        if ($produto != null) {
            $produto->destroy($produto->id);
            return redirect()
                ->route('produto.listaradmin');
        } else {
            return redirect()
                ->route('produto.listaradmin');
        }
    }
}
