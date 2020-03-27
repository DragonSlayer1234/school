
        <li class="nav-item">
            <a class="nav-link" href="{{ route('teacher.profile.edit') }}">
                <i class="fas fa-user-circle"></i> Профиль
            </a>
        </li>

        <li>
            <a class="nav-link" href="{{ route('teacher.olympiad.index') }}">
                <span class="mr-1"><i class="fas fa-trophy"></i></span> История олимпиад
            </a>
        </li>

        <li>

        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::guard('teacher')->user()->username }} <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{route('teacher.profile.change-password')}}">Пароль</a>

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
