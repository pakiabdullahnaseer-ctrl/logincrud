<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Crud</title>
</head>

<body style="font-family: Arial; background-color: #f5f5f5; padding: 30px;">

    <h1 style="text-align: center;">Logins</h1>
    @if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif

    <a href="/login/create"
       style="display: inline-block; background-color: green; color: white;
              padding: 8px 15px; text-decoration: none; margin-bottom: 15px;">
        Create
    </a>

    <table border="1"
           style="width: 100%; background-color: white; border-collapse: collapse;">

        <tr style="background-color: #333; color: white;">

            <th style="padding: 10px;">ID</th>
            <th style="padding: 10px;">Name</th>
            <th style="padding: 10px;">Email</th>
            <th style="padding: 10px;">Password</th>
            <th style="padding: 10px;">Action</th>

        </tr>

        @foreach($logins as $login)

        <tr>

            <td style="padding: 10px; text-align: center;">
                {{ $login->id }}
            </td>

            <td style="padding: 10px; text-align: center;">
                {{ $login->name }}
            </td>

            <td style="padding: 10px; text-align: center;">
                {{ $login->email }}
            </td>

            <td style="padding: 10px; text-align: center;">
                {{ $login->password }}
            </td>

            <td style="padding: 10px; text-align: center;">

    <a href="/login/{{ $login->id }}/edit"
       style="background-color: blue; color: white;
              padding: 6px 12px; text-decoration: none;">
        Edit
    </a>

    <form action="/login/{{ $login->id }}" method="POST"
          style="display: inline;">

        @csrf
        @method('DELETE')

        <button type="submit"
                style="background-color: red; color: white;
                       border: none; padding: 6px 12px; cursor: pointer;">
            Delete
        </button>

    </form>

</td>

        </tr>

        @endforeach

    </table>

</body>

</html>