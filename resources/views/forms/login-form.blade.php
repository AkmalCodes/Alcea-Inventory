<div class="login-form">
    <form id="loginform" method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="form-title">Login</h3>
        <div class="container-fluid">
            <div class="col mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus>
                <span role="alert"><strong id="emailError"></strong></span>
            </div>
            <div class="col mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required>
                <span role="alert"><strong id="passwordError"></strong></span>
            </div>
            <div class="col mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col d-flex justify-content-center align-items-center">
                <button type="submit" class="login btn border-1">Login</button>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loginform').on('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            $.ajax({
                type: 'POST',
                url: '{{ route('login') }}',
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Redirect or close the popup if login is successful
                    window.location.href = response.redirect; // assuming the server responds with a redirect URL
                },
                error: function(response) {
                    // Handle validation errors here
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        console.log(errors);
                        
                        if(errors.email) {
                            $('#emailError').text(errors.email[0]).show();
                            $('#email').addClass('is-invalid');
                        } else {
                            $('#emailError').hide();
                            $('#email').removeClass('is-invalid');
                        }
                        
                        if(errors.password) {
                            $('#passwordError').text(errors.password[0]).show();
                            $('#password').addClass('is-invalid');
                        } else {
                            $('#passwordError').hide();
                            $('#password').removeClass('is-invalid');
                        }
                    } else {
                        // Handle other errors, like 401 Unauthorized, 500 Server error etc.
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>


