
<header class="navigation">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light px-0">
        <a class="navbar-brand order-1 py-0" href="{{route('index')}}">
            <img src="{{asset('image/adamjee_final.png')}}" alt="" srcset="">
        </a>
        <div class="navbar-actions order-3 ml-0 ml-md-4">
          <button aria-label="navbar toggler" class="navbar-toggler border-0" type="button" data-toggle="collapse"
            data-target="#navigation"> <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse text-center order-lg-2 order-4" id="navigation">
          <ul class="navbar-nav mx-auto mt-3 mt-lg-0">
            <li class="nav-item"> <a class="nav-link" href="{{route('login')}}">Login</a>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Others 
              </a>
              <div class="dropdown-menu"> 
                <a class="dropdown-item" href="{{route('notice_all')}}">All Notice</a>
                <a class="dropdown-item" href="{{route('speech_all')}}">Speech</a>
              </div>
            </li>
            <li class="nav-item"> <a class="nav-link" href="{{route('contact_us')}}">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </header>