<x-layout>
    <div class="lg:flex gap-6">
        <figure><img src="{{ $movie['image'] }}" class="max-w-[300px] h-[400px]" /></figure>

        <div class="flex flex-col justify-between pt-6 lg:pt-2">
            <div>
                <h2 class="text-3xl">{{ $movie["title"] }}</h2>
                <p class="max-w-lg">{{ $movie["description"] }}</p>
            </div>

            <div class="flex items-center gap-6 pt-6 lg:pt-0">
                <p class="text-xl font-bold">Ticket price: ${{ $movie["ticket_price"] }}</p>
                <button class="btn btn-primary">Book tickets now</button>
            </div>

        </div>
    </div>
</x-layout>