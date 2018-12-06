<?php
namespace App\Http\Controllers;
use App\Produtos;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //checa se o usuário está cadastrado
        if( Auth::check() ){   
            //retorna somente as Produtos cadastrados pelo usuário cadastrado
            $listarProdutos = Produtos::where('user_id', Auth::id() )->get();     
        }else{
            //retorna todos os Produtos
            $listarProdutos = Produtos::all();
        }
                
        $listarProdutos = Produtos::paginate(10);


        return view('produtos.list',['produtos' => $listarProdutos]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'client.required' => 'É obrigatório o cadastro de um cliente',
            'product.required' => 'É obrigatória o cadastro de um produto',
            'price.required' => 'É obrigatório o cadastro do preço do produto',
        );
        //vetor com as especificações de validações
        $regras = array(
            'client' => 'required|string',
            'product' => 'required',
            'price' => 'required',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('produtos/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Produtos = new Produtos();
        $obj_Produtos->client =       $request['client'];
        $obj_Produtos->product = $request['product'];
        $obj_Produtos->price = $request['price'];
        $obj_Produtos->scheduledto = $request['scheduledto'];
        $obj_Produtos->user_id = Auth::id();
        $obj_Produtos->save();
        return redirect('/produtos')->with('success', 'Nota Fiscal criada com sucesso!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produtos = Produtos::find($id);
        return view('produtos.show',['produtos' => $produtos]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busco os dados do obj notas que o usuário deseja editar
        $obj_Produtos = Produtos::find($id);
        
        //verifico se o usuário logado é o da Nota fiscal
        if( Auth::id() == $obj_Produtos->user_id ){
            //retorno a tela para edição
            return view('produtos.edit',['produtos' => $obj_Produtos]);    
        }else{
            //retorno para a rota /notas com o erro
            return redirect('/produtos')->withErrors("Você não tem permissão para editar a Nota Fiscal");
        }
           
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'client.required' => 'É obrigatório o cadastro de um cliente',
            'product.required' => 'É obrigatória o cadastro de um produto',
            'price.required' => 'É obrigatório o cadastro do preço do produto',
        );
        //vetor com as especificações de validações
        $regras = array(
            'client' => 'required|string',
            'product' => 'required',
            'price' => 'required',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('produtos/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_produtos = Produtos::findOrFail($id);
        $obj_produtos->client = $request['client'];
        $obj_produtos->product = $request['product'];
        $obj_produtos->price = $request['price'];
        $obj_produtos->scheduledto = $request['scheduledto'];
        $obj_produtos->user_id     = Auth::id();
        $obj_produtos->save();
        return redirect('/produtos')->with('success', 'Nota Fiscal alterada com sucesso!!');
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Produtos = Produtos::find($id);
        
        //verifico se o usuário logado é o dono da nota
        if( Auth::id() == $obj_Produtos->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('produtos.delete',['produtos' => $obj_Produtos]);    
        }else{
            //retorno para a rota /notas com o erro
            return redirect('/produtos')->withErrors("Você não tem permissão para deletar a Nota Fiscal");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_produtos = Produtos::findOrFail($id);
        $obj_produtos->delete($id);
        return redirect('/produtos')->with('sucess','Nota Fiscal excluída com Sucesso!!');
    }
}