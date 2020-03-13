<div class="list-group list-group-flush">
    <a
        href="{{ route('teacher.profile.edit') }}"
        class="list-group-item {{ $active === 'profile.edit' ? 'active' : '' }}"
    >
        Редактировать профиль
    </a>
    <a
        href="{{ route('teacher.profile.password-form') }}"
        class="list-group-item {{ $active === 'profile.password' ? 'active' : '' }}"
    >
        Сменить пароль
    </a>
    <a
        href="{{ route('teacher.olympiad.index') }}"
        class="list-group-item {{ $active === 'olympiad.index' ? 'active' : '' }}"
    >
        Олимпиады
    </a>
    <a
        href="{{ route('teacher.olympiad.index') }}"
        class="list-group-item {{ $active === 'olympiad.index' ? 'active' : '' }}"
    >
        Активные олимпиады
    </a>
</div>
