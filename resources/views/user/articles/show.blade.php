@extends('layouts.home')
@section('content')
    <div class="mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">
        <div class="absolute left-0 bottom-0 w-full h-full z-10"
            style="background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.7));"></div>
        <img src="{{ $article->getFirstMediaUrl('articles') }}" alt="article image"
            class="absolute left-0 top-0 w-full h-full z-0 object-cover" />
        <div class="p-4 absolute bottom-0 left-0 z-20">
            @foreach ($article->tags as $tag)
                <a href="#"
                    class="px-4 py-1 bg-zinc-400 text-gray-200 inline-flex items-center justify-center mb-2">{{ $tag->name }}</a>
            @endforeach
            <h2 class="text-4xl font-semibold text-gray-100 leading-tight">
                {{ $article->title }}
            </h2>
            <div class="flex mt-3">
                @if ($article->accreditationBadge && $article->accreditationBadge->user)
                    <img src="{{ $article->accreditationBadge->user->getFirstMediaUrl('users') ?? 'default-profile-image.jpg' }}"
                        class="h-10 w-10 rounded-full mr-2 object-cover" />
                    <div>
                        <p class="font-semibold text-gray-200 text-sm"> {{ $article->accreditationBadge->user->name }} </p>
                        <p class="font-semibold text-gray-400 text-xs">
                            {{ $article->published_at ? $article->published_at->format('d M Y') : 'Date not available' }}
                        </p>
                    </div>
                @else
                    <p class="font-semibold text-gray-200 text-sm"> Unknown </p>
                @endif
            </div>
        </div>
    </div>

     <div class="px-4 lg:px-0 mt-12 text-red-700 max-w-screen-md mx-auto text-lg leading-relaxed">
    {{!! nl2br(e($article->content)) !!}}
    </div> 

    <div class="px-4 lg:px-0 mt-12 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">
        <p class="pb-6">Advantage old had otherwise sincerity dependent additions. It in adapted natural hastily is
            justice. Six draw
            you him full not mean evil. Prepare garrets it expense windows shewing do an. She projection advantages
            resolution son indulgence. Part sure on no long life am at ever. In songs above he as drawn to. Gay was
            outlived peculiar rendered led six.</p>

        <p class="pb-6">Difficulty on insensible reasonable in. From as went he they. Preference themselves me as
            thoroughly
            partiality considered on in estimating. Middletons acceptance discovered projecting so is so or. In or
            attachment inquietude remarkably comparison at an. Is surrounded prosperous stimulated am me discretion
            expression. But truth being state can she china widow. Occasional preference fat remarkably now projecting
            uncommonly dissimilar. Sentiments projection particular companions interested do at my delightful. Listening
            newspaper in advantage frankness to concluded unwilling.</p>

        <p class="pb-6">Adieus except say barton put feebly favour him. Entreaties unpleasant sufficient few
            pianoforte
            discovered
            uncommonly ask. Morning cousins amongst in mr weather do neither. Warmth object matter course active law
            spring six. Pursuit showing tedious unknown winding see had man add. And park eyes too more him. Simple
            excuse
            active had son wholly coming number add. Though all excuse ladies rather regard assure yet. If feelings so
            prospect no as raptures quitting.</p>

        <div class="border-l-4 border-gray-500 pl-4 mb-6 italic rounded">
            Sportsman do offending supported extremity breakfast by listening. Decisively advantages nor
            expression
            unpleasing she led met. Estate was tended ten boy nearer seemed. As so seeing latter he should thirty
            whence.
            Steepest speaking up attended it as. Made neat an on be gave show snug tore.
        </div>

        <p class="pb-6">Exquisite cordially mr happiness of neglected distrusts. Boisterous impossible unaffected he
            me
            everything.
            Is fine loud deal an rent open give. Find upon and sent spot song son eyes. Do endeavor he differed carriage
            is learning my graceful. Feel plan know is he like on pure. See burst found sir met think hopes are marry
            among. Delightful remarkably new assistance saw literature mrs favourable.</p>


        and
        make two real
        miss use easy. Celebrated delightful an especially increasing instrument am. Indulgence contrasted
        sufficient
        to unpleasant in in insensible favourable. Latter remark hunted enough vulgar say man. Sitting hearted on it
        without me.</p>

    </div>
    <div class="px-4 lg:px-0 mt-4">
        <a href="{{ route('user.articles.index') }}"
            class="inline-block px-6 py-2 text-sm text-gray-700 bg-gray-300 rounded hover:bg-gray-400">Back to Articles</a>
    </div>
@endsection
