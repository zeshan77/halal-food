<x-layout>

    <div class="container mt-5 bg-white" style="width: 600px; padding: 3rem;" >

        <h2 class="mb-5">Register user</h2>

        <form action="/register" method="post">
            @csrf
            <div class="form-group mb-4">
                <label class="mb-1" for="title">Name</label>
                <input name="name"  class="form-control" id="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
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

            <div class="form-group mb-4">
                <label class="mb-1" for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation"  class="form-control" id="password_confirmation">
                @error('password_confirmation')
                <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>


            <x-button label="Register" />
        </form>
    </div>
</x-layout>
