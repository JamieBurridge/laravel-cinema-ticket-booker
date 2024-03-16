<x-layout>
    {{-- Movie details --}}
    <div class="lg:flex gap-6">
        <figure><img src="{{ $movie->image }}" class="max-w-[300px] h-[400px] rounded-md" /></figure>

        <div class="flex flex-col justify-between pt-6 lg:pt-2">
            <div>
                <h2 class="text-3xl">{{ $movie->title }}</h2>
                <p class="max-w-lg">{{ $movie->description }}</p>
            </div>

            <div class="flex items-center gap-6 pt-6 lg:pt-0">
                <p class="text-xl font-bold">Ticket price: ${{ $movie->ticket_price }}</p>

                {{-- <a href="/movies/{{ $movie->id }}/book">
                    <button class="btn btn-primary">Book tickets now</button>
                </a> --}}
            </div>
        </div>
    </div>

    {{-- Movie screenings --}}
    <div class="pt-6">
        <h2 class="text-2xl text-white font-bold">Screenings</h2>

        @foreach ($screenings as $screening)
            <x-label-detail label="Room" :value="$screening->room->name" />
            <x-label-detail label="Date and time" :value="$screening->datetime" />
            <x-label-detail label="Seats available" :value="$screening->seats_available" />

            {{-- User can only book if there are enough seats available --}}
            @if ($screening->seats_available > 0)
                <a href="/movies/{{ $movie->id }}/book/{{ $screening->id }}">
                    <button class="btn btn-outline btn-primary mt-2">Book</button>
                </a>
            @endif

            <hr class="my-6">
        @endforeach
    </div>
</x-layout>