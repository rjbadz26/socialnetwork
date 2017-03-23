<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header col-md-3">
      <a class="navbar-brand" href="{{ url('/home') }}">Social Network</a>
    </div>
    
    @if(Auth::check())
      <form id="search" class="form-inline col-md-6" action="{{ url('/search') }}">
        <div class="form-group">
          <input id="search_val" class="form-control" type="text" name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary pull-right" >Search</button>
      </form>
    @endif

    @if(Auth::check())
      <div class="dropdown col-md-2 col-md-offset-1" style="margin-top: 7px;">
      <button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
      <span class="caret"></span></button>
      <ul class="dropdown-menu" style="margin-left: 15px;">
        <li><a href="{{ url('/logout') }}">Logout</a></li>
      </ul>
    </div>
    @else
      <ul class="nav navbar-nav col-md-1 col-md-offset-2 pull-right">
      <li><a href="{{ url('/register') }}">Register</a></li>
      </ul>
    @endif
    
  </div>
</nav>