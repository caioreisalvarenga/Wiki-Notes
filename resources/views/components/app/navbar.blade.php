<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bold mb-0">
                Olá, {{ auth()->user()->name }}
            </h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="mb-0 font-weight-bold breadcrumb-text text-white ms-md-auto pe-md-3 d-flex align-items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="login" onclick="event.preventDefault(); this.closest('form').submit();">
                        <button class="btn btn-sm btn-white mb-0 me-1" type="submit">Sair</button>
                    </a>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->
