 <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper">
          <a class="logo" href="{{ url('/') }}">
            <img src="{{ asset('public/frontend/img/abali.png') }}" class="logo-img" alt="" />
          </a>
        </div>
        <!-- Button -->
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbar"
          aria-controls="navbar"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"><i class="ti-menu"></i></span>
        </button>
        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/properties') }}">Properties</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
            </li>
          </ul>
        </div>
       
        <ul class="buy-button  list-none mb-0 collapse navbar-collapse justify-content-end p-0" id="navbar">
            @auth
          <li class="inline mb-0">
            <a
              class="btn btn-icon bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"
              href="{{url('profile')}}"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="h-4 w-4 stroke-[3]"
              >
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </a>
          </li>
          
            <li class="sm:inline ps-2 mb-0 hidden">
            <a
              class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"
              href="{{ url('/sign_out') }}"
              >Logout</a
            >
          </li>
          @else
          <li class="sm:inline ps-2 mb-0 hidden">
            <a
              class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"
              href="{{ url('/sign_up') }}"
              >Signup</a
            >
          </li>
           <li class="sm:inline ps-2 mb-0 hidden">
            <a
              class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"
              href="{{ url('/login') }}"
              >Login</a
            >
          </li>
          @endif

          @if( auth()->check() && auth()->user()->user_type == '1')
          <li class="sm:inline ps-2 mb-0 hidden">
            <a
              class="btn bg-green-600 hover:bg-green-700 border-green-600 dark:border-green-600 text-white rounded-full"
              href="{{ url('/add_properties') }}"
              >Add Property <i class="ti-home ms-2"></i></a
            >
          </li>
          @endif
        </ul>
      </div>