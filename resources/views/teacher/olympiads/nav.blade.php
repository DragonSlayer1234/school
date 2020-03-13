<ul class="nav nav-pills nav-fill custom-tabs mt-4">
    <li class="nav-item">
        <a class="nav-link {{ $type === 'moderating' ? 'active' : '' }}" href="{{ route('teacher.olympiad.index') }}">На модерации</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $type === 'upcoming' ? 'active' : '' }}" href="{{ route('teacher.olympiad.upcoming') }}">Предстоящие</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $type === 'rejected' ? 'active' : '' }}" href="{{ route('teacher.olympiad.rejected') }}">Отклоненные</a>
    </li>
</ul>
