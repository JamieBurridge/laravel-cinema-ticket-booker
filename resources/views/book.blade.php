<x-layout>
    <x-label-detail label="Movie" :value="$movie->title" />
    <x-label-detail label="Room" :value="$screening->room->name" />
    <x-label-detail label="Date and time" :value="$screening->datetime" />
    <x-label-detail label="Seats available" :value="$screening->seats_available" />

    {{-- Form to book ticket --}}
    <h3 class="text-xl font-bold text-white pt-6 pb-2">Fill in your information</h3>
    <form class="w-[350px]" method="POST" action="/movies/{{ $movie->id }}/book/{{ $screening->id }}">
        @csrf {{-- CSRF protection --}}

        {{-- Form: Name --}}
        <x-label-form>Name</x-label-form>
        <input type="text" placeholder="Neo" name="name" class="input input-bordered w-full" />

        {{-- Form: Email --}}
        <x-label-form>Email</x-label-form>
        <label class="input input-bordered flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
            </svg>
            <input type="text" class="grow" placeholder="example@email.com" name="email" />
        </label>

        {{-- Form: Number of people --}}
        <x-label-form>Number of people</x-label-form>
        <input type="number" value="1" min="0" max="{{$screening->seats_available}}" name="number_of_people" class="input input-bordered w-full" />

        {{-- Form: Book button --}}
        <button class="btn btn-outline btn-primary mt-4" type="submit">Book</button>
    </form>

    {{-- Show success message if exists --}}
    @if(session('success'))
    <div role="alert" class="alert alert-success max-w-fit mt-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ session("success") }}</span>
    </div>
    @endif
</x-layout>