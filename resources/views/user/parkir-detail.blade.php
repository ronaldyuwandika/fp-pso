<x-layout>
  @section ('content')
  <div class="bg-[#F2F2F2] min-h-screen flex items-center justify-center">
    <header class="bg-[#FCE9AB] flex px-4 py-2 h-[60px] fixed top-0 w-full">
      <a class="text-orange-400 font-semibold text-xl" href="/parkir">
        Kembali</a>
      </a>
    </header>
    <div class="flex items-center justify-center bg-white rounded-md text-black px-8 py-4">
      <form action="{{route('parkir.detail.store')}}" method="POST">
        @csrf
        <div class="flex flex-col items-center justify-center gap-4">


          @error('status')
          <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
          @enderror
          <p class="font-semibold text-xl ">Masukkan Kode Parkir</p>
          @if (@isset($status))
          <p class="text-red-500 text-xs mt-2">{{ $status }}</p>
          @endif
          <input type="text" name="parkir_code" placeholder="Kode Parkir"
            class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4">
          <button type="submit"
            class="mt-4 bg-white border-2 border-orange-500 hover:bg-orange-100 text-black font-bold py-2 px-4 w-52 text-center rounded-lg">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
  @endsection
</x-layout>