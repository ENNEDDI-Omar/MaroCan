@extends('layouts.dash')
@section('content')

<hr class="bg-gray-300 my-6">

<!--Title-->
<h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Article Form:</h2>

<!--Card-->
<div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="title">
                    Title
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white" id="title" type="text" name="title"">
                @error('title')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="content">
                    Content
                </label>
            </div>
            <div class="md:w-2/3">
                <textarea class="form-textarea block w-full focus:bg-white" id="content" name="content" rows="8"></textarea>
                @error('content')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="image">
                    Image
                </label>
            </div>
            <div class="md:w-2/3">
                <input type="file" name="image" id="image" class="form-input block w-full focus:bg-white">
                @error('image')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tags">
                    Tags
                </label>
            </div>
            <div class="md:w-2/3">
                <select name="tags[]" id="tags" class="form-select block w-full focus:bg-white" multiple>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                @error('tags')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label for="status" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">Status</label>
            </div>
            <div class="md:w-2/3">
                <select name="status" id="status" class="form-select block w-full focus:bg-white">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="pending">Pending</option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label for="published_at" class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4">Publish Date</label>
            </div>
            <div class="md:w-2/3">
                <input type="date" name="published_at" id="published_at" class="form-input block w-full focus:bg-white" value="{{ old('published_at') }}">
                @error('published_at')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button type="submit" class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                    Save
                </button>
            </div>
        </div>
    </form>

</div>




@endsection
