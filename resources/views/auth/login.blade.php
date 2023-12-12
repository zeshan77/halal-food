<x-layout>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

        <h2 class="mb-5">Login to your account</h2>

        <form action="/login" method="post">
            @csrf
            <div class="form-group mb-4">
                <label class="mb-1" for="email">Email</label>
                <input name="email"  class="form-control" id="email" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label class="mb-1" for="password">Password</label>
                <input type="password" name="password"  class="form-control" id="password">
                @error('password')
                <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <x-button label="Login" />
        </form>
    </div>
</x-layout>
