@section('nav')
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.upcoming') }}">Upcomings</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.active') }}">Active</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.draft') }}">Drafts</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.checking') }}">Checking</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.rejected') }}">Rejected</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('teacher.olympiad.moderating') }}">Moderating</a></li>
@endsection