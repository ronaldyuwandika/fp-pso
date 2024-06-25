<x-layout>

  @section('content')
  <div class="base min-h-screen flex items-center justify-center">
    <form action="{{ route('register.store') }}" method="POST">
      <h2 class="text-6xl font-bold">Register</h2>
      <div class="flex flex-col space-y-4">
        @error('status')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
        @csrf
        <input type="text" name="username" placeholder="Username"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('username') border-red-500 @enderror">
        @error('username')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="name" name="name" placeholder="Nama"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('name') border-red-500 @enderror">
        @error('name')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="email" name="email" placeholder="Email"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('email') border-red-500 @enderror">
        @error('email')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="nrp" name="nrp" placeholder="NRP"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('nrp') border-red-500 @enderror">
        @error('nrp')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="text" name="plate_number" placeholder="Plate Number"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('plate_number') border-red-500 @enderror">
        @error('plate_number')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <input type="password" name="password" placeholder="Password"
          class="w-80 h-10 border text-gray-400 rounded-lg px-4 outline-none focus:border-blue-500 mt-4 @error('password') border-red-500 @enderror">
        @error('password')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <button type="submit"
          class="mt-4 bg-white border-2 border-orange-500 hover:bg-orange-100 text-black font-bold py-2 px-4 w-52 text-center rounded-lg">
          Register
        </button>
        <a class="text-red-500" href="{{route('welcome')}}">
          Kembali
        </a>
      </div>
    </form>
  </div>

  @endsection
</x-layout>