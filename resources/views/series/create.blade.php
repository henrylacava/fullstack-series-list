<x-layout title="Nova Série">
    <form action="{{ route('serie.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input autofocus type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="seasons" class="form-label">Temporadas</label>
                <input autofocus type="text" id="seasons" name="seasons" class="form-control" value="{{ old('seasons') }}">
            </div>

            <div class="col-2">
                <label for="episodes" class="form-label">Eps / Temporada</label>
                <input autofocus type="text" id="episodes" name="episodes" class="form-control" value="{{ old('episodes') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>
