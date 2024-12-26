<x-layout>
    <div class="container-fluid vh-100 d-flex bg-light justify-content-center align-items-center">

        <form action="{{ route('post.create') }}" method="POST" class="bg-white shadow w-25 h-auto p-5 rounded"
            enctype="multipart/form-data">
            @csrf
            <h3 class="text-center font-weight-bold mb-5">
                Create Post</h3>
            <div class="mb-3">
                <label for="username" class="form-label">Title</label>
                <input type="text" class="form-control" id="username" name="title">
                @error('title')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                @error('description')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload photo</label>
                <input class="form-control" type="file" id="formFile" name="image">
                @error('image')
                    <span class="text-sm text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100 mb-3 cursor-pointer">Submit</button>
        </form>
    </div>
</x-layout>
