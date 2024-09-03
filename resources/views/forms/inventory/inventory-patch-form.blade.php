<div class="inventory-add-form">
    <form id="inventoryaddForm" method="POST" action="{{ route('inventory.patch') }}">
        @csrf
        <h3 class="form-title">Update Inventory Item</h3>
        <ul>
            <li class="nav-item">
                <div class="input-group d-flex ">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
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
                    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                    <span role="alert"><strong id="descriptionError"></strong></span>
                </div>
            </li>
            <li class="nav-item">
                <div class="input-group d-flex">
                    <span class="input-group-text" id="basic-addon1">Quantity</span>
                    <input type="number" class="form-control" id="quantity" name="quantity"
                        value="{{ old('quantity') }}" required step="0.01">
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
                        value="{{ old('reorder_level') }}" step="0.01">
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
        $('.update-item').on('click', function(event) {
            event.preventDefault();

            var itemId = $(this).data('id');

            $.ajax({
                url: '/inventory/' + itemId, // This route fetches the item details
                type: 'GET',
                success: function(response) {
                    // Populate the form fields with the response data
                    $('#inventoryUpdateForm #name').val(response.item.name);
                    $('#inventoryUpdateForm #category').val(response.item.category);
                    $('#inventoryUpdateForm #description').val(response.item.description);
                    $('#inventoryUpdateForm #quantity').val(response.item.quantity);
                    $('#inventoryUpdateForm #unit').val(response.item.unit);
                    $('#inventoryUpdateForm #reorder_level').val(response.item
                        .reorder_level);
                    $('#inventoryUpdateForm #storage_location').val(response.item
                        .storage_location);
                    $('#inventoryUpdateForm #expiration_date').val(response.item
                        .expiration_date);
                    $('#inventoryUpdateForm #supplier_name').val(response.item
                        .supplier_name);
                    $('#inventoryUpdateForm #supplier_contact').val(response.item
                        .supplier_contact);

                    // Update the form's action URL
                    $('#inventoryUpdateForm').attr('action', '/inventory/update/' + itemId);

                    // Show the form
                    $('.inventory-add-form').show();
                },
                error: function(response) {
                    alert('Error fetching item data.');
                }
            });
        });
    });
</script>
