<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Create a New Message</title>

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
            font-family: Arial, sans-serif;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px 0;
        }

        .messages .message {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .messages .message h4 {
            font-size: 18px;
            color: #333;
            margin-bottom: 5px;
        }

        .messages .message p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 5px;
        }

        .messages .message .created-at {
            font-size: 12px;
            color: #999;
        }

    </style>

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
            <textarea name="message" id="message" required>{{ old('message') }}</textarea>
            @error('message')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Submit</button>
        </div>
    </form>
    <div class="messages">
        @foreach ($messages as $message)
            <div class="message">
                <h4>Name: {{ $message->name }}</h4>
                <p>Email: {{ $message->email }}</p>
                <p>Message: {{ $message->message }}</p>
                <p class="created-at">Created At: {{ $message->created_at}} </p>
            </div>
            <hr>
        @endforeach
    </div>
</body>
</html>









