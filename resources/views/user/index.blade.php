<x-layout>
  @section ('content')
  <div class="bg-[#F2F2F2] min-h-screen">
    <header class="bg-[#FFCF55] flex items-center justify-between px-4 py-2 text-black">
      <div class="flex flex-col">
        <p>My Its Parking </p>
        <a href="{{route('parkir')}}" class="bg-gray-100 px-4 py-2 rounded-md">Daftar Parkiran</a>
      </div>
      <div>
        <p>Home Page</p>
      </div>
      <div>
        <a href="/profile">
          <img src=" {{asset('/images/profile.png')}}" alt="logo brand" width="100" height="100">
        </a>
      </div>
    </header>
    <div class="h-full flex items-center justify-center hover:scale-105">
      <img src=" {{asset('/images/brand.png')}}" alt="logo brand" width="400" height="400">
    </div>
  </div>
  @endsection
</x-layout>