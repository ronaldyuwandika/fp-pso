<x-layout>
  @section('content')
  <div class="min-h-screen flex flex-col justify-between">
    <div class="h-[25vh] base relative">
      <div class="absolute -bottom-14 left-[10%] flex flex-col justify-center items-center">
        <img src="{{asset('images/profile.png')}}" alt="Logo" class="w-1/2">
        <p class="text-xl text-black">{{$user->name}}</p>
      </div>
    </div>
    <div class="h-[25vh] border-b-4 border-secondary">
    </div>
    <div class="h-[25vh] py-12 px-24 border-b-4 border-secondary">
      <div class="min-w-[620px] text-xl text-black">
        <div class="flex justify-between">
          <p class="text-primary font-semibold">NRP</p>
          <p>{{$user->nrp}}</p>
        </div>
        <div class="flex justify-between mt-2">
          <p class="text-primary font-semibold">Plat Nomor Kendaraan</p>
          <div class="flex justify-center items-center gap-x-2" id="view-plate-number">
            <p>{{$user->plate_number}}</p>
            <button onclick="editMode()" class="cursor-pointer">
              <img src=" {{asset('icons/edit.png')}}" alt="Logo" class="w-5 inline-block" />
            </button>
          </div>
          <div class="justify-between mt-2" id="edit-plate-number">
            <form action="{{route('profile.update', $user->id)}}" method="POST">
              @csrf
              @method('PUT')
              <input type="text" name="plate_number" id="plate_number"
                class="rounded border px-2 @error('plate_number') is-invalid @enderror" value="{{$user->plate_number}}"
                placeholder="Plat Nomor Kendaraan">
              @error('plate_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <button type="submit" class="bg-orange-400 rounded px-2"> {{ __('Simpan') }} </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="h-[25vh] py-12 px-24 relative">
      <div class="text-[#626262] text-2xl">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="inline-flex justify-center items-center gap-x-2">
            <img src="{{asset('icons/logout.png')}}" alt="Logo" class="w-10 inline-block">
            Logout
          </button>
        </form>
      </div>
    </div>
    <div class="bottom-0 flex justify-center items-center">
      <a class="bg-orange-300 rounded-t-md w-56 h-12 flex justify-center item-center" href="/home">
        <div class="bg-orange-500 rounded-md p-4 flex justify-center flex-col items-center">
          <img src="{{asset('icons/home.png')}}" alt="Logo" class="w-10 inline-block">
          <p class="text-white text-[8px]">Beranda</p>
        </div>
      </a>
    </div>
  </div>
  <script>
    $(document).ready(function(){
    $("#edit-plate-number").hide();
  });
  function editMode(){
    $("#view-plate-number").hide();
    $("#edit-plate-number").show();
  }

  </script>
  @endsection
</x-layout>