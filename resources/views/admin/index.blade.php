<x-layout>
  @section ('content')
  <div class="bg-[#F2F2F2] min-h-screen">
    <header class="bg-[#FCE9AB] flex items-center justify-between px-4 py-2">
      <div class="flex flex-col">
        <a class="text-orange-400 font-semibold text-xl" href="/home">
          Daftar parkiran</a>
      </div>
      <a href="/admin/profile">
        <img src=" {{asset('/images/profile.png')}}" alt="logo brand" width="100" height="100">
      </a>
    </header>
    <div class="">
      @foreach ($parkir as $item)
      <div class="grid grid-cols-8 text-black px-4 py-2 bg-white border-b border-b-[#E16C17] border-dashed">
        <div>
          <a class="bg-[#ECECEC] rounded-md shadow-md font-semibold w-24 text-[#D05700] hover:bg-[#FCE9AB] hover:translate-x-2 block text-center"
            href="{{'/admin/parkir/'. $item->id}}">
            Kode
          </a>
        </div>
        <div class="col-span-5">
          {{ $item->nama_parkir }}
        </div>
        <div class="">
          {{ $item->kendaraan_parkir }} / {{ $item->kuota_parkir }}
        </div>
        <div class="flex justify-center space-x-3 items-center">
          <a class="px-2 py-1 bg-orange-300 rounded-full" href="{{'/increment/'. $item->id}}">+</a>
          <a class="px-2 py-1 bg-red-500 rounded-full" href="{{'/decrement/'. $item->id}}">-</a>
        </div>

      </div>
      @endforeach
    </div>
  </div>
  @endsection
</x-layout>