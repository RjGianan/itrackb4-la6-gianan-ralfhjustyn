@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-3">Log in</h3>

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control"
                        >

                        @error('email')
                            <div class="text-danger small">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                        >
                    </div>

                    <button class="btn btn-primary">
                        Log in
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
