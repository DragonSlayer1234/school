@section('nav')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{ route('admin.student.index') }}">Students</a>
          <a class="dropdown-item" href="{{ route('admin.teacher.index') }}">Teachers</a>

        </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.subject.index') }}">Subjects</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('admin.olympiad.index') }}">Olympiads</a></li>
@endsection
