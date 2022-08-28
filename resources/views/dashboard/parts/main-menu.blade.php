<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">


  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse mx-auto" id="mainMenu">
    <div class="navbar-nav">
        
      <a class="nav-item nav-link active" href="{{ route('dashboard.dashboard.index') }}">
        <i class="fas fa-th-large"></i>
        {{ trans('file.info_dashboard') }}
      </a>
      <a class="nav-item nav-link" href="{{ route('dashboard.projects.index') }}">
        <i class="fas fa-folder-open"></i>
        {{ trans('file.projects') }}
      </a>





      @if (Auth::user() && Auth::user()->isStaff())

        <a class="nav-item nav-link" href="{{ route('admin.admin.index') }}">
          {{trans('lang.admin_panel')}}
        </a>
      @endif


    </div>
  </div>
  </div>
</nav>

<div id="wrapper" class="" >
  <div class="container">
