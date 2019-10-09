<nav class="navbar navbar-expand-md navbar-dark bg-dark  border-bottom box-shadow">
            <a class="navbar-brand" href="#"><img width="58px" alt="" src="{{ asset('img/logo.png') }}" class="img-responsive" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
             <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> ড্যাশবোর্ড  
                            <span class="sr-only">(current)</span></a>
                    </li>
                   
                </ul>  
                <div class="dropdown dropdown-pull-right btn-group btn-sm">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        My Account
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#"><i class="fa fa-user fa-fw"></i> পাসওয়ার্ড পরিবর্তন</a>
                        <a class="dropdown-item" href="{{ route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sign Out</a>
                    </div>
                </div>
            </div> 
        </nav>
