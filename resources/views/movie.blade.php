<x-layout>
    <div class="flex gap-6">
        <figure><img src="{{$movie['image']}}" class="max-h-[500px]" /></figure>
        <div>
            <h2 class="card-title">{{$movie["title"]}}</h2>
            <p>{{$movie["description"]}}</p>
            <button class="btn btn-primary mt-6">Book tickets now</button>
        </div>
    </div>
</x-layout>