@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm"><div class="card-body">
                <h3 class="card-title">Create Account</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            @error('email') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
            @error('password') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
      
        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
</div>
@endsection