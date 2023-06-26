@extends('layouts.main')

@section('container')
    <h1>Halaman Kontak</h1>

    <h1>Aspirations</h1>

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="whatsapp_or_email">WhatsApp or Email:</label>
            <input type="text" name="whatsapp_or_email" id="whatsapp_or_email" required>
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

@endsection
