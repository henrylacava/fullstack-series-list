<x-layout title="Séries">
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($series as $serie)
            <tr>
                <td>{{ $serie->name }}</td>
                <td>
                    <a href="{{ url('/series/edit/'.$serie->id) }}" class="btn btn-success">Editar</a>
                    <a href="{{ url('/series/delete/'.$serie->id) }}" class="btn btn-danger">Remover</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/series/create" class="btn btn-dark mt-2">Nova Série</a>
</x-layout>
