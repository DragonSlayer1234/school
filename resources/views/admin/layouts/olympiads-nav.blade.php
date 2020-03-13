<ul class="nav nav-pills nav-fill custom-tabs">
  <li class="nav-item">
    <a class="nav-link {{ $active === 'student' ? 'active' : '' }}" href="{{ route('admin.student.index') }}">На модерации</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Предстоящие</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Активные</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Отмененные</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Прошедшие</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">На проверке</a>
  </li>
</ul>
