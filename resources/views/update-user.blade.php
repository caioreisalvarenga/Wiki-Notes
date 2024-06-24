<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                        <div class="full-background" style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                        <div class="card-body text-start p-4 w-100">
                            <h3 class="text-white mb-2">Configurações de Perfil! 🔥</h3>
                            <p class="mb-4 font-weight-semibold">
                                Mude seu usuário ou senha.
                            </p>
                            <img src="../assets/img/3d-cube.png" alt="3d-cube" class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <form action="{{ route('update-user-id', Auth::id()) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-lg-9 col-12">
                                @if (session('error'))
                                <div class="alert alert-danger" role="alert" id="alert">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success" role="alert" id="alert">
                                    {{ session('success') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="mb-5 row justify-content-center">
                            <div class="col-lg-9 col-12">
                                <div class="card " id="basic-info">
                                    <div class="card-header">
                                        <h5>Altere seu usuário ou senha</h5>
                                    </div>
                                    <div class="pt-0 card-body">
                                        <div class="row pt-2">
                                            <div class="col-12 pt-2">
                                                <label for="name">Nome De Usuário</label>
                                                <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-6 pt-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}" class="form-control">
                                            </div>
                                            <div class="col-6 pt-2">
                                                <label for="password">Nova Senha</label>
                                                <input type="password" name="password" id="password" placeholder="Digite uma nova senha" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" class="mt-6 mb-0 btn btn-dark btn-sm float-end">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <x-app.footer />
        </div>
    </main>
</x-app-layout>