<x-layout title="Nova Série">
    <form action="/series/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <button type="submit" class="btn btn-dark">Adicionar</button>
    </form>
</x-layout>