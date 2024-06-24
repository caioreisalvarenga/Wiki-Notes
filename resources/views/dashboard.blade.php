<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-5 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-xs border mb-4 pb-3">
                        @if (count($notes) > 0)
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0 font-weight-semibold text-lg">Aqui estão suas anotações!</h6>
                            <p class="text-sm mb-1">Aqui você encontrará as anotações mais recentes.</p>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                @foreach ($notes as $note)
                                <div class="col-xl-4 col-md-6 mb-4">
                                    <div class="card card-background border-radius-xl card-background-after-none align-items-start mb-4">
                                        <div class="full-background bg-cover" style="background-image: url('{{ $note->imagem }}')"></div>
                                        <span class="mask bg-dark opacity-1 border-radius-sm"></span>

                                        <div class="card-body text-start p-3 w-100">
                                            <div class="blur shadow d-flex align-items-center w-100 border-radius-md border border-white mt-8 p-3">
                                                <div class="w-50">
                                                    <p class="text-dark text-sm font-weight-bold mb-1">
                                                        {{ strlen($note->autor) > 10 ? substr($note->autor, 0, 10).'...' : $note->autor }}
                                                    </p>
                                                    <p class="text-xs text-secondary mb-0">{{ $note->data }}</p>
                                                </div>
                                                <p class="text-dark text-sm font-weight-bold ms-auto">{{ $note->categoria }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-dark btn-icon px-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                        </button>
                                        <button type="button" class="btn btn-dark btn-icon px-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <a href="javascript:;">
                                        <h4 class="font-weight-semibold">
                                            {{ strlen($note->nome) > 15 ? substr($note->nome, 0, 15).'...' : $note->nome }}
                                        </h4>
                                    </a>
                                    <p class="mb-4">
                                        {{ strlen($note->descricao) > 100 ? substr($note->descricao, 0, 100).'...' : $note->descricao }}
                                    </p>
                                    <a href="{{ route('update-note') }}" class="text-dark font-weight-semibold icon-move-right mt-auto w-100 mb-5">
                                        Ler anotação
                                        <i class="fas fa-arrow-right-long text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-md-flex align-items-center mb-3 mx-2">
                                        <div class="mb-md-0 mb-3">
                                            <h4 class="mb-0">Adicione uma nova anotação!</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <x-app.footer />
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>