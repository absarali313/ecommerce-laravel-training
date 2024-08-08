<x-client.layout>
    <h2>Register</h2>
    <form action="/register" method="POST">
         @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <button type="submit">Register</button>
    </form>
</x-client.layout>
