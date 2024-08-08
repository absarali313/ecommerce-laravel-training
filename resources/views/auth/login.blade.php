<x-client.layout>
<h2>Login</h2>
<form action="/login" method="POST">
    @csrf
    <label for="email">Username or Email:</label>
    <input type="text" id="email" name="email" required>
    <br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>
    <button type="submit">Login</button>
</form>
</x-client.layout>
