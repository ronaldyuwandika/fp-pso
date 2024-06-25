<x-layout>
    @section ('content')
    <div class="base min-h-screen flex items-center flex-col py-20">
        <h2 class="text-6xl "> My ITS Parking</h2>
        <div class="flex items-center justify-center">
            <img src="{{ asset('/images/brand.png') }}" alt="logo brand" width="400" height="400"
                class="motion-safe:animate-bounced">
        </div>
        <div class="space-y-4 flex flex-col">
            <a href={{route('login')}}
                class="bg-white border-2 border-orange-500 hover:bg-orange-100 text-black font-bold py-2 px-4 w-52 text-center">
                Login
            </a>
            <a href={{route('register')}}
                class="bg-white border-2 border-orange-500 hover:bg-orange-100 text-black font-bold py-2 px-4 w-52 text-center">
                Register
            </a>
        </div>
    </div>
    @endsection
</x-layout>