<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">{{config('app.name')}}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="/">Home</a>
      @Auth
        <a class="p-2 text-dark" href="/dashboard">Dashboard</a>
      @endAuth
    </nav>
    <div class="text-right">
      <div class="btn-group">
        @guest
          <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
          <a class="btn btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
        @else
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret">
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('volunteers.index') }}">
                        {{ __('Volunteer Index') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('opportunities.index') }}">
                      {{ __('Opportunity Index') }}
                  </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
          </ul>
        @endguest
      </div>
    </div>
</div>