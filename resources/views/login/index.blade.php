<x-layout title="">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-4">
            <form method="post" class="p-4 border rounded-3 bg-lite">
                @csrf
                <h1 class="text-center">Login</h1>

                <div class="form-group mt-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group mt-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <button class="w-100 btn btn-primary mt-2">Entrar</button>
                    <a href="{{ route('users.create') }}" class="w-50 btn btn-secondary mt-2">Criar nova conta</a>
                </div>
            </form>

        </div>
    </div>
</x-layout>
