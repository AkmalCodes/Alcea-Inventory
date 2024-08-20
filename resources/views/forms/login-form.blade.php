<div class="login-form">
    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="form-title">Login</h3>
        <div class="container-fluid">
            <div class="col mb-3">
                <label for="loginEmail" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" value="{{ old('email') }}"
                    required>
                <span role="alert"><strong id="loginEmailError"></strong></span>
            </div>

            <div class="col mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
                <span role="alert"><strong id="loginPasswordError"></strong></span>
            </div>
            <div class="col mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="col d-flex justify-content-center align-items-center">
                    <button type="submit" class="login btn border-1">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: '{{ route('login') }}',
                data: $('#loginForm').serialize(),
                dataType: 'json', // Set the expected response from client side to expect JSON data from server
                headers: {
                    'Accept': 'application/json' // Explicitly tell the server to respond with JSON
                },
                success: function(response) {
                    console.log('Login successful:', response);
                    // window.location.href = response.redirect; // Redirect if login is successful
                },
                error: function(response) {
                    console.log('Login error:', response);
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;

                        if (errors.email) {
                            $('#loginEmailError').text(errors.email[0]).show();
                            $('#loginEmail').addClass('is-invalid');
                        } else {
                            $('#loginEmailError').hide();
                            $('#loginEmail').removeClass('is-invalid');
                        }

                        if (errors.password) {
                            $('#loginPasswordError').text(errors.password[0]).show();
                            $('#loginPassword').addClass('is-invalid');
                        } else {
                            $('#loginPasswordError').hide();
                            $('#loginPassword').removeClass('is-invalid');
                        }
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
