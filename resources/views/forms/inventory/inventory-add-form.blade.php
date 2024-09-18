<div class="inventory-add-form">
    <form id="inventoryaddForm" method="POST" action="{{ route('inventory.store') }}" enctype="multipart/form-data">
        @csrf
        <h3 class="form-title">Add Inventory Item</h3>
        <ul>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <input type="file" class="form-control" id="image" name="image" required>
                    {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex ">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" id="name" name="name" required>
                    <span role="alert"><strong id="nameError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Category</span>
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
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Description</span>
                    <input type="text" class="form-control" id="description" name="description">{{ old('description') }}</input>
                    <span role="alert"><strong id="descriptionError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Quantity</span>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="{{ old('quantity') }}" required step="0.1">
                    <span role="alert"><strong id="quantityError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Unit</span>
                    <input type="text" class="form-control" id="unit" name="unit" value="{{ old('unit') }}"
                        required>
                    <span role="alert"><strong id="unitError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Reorder Level</span>
                    <input type="number" class="form-control" id="reorder_level" name="reorder_level"
                        value="{{ old('reorder_level') }}" step="0.1">
                    <span role="alert"><strong id="reorderLevelError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Storage Location</span>
                    <input type="text" class="form-control" id="storage_location" name="storage_location"
                        value="{{ old('storage_location') }}">
                    <span role="alert"><strong id="storageLocationError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Expiration Date</span>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                        value="{{ old('expiration_date') }}">
                    <span role="alert"><strong id="expirationDateError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Supplier Name</span>
                    <input type="text" class="form-control" id="supplier_name" name="supplier_name"
                        value="{{ old('supplier_name') }}">
                    <span role="alert"><strong id="supplierNameError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Supplier Contact</span>
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

            var div = $('.inventory-add-form');
            var formData = new FormData(this); // Use FormData to include file inputs

            $.ajax({
                type: 'POST',
                url: 'inventory/',
                data: formData, // Pass the FormData object instead of serialized data
                dataType: 'json', // Set the expected response type to JSON
                processData: false, // processData, Don't process the FormData --> this is important to tell the ajax function not to process the data as by default it will into string format which will corrupt the image
                contentType: false, // Don't set the content-type header, let jQuery set it
                headers: {
                    'Accept': 'application/json' // Explicitly tell the server to respond with JSON
                },
                success: function(response) {
                    closeFormWithTransition(div,'inventory-blurred');
                    var message = 'Item added successfully'; // Update toast message
                    var type = 'inventory-add-success'; //
                    showToastInventory(message, type);
                    $('#inventoryaddForm')[0].reset(); // Reset the form fields
                },
                error: function(response) {
                    if (response.status === 422) { // Validation error
                        var errors = response.responseJSON.errors;
                        var type = 'inventory-update-success'; //
                        showToastInventory(errors, type);
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });

</script>
