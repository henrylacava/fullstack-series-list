<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie =  new Serie();
        $serie->name = $request->input('nome');
        $serie->save();
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
        return redirect('/series')->with('status',"Editado com sucesso");
    }

    public function destroy($id)
    {
        $serie = Serie::find($id);
        $serie->delete();
        return redirect('/series');
    }
}
