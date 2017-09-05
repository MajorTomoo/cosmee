<style>
.navbar{background-color:#343A40 !important;}
.nav-link{color:white !important;font-size:13px;}
.navbar-brand{color:white !important;}
</style>

<header>

 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Cosmee</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  @if(Auth::check())
 <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link">Welcome! <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link">{{@Auth::getuser()['email']}}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Log out</a>
      </li>
    </ul>
  </div>



@else
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link">Welcome! <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Join</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/signin">Sign In</a>
      </li>
    </ul>
  </div>
@endif 
</nav> 
</header>