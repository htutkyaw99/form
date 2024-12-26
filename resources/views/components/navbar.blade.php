<nav class="navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="d-flex align-items-center">
            {{-- <a href="/posts/create" class="text-sm btn btn-link">Create Post</a> --}}
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="text-sm btn btn-link">Log Out</button>
            </form>
        </div>
    </div>
</nav>
