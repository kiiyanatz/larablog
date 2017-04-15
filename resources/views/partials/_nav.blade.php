<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#blogs">LaraBlog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active": "" }}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('about') ? "active": "" }}"><a href="/about">About</a></li>
                <li class="{{ Request::is('contact') ? "active": "" }}"><a href="/contact">Contact</a></li>
            </ul>

            @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/posts">Posts</a></li>
                        <li><a href="#">Profile settings</a></li>
                        <li role="separator" class="divider"></li>
                        <li>
                           {{--  <form class="form-horizontal" role="form" method="POST" action="{{ route('logout') }}">
                                {{ csrf_field() }}
                                <button type="text" type="submit">logout</button>
                            </form> --}}
                            <a href="{{ route('logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>