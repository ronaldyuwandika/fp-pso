<x-layout>
  @section ('content')
  <div class="bg-[#F2F2F2] min-h-screen flex items-center justify-center">
    <header class="bg-[#FCE9AB] flex px-4 py-2 h-[60px] fixed top-0 w-full">
      <a class="text-orange-400 font-semibold text-xl" href="/admin">
        Kembali</a>
      </a>
    </header>
    <div class="flex items-center justify-center bg-white rounded-md text-black px-8 py-4">
      <div class="flex flex-col items-center justify-center gap-4">
        @error('status')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
        <p class="font-semibold text-xl">Kode Parkir</p>
        @if (@isset($status))
        <p class="text-red-500 text-xs mt-2">{{ $status }}</p>
        @endif
        <h2 class="font-bold text-xl">{{$parkir->kode_parkir}}</h2>
        <a href="{{route('generate', $parkir->id)}}" class=" mt-4 bg-white border-2 border-orange-500 hover:bg-orange-100 text-black font-bold py-2 px-4 w-52
          text-center rounded-lg">
          Generate Kode
        </a>
      </div>
    </div>
  </div>
  @endsection
</x-layout>