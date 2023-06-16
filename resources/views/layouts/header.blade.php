<nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top affix" data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" href="/"><strong class="text-primary">MONITORING</strong><span class="text-light"> INVOICE</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/input">Input</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#exportModal">Export</a>
                </li>
                <li class="nav-item">
                    <form id="logout" action="/logout" method="POST">
                        @csrf
                        <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout').submit();">Logout</a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
