<nav class="navbar navbar-default">

    <div class="container-fluid">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="#">The Aulab Post</a>

        </div>

        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav">

                <li class="dropdown">

                    @auth
                    <a
                    href="#"
                    class="dropdown-toggle"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                  Benvenuto {{Auth::user()->name}}<span class="caret"></span>
                  </a>
                  
                  <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="">Profilo</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                  
                      <li><a class="drop-down-item" href="#" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();">Logout</a></li>
                      <form method="post" action="{{route('logout')}}" id="form-logout" class="d-none">
                          @csrf
                      </form>
                  </ul>
                  @if(Auth::user()->is_admin)
                  <li><a href="{{route('admin.dashboard')}}">Dashboard Admin</a></li>
                  @endif
                  
                  @if(Auth::user()->is_revisor)
                  <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Dashboard del Revisore</a></li>
                  @endif
                  
                  @if(Auth::user()->is_writer)
                  <li><a class="dropdown-item" href="{{route('writer.dashboard')}}">Dashboard del Redattore</a></li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{route('article.create')}}">Inserisci un articolo</a>
                  </li>

                    @endif

                    @endauth
                    
                    @guest
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        Benvenuto Ospite <span class="caret"></span>

                    </a>

                    <ul class="dropdown-menu">

                        <li><a href="{{route('register')}}">Registrati</a></li>

                        <li><a href="{{route('login')}}">Accedi</a></li>

                    </ul>
                    @endguest
                   
                    
                </li>

            </ul>
            <form class="navbar-form navbar-right" method="GET" action="{{route('article.search')}}">
                <div class="form-group">
                    <input class="form-control" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
                </div>
                <button class="btn btn-outline-info" type="submit">Cerca</button>
            </form>
        </div>

    </div>

</nav>