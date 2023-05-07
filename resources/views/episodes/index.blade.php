<x-layout title="Episódios da temporada {!! $season->number !!}">

    @if($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endif

    <form method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}

                    <input type="checkbox"
                           name="episodes[]"
                           value="{{ $episode->id }}"
                           @if ($episode->watched) checked @endif>
                </li>
            @endforeach
        </ul>

        <button class="btn btn-primary mt-2">Salvar</button>
        <a href="{{ route('seasons.index', $season->series->id) }}" class="btn btn-danger mt-2">Voltar</a>
    </form>
</x-layout>
