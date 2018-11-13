<?php
namespace App\Http\Controllers;
use App\Notas;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class NotasController extends Controller
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
            //retorna somente as Notas cadastradas pelo usuário cadastrado
            $listaNotas = Notas::where('user_id', Auth::id() )->get();     
        }else{
            //retorna todas as notas
            $listaNotas = Notas::all();

        }
                
        $listaNotas = Notas::paginate(1);
        return view('notas.list',['notas' => $listaNotas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notas.create');
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
            'title.required' => 'É obrigatório um título para a atividade',
            'description.required' => 'É obrigatória uma descrição para a atividade',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da atividade',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
            'scheduledto' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('notas/create')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Notas = new Notas();
        $obj_Notas->title =       $request['title'];
        $obj_Notas->description = $request['description'];
        $obj_Notas->scheduledto = $request['scheduledto'];
        $obj_Notas->user_id     = Auth::id();
        $obj_Notas->save();
        return redirect('/notas')->with('success', 'Nota criada com sucesso!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notas = Notas::find($id);
        return view('notas.show',['notas' => $notas]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //busco os dados do obj Atividade que o usuário deseja editar
        $obj_Notas = Notas::find($id);
        
        //verifico se o usuário logado é o dono da Atividade
        if( Auth::id() == $obj_Notas->user_id ){
            //retorno a tela para edição
            return view('notas.edit',['notas' => $obj_Notas]);    
        }else{
            //retorno para a rota /atividades com o erro
            return redirect('/notas')->withErrors("Você não tem permissão para editar este item");
        }
           
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'title.required' => 'É obrigatório um título para a atividade',
            'description.required' => 'É obrigatória uma descrição para a atividade',
            'scheduledto.required' => 'É obrigatório o cadastro da data/hora da atividade',
        );
        //vetor com as especificações de validações
        $regras = array(
            'title' => 'required|string|max:255',
            'description' => 'required',
            'scheduledto' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('notas/$id/edit')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_notas = Notas::findOrFail($id);
        $obj_notas->title =       $request['title'];
        $obj_notas->description = $request['description'];
        $obj_notas->scheduledto = $request['scheduledto'];
        $obj_notas->user_id     = Auth::id();
        $obj_notas->save();
        return redirect('/notas')->with('success', 'Atividade alterada com sucesso!!');
    }
    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Notas = Notas::find($id);
        
        //verifico se o usuário logado é o dono da Atividade
        if( Auth::id() == $obj_Notas->user_id ){
            //retorno o formulário questionando se ele tem certeza
            return view('notas.delete',['notas' => $obj_Notas]);    
        }else{
            //retorno para a rota /atividades com o erro
            return redirect('/notas')->withErrors("Você não tem permissão para deletar este item");
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notas  $notas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj_notas = Notas::findOrFail($id);
        $obj_notas->delete($id);
        return redirect('/notas')->with('sucess','Atividade excluída com Sucesso!!');
    }
}