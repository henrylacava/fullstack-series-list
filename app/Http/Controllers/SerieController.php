<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = new Serie();
        $serie->name = $request->input('nome');
        $serie->save();
        $request->session()->flash('mensagem.sucesso', "Serie adicionada com sucesso");
        return redirect('/series');
    }

    public function edit($id)
    {
        $serie = Serie::find($id);
        return view('series.edit')->with('serie', $serie);
    }

    public function update(Request $request, $id)
    {
        $serie = Serie::find($id);
        $serie->name = $request->input('nome');
        $serie->update();
        $request->session()->flash('mensagem.sucesso', "Serie editada com sucesso");
        return redirect('/series')->with('status',"Editado com sucesso");
    }

    public function destroy($id, Request $request)
    {
        $serie = Serie::find($id);
        $serie->delete();
        $request->session()->flash('mensagem.sucesso', "Serie removida com sucesso");

        return redirect('/series');
    }
}
