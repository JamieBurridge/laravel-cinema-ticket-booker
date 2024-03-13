<x-layout>
    <h1 class="text-2xl text-white font-bold pb-6">Movies currently on show:</h1>

    @unless (count($movies) == 0)

    <div class="flex flex-wrap justify-center gap-4">
        @foreach ($movies as $movie)
        <div class="card w-96 bg-base-100 shadow-xl">
            <figure><img src="{{$movie['image']}}" class="max-h-[500px] w-full" /></figure>
            <div class="card-body">
                <h2 class="card-title">{{$movie["title"]}}</h2>
                <p>{{$movie["description"]}}</p>
                <div class="card-actions justify-start">
                    <a href="/movies/{{$movie['id']}}
                    ">
                        <button class="btn btn-primary">View schedule</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @else
    <x-error resource="movies" />

    @endunless
</x-layout>