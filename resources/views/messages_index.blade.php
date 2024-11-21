<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .alert {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 3px;
            padding: 8px;
            margin-top: 5px;
        }

        .messages {
            padding: 30px 20px;
        }
    </style>
    <title>Create a New Message</title>
</head>
<body>

    <form method="POST" action="{{ url('/messages') }}">
        @csrf
        <div class="container">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name"  value="{{old('name')}}" class="@error('name') is-invalid @enderror" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" class="@error('email') is-invalid @enderror" required>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Submit</button>
        </div>
    </form>
    <div class="messages">
        @foreach ($messages as $message)
            Name: {{ $message->name }}<br>
            Email: {{ $message->email }}<br>
            Message: {{ $message->message }}<br>
            Created At: {{ $message->created_at }}<br>
            <hr>
        @endforeach
    </div>
</body>
</html>









