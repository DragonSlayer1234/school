<li class="float-right">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::guard('teacher')->user()->username }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('teacher.profile.edit') }}">
            Профиль
        </a>

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

<li class="float-right">
    <a class="nav-link" href="{{ route('teacher.olympiad.index') }}">
        Мои Олимпиады
    </a>
</li>
