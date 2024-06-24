<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card card-background card-background-after-none align-items-start mt-4 mb-5">
                        <div class="full-background" style="background-image: url('../assets/img/header-blue-purple.jpg')"></div>
                        <div class="card-body text-start p-4 w-100">
                            <h3 class="text-white mb-2">Edite sua anotação 🔥</h3>
                            <p class="mb-4 font-weight-semibold">
                                Faça uma edição da sua anotação.
                            </p>
                            <img src="../assets/img/3d-cube.png" alt="3d-cube" class="position-absolute top-0 end-1 w-25 max-width-200 mt-n6 d-sm-block d-none" />
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                <form action="{{  route('update-note/{id}') }}" method="POST" enctype="multipart/form-data">
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
                                <div class="card" id="basic-info">
                                    <div class="card-header">
                                        <h5>Edite uma anotação</h5>
                                    </div>
                                    <div class="pt-0 card-body">
                                        <div class="row pt-3">
                                            <div class="col-12">
                                                <label for="nome">Nome</label>
                                                <input type="text" name="nome" id="nome" value="{{ old('nome', $note->nome) }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row pt-2">
                                            <div class="col-6 pt-2">
                                                <label for="data">Data</label>
                                                <input type="date" name="data" id="data" value="{{ old('data', $note->data) }}" class="form-control">
                                            </div>

                                            <div class="col-6 pt-2">
                                                <label for="imagem">Imagem</label>
                                                <input type="file" name="imagem" id="imagem" class="form-control">
                                                @if($note->imagem)
                                                <img src="{{ asset('storage/' . $note->imagem) }}" alt="Imagem da nota" class="img-fluid mt-2">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row pt-4">
                                            <label for="descricao">Descrição</label>
                                            <textarea name="descricao" id="descricao" rows="5" class="form-control">{{ old('descricao', $note->descricao) }}</textarea>
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