<form action="/logout" method="post" id="logout-form">
    {{ csrf_field() }}
</form>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if(auth()->user()['role'] == 'admin')
                    <li><a href="/admin">Admin Panel</a></li>
                @endif
                @if(auth()->check())
                    <li class="pull-right">
                            <a href="#" id="logout">Log Out</a>
                    </li>
                @else
                    <li><a href="/login">Log In</a></li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>