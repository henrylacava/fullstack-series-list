<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = session('mensagem.sucesso');
        return view('series.index')->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Series::create($request->all());
        $seasons = [];
        for ($i = 1; $i <= $request->seasons; $i++){
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach ($serie->seasons as $season){
            for ($j = 1; $j <= $request->episodes; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' adicionada com sucesso");
        return redirect('/series');
    }

    public function edit($id)
    {
        $serie = Series::find($id);
        return view('series.edit')->with('serie', $serie);
    }

    public function update(Request $request, $id)
    {
        $serie = Series::find($id);
        $serie->name = $request->input('nome');
        $serie->update();
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' editada com sucesso");
        return redirect('/series')->with('status',"Editado com sucesso");
    }

    public function destroy($id, Request $request)
    {
        $serie = Series::find($id);
        $serie->delete();
        $request->session()->flash('mensagem.sucesso', "Serie '{$serie->name}' removida com sucesso");

        return redirect('/series');
    }
}
