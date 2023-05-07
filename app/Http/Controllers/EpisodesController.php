<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController extends Controller
{
    public function index(Season $season, Series $series)
    {
        $episodes = $season->episodes;
        $mensagemSucesso = session('mensagem.sucesso');
        return view('episodes.index')->with('episodes', $episodes)->with('season', $season)->with('series', $series)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function watch(Request $request, Season $season)
    {

        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes){
            $episode->watched = in_array($episode->id, $watchedEpisodes);
            });
            $season->push();

        $request->session()->flash('mensagem.sucesso', "Episódios salvos com sucesso");
        return to_route('episodes.index', $season->id);
    }
}
