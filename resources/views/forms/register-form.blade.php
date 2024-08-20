<div class="register-form">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h3 class="form-title">Register</h3>
        <div class="container-fluid">
            <div class="col mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col mb-3">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>

            <div class="col">
                <div class="col d-flex justify-content-center align-items-center">
                    <button type="submit" class="register btn border-1">Register</button>
                </div>
            </div>
        </div>
    </form>
</div>
