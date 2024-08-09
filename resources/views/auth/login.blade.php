<x-admin.layout>
    <h2>Login</h2>

    <form action="/login" method="POST">
        @csrf

        {{-- User's Email--}}
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br><br>

        {{-- User's Password--}}
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Login</button>
    </form>
</x-admin.layout>
