@section('nav')
    <li class="nav-item"><a class="nav-link" href="{{route('student.home')}}">Home</a></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cabinet
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="{{route('student.cabinet.index')}}">Profile</a>
          <a class="dropdown-item" href="{{route('student.cabinet.edit')}}">Edit</a>

        </div>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Olympiad
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{route('student.olympiad.active')}}">Active</a>
          </div>
        </li>
@endsection
