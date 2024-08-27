<div class="inventory-add-form">
    <form id="inventoryaddForm" method="POST" action="{{ route('inventory.store') }}">
        @csrf
        <h3 class="form-title">Add Inventory Item</h3>
        <ul>
            <li class="nav-item">
                <div class="form-group">
                    <label for="name" class="col-form-label">Item Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                    <span role="alert"><strong id="nameError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="category" class="col-form-label">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="dry">Dry</option>
                        <option value="frozen">Frozen</option>
                        <option value="wet">Wet</option>
                    </select>
                    <span role="alert"><strong id="categoryError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    <span role="alert"><strong id="descriptionError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="quantity" class="col-form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="{{ old('quantity') }}" required step="0.01">
                    <span role="alert"><strong id="quantityError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="unit" class="col-form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit') }}"
                        required>
                    <span role="alert"><strong id="unitError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="reorder_level" class="col-form-label">Reorder Level</label>
                    <input type="number" class="form-control" id="reorder_level" name="reorder_level"
                        value="{{ old('reorder_level') }}" step="0.01">
                    <span role="alert"><strong id="reorderLevelError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="storage_location" class="col-form-label">Storage Location</label>
                    <input type="text" class="form-control" id="storage_location" name="storage_location"
                        value="{{ old('storage_location') }}">
                    <span role="alert"><strong id="storageLocationError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="expiration_date" class="col-form-label">Expiration Date</label>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                        value="{{ old('expiration_date') }}">
                    <span role="alert"><strong id="expirationDateError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="supplier_name" class="col-form-label">Supplier Name</label>
                    <input type="text" class="form-control" id="supplier_name" name="supplier_name"
                        value="{{ old('supplier_name') }}">
                    <span role="alert"><strong id="supplierNameError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="form-group">
                    <label for="supplier_contact" class="col-form-label">Supplier Contact</label>
                    <input type="text" class="form-control" id="supplier_contact" name="supplier_contact"
                        value="{{ old('supplier_contact') }}">
                    <span role="alert"><strong id="supplierContactError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="col d-flex justify-content-center align-items-center">
                    <button type="submit" class="additem btn btn-primary">Add Item</button>
                </div>
            </li>
        </ul>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#inventoryaddForm').on('submit', function(e) {
            e.preventDefault(); // Prevent default form submission

            $.ajax({
                type: 'POST',
                url: '{{ route('inventory.store') }}',
                data: $(this).serialize(), // Serialize the form data
                dataType: 'json', // Set the expected response type to JSON
                headers: {
                    'Accept': 'application/json' // Explicitly tell the server to respond with JSON
                },
                success: function(response) {
                    console.log('Item added successfully:', response);
                    // Optionally, clear the form or update the UI
                    alert(response.message); // Display a success message
                    $('#inventoryaddForm')[0].reset(); // Reset the form fields
                },
                error: function(response) {
                    if (response.status === 422) { // Validation error
                        let errors = response.responseJSON.errors;
                        // Handle validation errors
                        alert('Validation failed. Please check your input.');
                        console.log(errors); // Display validation errors in the console

                        // Example of setting errors to specific fields (if needed)
                        // if (errors.name) {
                        //     $('#nameError').text(errors.name[0]).show();
                        // }
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
