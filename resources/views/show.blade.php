@extends('layouts.main')

@section('content')

<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src=" {{'https://image.tmdb.org/t/p/w500/'.$movie['poster_path']}} " alt="parasite" class="w-64 md:w-96">
        <div class="md:ml-24">
            <h2 class="text-4xl font-semibold"> {{$movie['title']}} </h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <svg class="w-4 fill-current text-orange-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path class="heroicon-ui" d="M6.1 21.98a1 1 0 0 1-1.45-1.06l1.03-6.03-4.38-4.26a1 1 0 0 1 .56-1.71l6.05-.88 2.7-5.48a1 1 0 0 1 1.8 0l2.7 5.48 6.06.88a1 1 0 0 1 .55 1.7l-4.38 4.27 1.04 6.03a1 1 0 0 1-1.46 1.06l-5.4-2.85-5.42 2.85zm4.95-4.87a1 1 0 0 1 .93 0l4.08 2.15-.78-4.55a1 1 0 0 1 .29-.88l3.3-3.22-4.56-.67a1 1 0 0 1-.76-.54l-2.04-4.14L9.47 9.4a1 1 0 0 1-.75.54l-4.57.67 3.3 3.22a1 1 0 0 1 .3.88l-.79 4.55 4.09-2.15z"/>
                </svg>
                <span class="ml-1">{{ $movie['vote_average']*10 .'%' }}</span>
                <span class="mx-2">|</span>
                <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</span>
                <span class="mx-2">|</span>
                <span> 
                    @foreach ($movie['genres'] as $genre)
                        {{ $genre['name']}}@if (!$loop->last), @endif
                    @endforeach</span>
            </div>

            <p class="text-gray-300 mt-8">
                {{$movie['overview']}}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-semibold"> Featured Cast</h4>
                <div class="flex mt-4">
                    @foreach ($movie['credits']['crew'] as $crew)
                        @if ($loop->index <2)
                            <div class="mr-8">
                                <div> {{$crew['name']}} </div>
                                <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                            </div>
                        @endif
                    @endforeach
                            
                </div>  
            </div>

            @if (count($movie['videos']['results'])>0)
                <div class="mt-12">
                    <a href="http://youtube.com/watch?v={{ $movie['videos']['results'][0]['key'] }}" target="_blank" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM7 6l8 4-8 4V6z"/>
                        </svg>
                        <span class="ml-2">Play Trailer</span>
                    </a>
                </div>
            @endif

            
        </div>
    </div>

</div>

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">
            Cast
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

            @foreach ($movie['credits']['cast'] as $cast)
                @if ($loop->index < 5)
                    <div class="mt-8">
                        <a href="#">
                            <img src=" {{'https://image.tmdb.org/t/p/w300/'.$cast['profile_path']}} " alt="parasite" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="#" class="text-lg mt-2 hover:text-gray-300"> {{ $cast['name']}}</a>
                            <div class="text-gray-400 text-sm">
                                {{ $cast['character']}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
       

        </div>
    </div>
</div>



<div class="movie-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                   @if ($loop->index <9)
                     <div class="mt-8"> 
                        <a href="#">
                            <img src=" {{'https://image.tmdb.org/t/p/w500/'.$image['file_path']}} " alt="image" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                     </div>
                       
                   @endif
                @endforeach
            </div>

        </div>
    </div> <!-- end movie-images -->

@endsection