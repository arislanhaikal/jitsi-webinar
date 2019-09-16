<div class="bg-light card" id="sidebar-wrapper">
    <div class="card-header">Menu</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('classroom.index') }}" class="list-group-item list-group-item-action @if(Request::segment(1) === 'classroom') active @else bg-light @endif">Classrooms</a>
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action @if(Request::segment(1) === 'user') active @else bg-light @endif">Users</a>
    </div>
</div>