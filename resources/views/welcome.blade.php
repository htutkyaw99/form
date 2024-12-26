<x-layout>
    {{-- <div class="container mt-5 ">
        <div class="row gap-3">
            @foreach ($posts as $post)
                <div class="card col-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ substr($post->description, 10) }}</p>
                        <a href={{ "posts/$post->id" }} class="btn btn-primary">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="mt-5">Welcome {{ Auth::user()->email }}</h1>
    </div>
</x-layout>
