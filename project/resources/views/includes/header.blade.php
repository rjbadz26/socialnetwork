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
      <ul class="nav navbar-nav col-md-1 col-md-offset-2 pull-right">
      <li><a href="{{ url('/logout') }}">Logout</a></li>
      </ul>
    @else
      <ul class="nav navbar-nav col-md-1 col-md-offset-2 pull-right">
      <li><a href="{{ url('/register') }}">Register</a></li>
      </ul>
    @endif
    
  </div>
</nav>