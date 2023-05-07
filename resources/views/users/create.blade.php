<x-layout title="">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-4">
            <form method="post" class="p-4 border rounded-3 bg-lite">
                @csrf

                <h1 class="text-center">Cadastre-se</h1>

                <div class="form-group mt-3">
                    <input type="name" name="name" id="name" class="form-control" placeholder="Nome">
                </div>

                <div class="form-group mt-3">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group mt-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Senha">
                </div>

                <div class="form-group mt-3">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repita a senha">
                </div>

                <button class="w-100 btn btn-primary mt-2">Criar conta</button>


            </form>

        </div>
    </div>
</x-layout>
