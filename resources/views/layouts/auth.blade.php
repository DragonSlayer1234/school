@if (Auth::guard('student')->check())

  @include('student.auth.options')

@elseif (Auth::guard('teacher')->check())

  @include('teacher.auth.options')

@else

  @include('layouts.login-modal')

@endif
