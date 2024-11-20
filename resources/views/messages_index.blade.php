<!-- resources/views/create.blade.php -->
<h1>Create a New Message</h1>

<form method="POST" action="{{ url('/messages') }}">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea><br><br>

    <button type="submit">Submit</button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@foreach ($messages as $message)
    Name: {{ $message->name }}<br>
    Email: {{ $message->email }}<br>
    Message: {{ $message->message }}<br>
    Created At: {{ $message->created_at }}<br>
    <hr>
@endforeach

