@extends('layouts.dash')
@section('content')

<hr class="bg-gray-300 my-12">

<!-- Title -->
<h2 class="font-sans font-bold break-normal text-gray-700 px-2 pb-8 text-xl">Update Your Article:</h2>

<!-- Card -->
<div id='section2' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="title">
                    Title
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white" id="title" type="text" name="title" value="{{ $article->title }}">
            </div>
        </div>

        <!-- Content -->
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="content">
                    Content
                </label>
            </div>
            <div class="md:w-2/3">
                <textarea class="form-textarea block w-full focus:bg-white" id="content" name="content" rows="8">{{ $article->content }}</textarea>
            </div>
        </div>

        <!-- Status -->
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="status">
                    Status
                </label>
            </div>
            <div class="md:w-2/3">
                <select class="form-select block w-full focus:bg-white" id="status" name="status">
                    <option value="draft" {{ $article->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $article->status === 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>
        </div>

        <!-- Tags -->
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="tags">
                    Tags
                </label>
            </div>
            <div class="md:w-2/3">
                <select class="form-select block w-full focus:bg-white" id="tags" name="tags[]" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" {{ $article->tags->contains($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>
                    @endforeach
                </select>
                <p class="py-2 text-sm text-gray-600">Sélectionnez les tags existants ou ajoutez de nouveaux tags en les séparant par des virgules.</p>
            </div>
        </div>

        <!-- Image -->
        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="image">
                    Image
                </label>
            </div>
            <div class="md:w-2/3">
                <input class="form-input block w-full focus:bg-white" id="image" type="file" name="image">
            </div>
        </div>

        <!-- Save Button -->
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                <button class="shadow bg-yellow-700 hover:bg-yellow-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                    Save
                </button>
            </div>
        </div>
    </form>

</div>

@endsection
