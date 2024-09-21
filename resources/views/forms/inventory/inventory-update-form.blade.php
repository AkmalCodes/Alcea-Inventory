<div class="inventory-update-form">
    <form id="inventoryupdateForm" method="POST" action="" data-value="" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h3 class="form-title">Update Inventory Item</h3>
        <ul>
            <li class="nav-item">
                <div class="input-group d-flex flex-column justify-center align-items-center">
                    <img class="mb-3" src="" alt="" id="image-preview">
                    <input type="file" class="form-control" id="image" name="image">
                    {{-- <label class="input-group-text" for="inputGroupFile02">Upload</label> --}}
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex ">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control update-form-readonly" id="name" name="name" value="Enter Item Name" readonly>
                    <span role="alert"><strong id="nameError"></strong></span>
                </div>
            </li>
            <li class="nav-item"> 
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Category</span>
                    <select class="form-control" id="category" name="category">
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
                    <input type="text" class="form-control" id="description" name="description" value="Enter Description" readonly></input>
                    <span role="alert"><strong id="descriptionError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Quantity</span>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="Enter Quantity" required step="0.1">
                    <span role="alert"><strong id="quantityError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Unit</span>
                    <input type="text" class="form-control update-form-readonly" id="unit" name="unit" value="Enter Unit" readonly>
                    <span role="alert"><strong id="unitError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Reorder Level</span>
                    <input type="number" class="form-control" id="reorder_level" name="reorder_level"
                        value="Enter Reorder Level" step="0.1">
                    <span role="alert"><strong id="reorderLevelError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Storage Location</span>
                    <input type="text" class="form-control update-form-readonly" id="storage_location" name="storage_location" value="Enter Storage Location"  readonly>
                    <span role="alert"><strong id="storageLocationError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Expiration Date</span>
                    <input type="date" class="form-control" id="expiration_date" name="expiration_date">
                    <span role="alert"><strong id="expirationDateError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Supplier Name</span>
                    <input type="text" class="form-control update-form-readonly" id="supplier_name" name="supplier_name" value="Enter Supplier Name"  readonly>
                    <span role="alert"><strong id="supplierNameError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Supplier Contact</span>
                    <input type="text" class="form-control update-form-readonly" id="supplier_contact" name="supplier_contact" value="Enter Supplier Contact"  readonly>
                    <span role="alert"><strong id="supplierContactError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="col d-flex justify-content-center align-items-center">
                    <button type="submit" class="updateitem btn btn-primary">Update Item</button>
                </div>
            </li>
        </ul>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click','.updateitem-show',function(event){
        // $('.updateitem-show').on('click', function(event) {
            event.preventDefault();

            var itemId = $(this).data('id');

            $.ajax({
                url: '/inventory/get/' + itemId, // This route fetches the item details
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Debugging to ensure response contains correct data
                    // Populate the form fields' placeholders with the response data
                    $('#inventoryupdateForm #image-preview').attr('src', response.image);
                    $('#inventoryupdateForm #name').attr('value', response.name);
                    $('#inventoryupdateForm #category').val(response.category);
                    $('#inventoryupdateForm #description').attr('value', response.description);
                    $('#inventoryupdateForm #quantity').attr('value', response.quantity);
                    $('#inventoryupdateForm #unit').attr('value', response.unit);
                    $('#inventoryupdateForm #reorder_level').attr('value', response.reorder_level);
                    $('#inventoryupdateForm #storage_location').attr('value', response.storage_location);
                    $('#inventoryupdateForm #expiration_date').attr('value', response.expiration_date.split('T')[0]);
                    $('#inventoryupdateForm #supplier_name').attr('value', response.supplier_name);
                    $('#inventoryupdateForm #supplier_contact').attr('value', response.supplier_contact);

                    // $('#inventoryupdateForm').attr('action', '/inventory/patch/' + itemId);
                    $('#inventoryupdateForm').attr('data-value',itemId);
                },
                error: function(response) {
                    alert('Error fetching item data.');
                }
            });
        });
    });
    $(document).ready(function() {
        $(document).on('submit', '#inventoryupdateForm', function(e) {
            e.preventDefault(); // Prevent default form submission
            var itemId = $(this).data('value'); // Ensure this `data-value` is set properly with the ID
            var div = $('.inventory-update-form');
            var formData = new FormData(this); // Use FormData constructor (lowercase "f")
            
            $.ajax({
                type: 'POST', // Even though you're using PATCH, you need to use POST and Laravel will spoof the method
                url: '/inventory/patch/' + itemId, // Make sure this URL is correct
                data: formData,
                processData: false, // Important for sending FormData
                contentType: false, // Important for sending FormData
                dataType: 'json',
                headers: {
                    'Accept': 'application/json'
                },
                success: function(response) {
                    // Success logic
                    closeFormWithTransition(div, 'inventory-blurred');
                    var message = 'Item updated successfully'; // Update toast message
                    var type = 'inventory-update-success';
                    showToastInventory(message, type);
                },
                error: function(response) {
                    if (response.status === 422) {
                        var errors = response.responseJSON.errors;
                        var type = 'inventory-update-error';
                        showToastInventory(errors, type);
                    } else {
                        alert('An error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>
