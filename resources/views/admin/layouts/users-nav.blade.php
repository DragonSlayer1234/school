<ul class="nav nav-pills nav-fill custom-tabs">
  <li class="nav-item">
    <a class="nav-link {{ $active === 'student' ? 'active' : '' }}" href="{{ route('admin.student.index') }}">Учащиеся</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active === 'teacher' ? 'active' : '' }}" href="{{ route('admin.teacher.index') }}">Учителя</a>
  </li>
</ul>
