<x-layout>
  @section ('content')
  <div class="bg-[#F2F2F2] min-h-screen">
    <header class="bg-[#FCE9AB] flex items-center justify-between px-4 py-2">
      <div class="flex flex-col">
        <a class="text-black font-semibold text-xl" href="/home">
          Kembali</a>
      </div>
      <a href="/profile">
        <img src=" {{asset('/images/profile.png')}}" alt="logo brand" width="100" height="100">
      </a>
    </header>
    <div class="">
      @foreach ($parkir as $item)
      <div class="grid grid-cols-8 text-black px-4 py-2 bg-white border-b border-b-[#E16C17] border-dashed">
        <div>
          <a class="bg-[#ECECEC] rounded-md shadow-md font-semibold w-24 text-[#D05700] hover:bg-[#FCE9AB] hover:translate-x-2 block text-center"
            href="{{'/parkir/'. $item->id}}">
            Kode
          </a>
        </div>
        <div class="col-span-5">
          {{ $item->nama_parkir }}
        </div>
        <div class="col-span-2">
          {{ $item->kendaraan_parkir }} / {{ $item->kuota_parkir }}
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endsection
</x-layout>