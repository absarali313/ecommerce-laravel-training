<x-admin.layout>
    <h2>Register</h2>

    <form action="/register" method="POST">
        @csrf
        {{-- User's Name--}}
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        {{-- User's Email--}}
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        {{-- User's Password--}}
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Register</button>
    </form>
</x-admin.layout>
