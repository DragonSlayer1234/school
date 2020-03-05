<div class="card">
    <div class="card-header py-2">
        <span class="auth">
            {{ Auth::user()->login }}
        </span>

        <form class="d-inline-block float-right" id="logout-form" action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-custom p-0"><i class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>

    <div class="card-body p-0">


        <div class="list-group">
            <a href="{{ route('admin.student.index') }}" class="list-group-item list-group-item-action">
                <span class="link-icon"><i class="fas fa-users"></i></span> Users
            </a>
            <a href="{{ route('admin.olympiad.index') }}" class="list-group-item list-group-item-action">
                <span class="link-icon"><i class="fas fa-trophy"></i></span> Olympiads
            </a>
            <a href="{{ route('admin.subject.index') }}" class="list-group-item list-group-item-action">
                <span class="link-icon"><i class="fas fa-atom"></i></span> Subjects</a>
        </div>

    </div>
</div>
