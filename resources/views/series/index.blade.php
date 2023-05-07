<x-layout title="Séries">

    @if($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endif
    
<table class="table table-striped table-bordered ">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($series as $serie)
                <tr>
                    <td>
                        <a class="text-decoration-none text-reset" href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>
                    </td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('serie.edit', $serie->id) }}" class="btn btn-success btn-sm me-3">Editar</a>
                        <form action="{{ route('serie.destroy', $serie->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Remover
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
    </tbody>
</table>

<a href="{{ route('serie.create') }}" class="btn btn-dark">Nova Série</a>
</x-layout>
