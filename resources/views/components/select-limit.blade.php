<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Limit
    </button>
    <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('post.index', ['status' => ucfirst(request()->status), 'limit' => 2])}}">2</a></li>
            <li><a class="dropdown-item" href="{{ route('post.index', ['status' => ucfirst(request()->status), 'limit' => 4])}}">4</a></li>
            <li><a class="dropdown-item" href="{{ route('post.index', ['status' => ucfirst(request()->status), 'limit' => 6])}}">6</a></li>
            <li><a class="dropdown-item" href="{{ route('post.index', ['status' => ucfirst(request()->status), 'limit' => 8])}}">8</a></li>
            <li><a class="dropdown-item" href="{{ route('post.index', ['status' => ucfirst(request()->status), 'limit' => 10])}}">10</a></li>
    </ul>
</div>