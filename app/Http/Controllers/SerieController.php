<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index()
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, SeriesRepository $repository)
    {
        $serie = $repository->add($request);
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' adicionada com sucesso");
        return redirect('/series');
    }

    public function edit($id)
    {
        $serie = Series::find($id);
        return view('series.edit')->with('series', $serie);
    }

    public function update(Request $request, $id)
    {
        $serie = Series::find($id);
        $serie->name = $request->input('nome');
        $serie->update();
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' editada com sucesso");
        return redirect('/series');
    }

    public function destroy($id, Request $request)
    {
        $serie = Series::find($id);
        $serie->delete();
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' removida com sucesso");
    }
}
