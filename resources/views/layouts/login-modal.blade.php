<button type="button" class="custom-btn float-right login-modal" data-toggle="modal" data-target="#loginModal">
    Login
</button>

<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Welcome To Jambyl School</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="mb-3 text-center">Login as</h5>
        <a href="{{ route('teacher.login') }}" class="site-btn form-control mb-2">Teacher</a>
        <a href="{{ route('student.login') }}" class="site-btn form-control">Student</a>
      </div>
    </div>
  </div>
</div>
