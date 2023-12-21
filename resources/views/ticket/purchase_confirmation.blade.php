
@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h2 class="text-2xl font-semibold mb-4">Purchase Confirmation</h2>

        <p class="text-green-500">Thank you for purchasing a ticket, {{ $user->name }}!</p>
    </div>
@endsection
