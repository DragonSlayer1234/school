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
</div>
