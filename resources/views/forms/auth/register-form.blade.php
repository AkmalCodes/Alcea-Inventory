<div class="register-form">
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf
        <h3 class="form-title">Register</h3>
        <div class="container-fluid">
            <div class="col mb-3">
                <label for="registerName" class="col-sm-2 col-form-label">Name</label>
                <input type="text" class="form-control" id="registerName" name="name" value="{{ old('name') }}"
                    required autofocus>
                <span role="alert"><strong id="registerNameError"></strong></span>
            </div>

            <div class="col mb-3">
                <label for="registerEmail" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control" id="registerEmail" name="email" value="{{ old('email') }}"
                    required>
                <span role="alert"><strong id="registerEmailError"></strong></span>
            </div>

            <div class="col mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="registerPassword" name="password" required>
                <span role="alert"><strong id="registerPasswordError"></strong></span>
            </div>

            <div class="col mb-3">
                <label for="registerPasswordConfirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="registerPasswordConfirm" name="password_confirmation"
                    required>
                <span role="alert"><strong id="registerPasswordConfirmError"></strong></span>
            </div>
            <div class="col">
                <div class="col d-flex justify-content-center align-items-center">
                    <button type="submit" class="register btn border-1">Register</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: '{{ route('register') }}',
                data: $(this).serialize(),
                dataType: 'json', // Set the expected response type to JSON
                headers: {
                    'Accept': 'application/json', // Explicitly tell the server to respond with JSON
                },
                success: function(response) {
                    console.log('Register success:', response);
                },
                error: function(response) {
                    console.log('Register error:', response);
                    if (response.status === 422) {
                        let errors = response.responseJSON.errors;

                        if (errors.name) {
                            $('#registerNameError').text(errors.name[0]).show();
                            $('#registerName').addClass('is-invalid');
                        } else {
                            $('#registerNameError').hide();
                            $('#registerName').removeClass('is-invalid');
                        }

                        if (errors.email) {
                            $('#registerEmailError').text(errors.email[0]).show();
                            $('#registerEmail').addClass('is-invalid');
                        } else {
                            $('#registerEmailError').hide();
                            $('#registerEmail').removeClass('is-invalid');
                        }

                        if (errors.password) {
                            $('#registerPasswordError').text(errors.password[0]).show();
                            $('#registerPassword').addClass('is-invalid');
                        } else {
                            $('#registerPasswordError').hide();
                            $('#registerPassword').removeClass('is-invalid');
                        }

                        if (errors.password_confirmation) {
                            $('#registerPasswordConfirmError').text(errors
                                .password_confirmation[0]).show();
                            $('#registerPasswordConfirm').addClass('is-invalid');
                        } else {
                            $('#registerPasswordConfirmError').hide();
                            $('#registerPasswordConfirm').removeClass('is-invalid');
                        }
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
