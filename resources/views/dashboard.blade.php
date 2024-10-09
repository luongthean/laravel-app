<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container">
                            <h2 class="mb-2">Upload Image to S3</h2>

                            @if(session('url'))
                                <div class="alert alert-success">
                                    <strong>Image uploaded successfully!</strong><br>
                                    <img src="{{ session('url') }}" alt="Uploaded Image" class="img-fluid mt-3">
                                </div>
                            @endif

                            <form action="/upload-image" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="image">Choose Image</label>
                                    <input type="file" name="image" class="form-control" id="image" required>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" style="color: #000;">Upload</button>
                            </form>

                            <h2 class="mb-2 mt-2">List Image</h2>
                            @foreach($images as $image)
                            <a class="d-flex" href="{{$image->url}}">{{$image->url}}</a>
                            @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
