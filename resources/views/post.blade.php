<x-layout>
    <div class="container-lg mt-5">
        <h3>{{ $post->title }}</h3>
        <h5 class=""></h5>
        <p>{{ $post->description }}</p>
        @isset($post->image)
            <img src="{{ asset($post->image) }}" alt="" width="500" height="500">
        @endisset
        <form method="POST" action={{ route('post.delete', ['post' => $post]) }}>
            @csrf
            @can('delete-post', $post)
                <button type="submit" class="btn btn-danger">Delete Post</button>
            @endcan
        </form>
    </div>
</x-layout>
