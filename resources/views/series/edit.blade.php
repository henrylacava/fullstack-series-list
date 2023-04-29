<x-layout title="Edit">
    <form action="{{ route('serie.update', $serie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Novo nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $serie->name }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Editar</button>
    </form>
</x-layout>
