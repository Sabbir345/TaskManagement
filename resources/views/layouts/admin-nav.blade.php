<nav class="navbar navbar-expand-md navbar-dark bg-dark  border-bottom box-shadow">
            <a class="navbar-brand" href="#"><img width="58px" alt="" src="{{ asset('img/logo.png') }}" class="img-responsive" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard" ></i> ড্যাশবোর্ড   
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
               

                <li class="nav-item">
                    <a class="nav-link " href="{{ route('admin.logout') }}"><i class="fa fa-sign-out" ></i>  লগ আউট
                    </a>
                </li>
            </ul>
            <span class="nav-item text-right">
               <span class="nav-link" style="background-color: #5bc0de;">{{ auth()->guard('admin')->user()->name }}</span>
            </span>
            </div>
        </nav>