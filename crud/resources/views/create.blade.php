<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Login</title>
</head>

<body style="font-family: Arial; background-color: #f5f5f5; padding: 30px;">

    <h1 style="text-align: center;">Create Login</h1>

    <form action="/login" method="POST"
          style="width: 400px; margin: auto; background-color: white;
                 padding: 20px; border: 1px solid #ccc;">

        @csrf

        <label>Name</label>
        <br>

        <input type="text" name="name" 
               style="width: 95%; padding: 8px; margin: 8px 0 15px;">
               @error('name')
                <p  style="color: red;">{{$message}}</p>
                @enderror
        <br>

        <label>Email</label>
        <br>

        <input type="email" name="email" 
               style="width: 95%; padding: 8px; margin: 8px 0 15px;">
                @error('email')
                <p  style="color: red;">{{$message}}</p>
                @enderror
        <br>

        <label>Password</label>
        <br>

        <input type="password" name="password"
               style="width: 95%; padding: 8px; margin: 8px 0 15px;">
               @error('password')
                <p  style="color: red;">{{$message}}</p>
                @enderror
        <br>

        <button type="submit"
                style="background-color: green; color: white;
                       border: none; padding: 10px 20px;">
            Create
        </button>

        <a href="/login"
           style="margin-left: 10px; color: blue;">
            Back
        </a>

    </form>

</body>

</html>