<div class="list-group list-group-flush">
    <a
        href="{{ route('student.profile.edit') }}"
        class="list-group-item {{ $active === 'profile.edit' ? 'active' : '' }}"
    >
        Редактировать профиль
    </a>
    <a
        href="{{ route('student.profile.password-form') }}"
        class="list-group-item {{ $active === 'profile.password' ? 'active' : '' }}"
    >
        Сменить пароль
    </a>
</div>
