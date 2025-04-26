<x-layout.auth>
    <form class="bg-white rounded-md p-6 text-gray-900 space-y-4" action="{{ route('login.store') }}" method="POST">
        @csrf
        <div class="flex flex-col space-y-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email" value="Email">{{ __('Email') }}</label>
            <input
                class="appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                placeholder="Email"
            />
            @error('email') <small class="text-red-500 text-xs italic">{{ $message }}</small> @enderror
        </div>
        <div class="flex flex-col space-y-2">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password" value="Password">{{ __('Password') }}</label>
            <input
                class="appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="password"
                name="password"
                placeholder="************"
                id="password"
            />
            @error('password') <small class="text-red-500 text-xs italic">{{ $message }}</small> @enderror
        </div>
        <div>
            <button
             class="block w-full bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer"
             type="submit"
            >Login</button>
        </div>
    </form>
</x-layout.auth>
