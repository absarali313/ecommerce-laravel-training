<x-admin.layout>
    <form action="/login" method="POST">
        @csrf
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-md-6 col-lg-4 bg-white border border-1 border-secondary p-4 rounded">
                <h2 class="text-center">Login</h2>

                {{-- User's Email --}}
                <label for="email" class="form-label">Email:</label>
                <input type="text" id="email" name="email" class="form-control" required>

                <x-form-error name="email"/>
                <br>

                {{-- User's Password --}}
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>

                <x-form-error name="password"/>
                <br>

                <button type="submit" class="btn btn-primary w-100">Login</button>
                <a href="/register" class="btn btn-secondary w-100 mt-2">Register</a>
            </div>
        </div>
    </form>
</x-admin.layout>
