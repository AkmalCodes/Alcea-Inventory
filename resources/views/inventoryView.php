
<div class="container-fluid">
    <div class="desktop-inventory d-flex flex-row p-3">
        <div class="col-md-2 d-none flex-column d-md-flex">
            <div class="container-fluid h-100">
                <ul class="inventory-nav">
                    <li><a href="#">front desk</a></li>
                    <li><a href="#">wet kitchen</a></li>
                    <li><a href="#">dry kitchen</a></li>
                </ul>
            </div>
        </div>
        <div class="col-12 col-md-10 d-flex flex-column justify-content-start">
            <div class="inventory-view">
                <div class="col-12">
                    <div class="container-fluid  px-0 px-md-auto m-0">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search Inventory"
                                aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <!-- BELOW IS CODE FOR INVENTORY VIEW -->
                <div class="col-12 d-flex flex-column">
                    <nav class="navbar-nav">
                        <div class="container-fluid h-100 py-2 px-0 px-md-auto m-0">
                            <ul class="sub-inventory-nav">
                                <li><a href="#" data-value="frozen">Frozen</a></li>
                                <li><a href="#" data-value="dry">Dry</a></li>
                                <li><a href="#" data-value="wet">Wet</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="inventory-view-desktop container-fluid h-100 d-none d-md-flex  px-0 px-md-auto m-0">
                        <table class="w-100 mt-1">
                            <tr>
                                <th>Product</th>
                                <th>information</th>
                                <th>Quantity</th>
                                <th>Last Updated</th>
                                <th class="d-none d-md-block">Actions</th>
                            </tr>
                            <tr class="inventory-view-desktop-item">
                                <td>
                                    <a href="">
                                        <div class="col-8 d-flex justify-content-center align-items-center">
                                            <img src="resources/images/chicken.png" alt="">
                                        </div>
                                        <div class="col-4">
                                            <span>chicken</span>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        <li>
                                            <p>Supplier:</p>
                                        </li>
                                        <li>
                                            <p>Supllier name</p>
                                        </li>
                                        <li>
                                            <p>Quantity:</p>
                                        </li>
                                        <li>
                                            <p>5 packets</p>
                                        </li>
                                    </ul>
                                </td>
                                <td>10</td>
                                <td>10</td>
                                <td>
                                    <div
                                        class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary">Add</button>
                                        <button class="btn btn-secondary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div
                        class="inventory-view-mobile container-fluid h-100 d-flex d-md-none flex-column px-0 px-md-auto">
                        <div class="inventory-view-mobile-item">
                            <div class="top-inventory-view d-flex flex-row w-100 align-items-center">
                                <div class="left col-2 ">
                                    <a href="#"><img src="resources/images/chicken.png" alt=""></a>
                                </div>
                                <div class="middle col-6">
                                    <ul>
                                        <li>
                                            <p>Ingredient:</p>
                                        </li>
                                        <li>
                                            <p>ingredient name</p>
                                        </li>
                                        <li>
                                            <p>Supplier:</p>
                                        </li>
                                        <li>
                                            <p>Supllier name</p>
                                        </li>
                                        <li>
                                            <p>Quantity:</p>
                                        </li>
                                        <li>
                                            <p>5 packets</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="right col-4 flex-column">
                                    <div
                                        class="container-fluid m-0 p-0 d-flex justify-content-center align-items-center">
                                        <button class="btn btn-primary">Add</button>
                                        <button class="btn btn-secondary">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-inventory-view d-flex flex-row w-100 align-items-center">
                                <div class="left col-4">
                                    Frozen
                                </div>
                                <div class="right col-4">
                                    19/07/24
                                </div>
                                <div class="right col-4">
                                    Stocked
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
