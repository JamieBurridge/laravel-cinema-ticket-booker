<x-layout>
    <x-label-detail label="Movie" :value="$movie->title" />
    <x-label-detail label="Room" :value="$screening->room->name" />
    <x-label-detail label="Date and time" :value="$screening->datetime" />
    <x-label-detail label="Seats available" :value="$screening->seats_available" />

    {{-- Form to book ticket --}}
    <h3 class="text-xl font-bold text-white pt-6 pb-2">Fill in your information</h3>
    <form class="w-[350px]">
        {{-- Form: Name --}}
        <x-label-form>Name</x-label-form>
        <input type="text" placeholder="Neo" class="input input-bordered w-full" />

        {{-- Form: Email --}}
        <x-label-form>Email</x-label-form>
        <label class="input input-bordered flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
            <input type="text" class="grow" placeholder="example@email.com" />
        </label>

        {{-- Form: Number of people --}}
        <x-label-form>Number of people</x-label-form>
        <input type="number" value="1" min="0" max="{{$screening->seats_available}}" class="input input-bordered w-full" />

        {{-- Form: Book button --}}
        <a href="/movies/{{ $movie->id }}/book/{{ $screening->id }}">
            <button class="btn btn-outline btn-primary mt-4">Book</button>
        </a>
    </form>


    <hr class="my-6">
</x-layout>
