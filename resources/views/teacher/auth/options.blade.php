    <li class="nav-item dropdown">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('teacher.profile.edit') }}">
                <i class="fas fa-user-circle"></i> Кабинет
            </a>
        </li>
        
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('teacher')->user()->login }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('teacher.cabinet.index')}}">Cabinet</a>

            <a class="dropdown-item" href="{{ route('teacher.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
