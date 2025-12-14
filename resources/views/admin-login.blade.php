<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="max-w-md mx-auto mt-20">
        <h1 class="text-2xl mb-4">Admin Login</h1>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-4">
                <label>Email</label>
                <input type="email" name="email" class="w-full border px-2 py-1" required>
            </div>
            <div class="mb-4">
                <label>Password</label>
                <input type="password" name="password" class="w-full border px-2 py-1" required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white">Login</button>
        </form>
    </div>
</body>
</html>
