<?php include "../../../php/check_login.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css"
        integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="../../../../static/css/admin/panel.css">
    <link rel="stylesheet" href="../../../../static/css/admin/market-list.css">
    <title>ACCC Beirut Port Prject</title>
</head>

<body>

    <!-- NavBar Start -->
    <section>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
                    aria-controls="offcanvasExample">
                    <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
                </button>

                <a class="navbar-brand theme-text" href="../../../../index.php">
                    <img src="../../../../static/img/logo-only.png" alt="ACCC LOGO" id="brand-logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
                    aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="topNavBar">
                    <ul class="d-flex ms-auto navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://static-00.iconduck.com/assets.00/person-fill-icon-481x512-40cd90q6.png"
                                    alt="PFP" id="pfp-logo">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><span class="dropdown-item greatings" href="#">Hello, <span id="name">
                                            <?php
                                            $result = send_query("SELECT userID from Sessions WHERE sessionToken = '$jwt'", true, false);
                                            $userid = $result['userID'];
                                            $username = send_query("SELECT userName from Users WHERE userID = '$userid'", true, false)['userName'];
                                            echo $username;
                                            ?>
                                        </span></span></li>
                                <li><a class="dropdown-item" href="../edit profile/editprofile.php">Edit Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../../../php/logout.php">Log Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>
    <!-- NavBar End -->

    <!-- SideBar Start -->
    <section>

        <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
            <div class="offcanvas-body p-0">
                <nav class="navbar-dark">
                    <ul class="navbar-nav">
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3 mt-3">
                                Dashboard
                            </div>
                        </li>
                        <li class="mt-3">
                            <a href="../dashboard.php" class="nav-link px-3">
                                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <hr class="dropdown-divider bg-light" />
                        </li>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                                Services
                            </div>
                        </li>
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#orders">
                                <span class="me-2">
                                    <i class="fa-regular fa-truck-fast"></i>
                                </span>
                                <span>Orders</span>
                                <span class="ms-auto">
                                    <span class="right-icon">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </span>
                            </a>
                            <div class="collapse" id="orders">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="../orders/import-order.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-arrow-left fa-xs"></i>
                                                <i class="fa-solid fa-box"></i>
                                            </span>
                                            <span>Imported Orders</span>
                                        </a>
                                        <a href="../orders/export-order.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <!-- <i class="bi bi-card-list"></i> -->
                                                <i class="fa-solid fa-box"></i>
                                                <i class="fa-solid fa-arrow-right fa-xs"></i>
                                            </span>
                                            <span>Exported Orders</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#marketplace">
                                <span class="me-2">
                                    <i class="bi bi-cart3"></i>
                                </span>
                                <span>MarketPlace</span>
                                <span class="ms-auto">
                                    <span class="right-icon">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </span>
                            </a>
                            <div class="collapse show" id="marketplace">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="marketplace-list.php" class="nav-link px-3 active">
                                            <span class="me-2">
                                                <i class="bi bi-card-list"></i>
                                            </span>
                                            <span>View Market List</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#users">
                                <span class="me-2">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <span>Users</span>
                                <span class="ms-auto">
                                    <span class="right-icon">
                                        <i class="bi bi-chevron-down"></i>
                                    </span>
                                </span>
                            </a>
                            <div class="collapse" id="users">
                                <ul class="navbar-nav ps-3">
                                    <li>
                                        <a href="../users/admin.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-user-shield"></i>
                                            </span>
                                            <span>Admin</span>
                                        </a>
                                        <a href="../users/worker.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-helmet-safety"></i>
                                            </span>
                                            <span>Workers</span>
                                        </a>
                                        <a href="../users/user.php" class="nav-link px-3">
                                            <span class="me-2">
                                                <i class="fa-solid fa-user"></i>
                                            </span>
                                            <span>Members</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="../tracking/tracking.php" class="nav-link px-3">
                                <span class="me-2">
                                    <i class="bi bi-geo-alt-fill"></i>
                                </span>
                                <span>Tracking</span>
                            </a>
                        </li>
                        <li class="my-4">
                            <hr class="dropdown-divider bg-light" />
                        </li>
                        <li>
                            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                                Database
                            </div>
                        </li>
                        <li>
                            <a href="../database/send-query.php" class="nav-link px-3">
                                <span class="me-2">
                                    <i class="fa-regular fa-keyboard"></i>
                                </span>
                                <span>Send Query</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

    </section>
    <!-- SideBar End -->

    <!-- MarketPlace List Start -->
    <section>
        <main class="mt-5 pt-3">
            <div class="d-inline-flex p-2 bd-highlight">
                <button class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add Item <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <div class="container market-items">
                <div class="row row-cols-3">

                    <?php

                    $result = send_query('SELECT * FROM Items', true, true);
                    if ($result) {
                        foreach ($result as $row) {
                            $itemid = $row['itemID'];
                            $itemname = $row['itemName'];
                            $itemprice = $row['itemPrice'];
                            $itemdescription = $row['itemDescription'];
                            $itempicture = $row['itemPicture'];

                            echo "<div class='card col'>
                                <img src='../../../../static/img/$itempicture' class='card-img-top' alt='Item Image'>
                                <div class='card-body'>
                                <h5 class='card-title'>$itemname</h5>
                                <p class='card-text'>$itemdescription</p>
                                <p class='card-text'>$itemprice$</p>
                                <button class='btn btn-primary' data-bs-itemid='$itemid' data-bs-toggle='modal' data-bs-target='#editModal'>
                                <i class='fa-solid fa-pencil'></i>
                                </button>
                                <button class='btn btn-danger' data-bs-itemid='$itemid' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                <i class='fa-solid fa-trash-xmark'></i>
                                </button>
                                </div>
                                </div>";
                        }
                    }

                    ?>

                </div>
            </div>
        </main>

    </section>
    <!-- MarketPlace List End -->


    <!-- Start Modals -->

    <!-- Edit Modal Start-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span>Name:</span>
                        </div>
                        <div class="col-md-6">
                            <span>Price:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" value="Lebanon Ideapad 3950">
                        </div>
                        <div class="col-md-6">
                            <input type="text" value="300">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <span>Description:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="description" id="description" rows="6"
                                style="width: 100%; resize:none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal End-->

    <!-- Delete Modal Start -->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to <span style="font-size: larger; font-weight: 900;">REMOVE</span>:
                        <span>Lenovo Ideapad 3950</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal End -->

    <!-- Add Item Modal Start -->

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <form action="../../../php/add-item.php" method="POST" enctype="multipart/form-data"> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <span id="error" class="text-danger"><?php if (isset($_GET['error_msg_add'])) {
                                echo $_GET['error_msg_add'];
                            } ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <span>Name:</span>
                        </div>
                        <div class="col-md-6">
                            <span>Price:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" id="name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" id="price" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <span>Pictures:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="file" id="picture" required>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <span>Description:</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea name="description" id="description" rows="6" style="width: 100%; resize: none;"
                                required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" onclick="add_item()">Add</button>
                    <!-- <input type="submit" class="btn btn-success" value="Add"> -->
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <!-- Add Item Modal End -->

    <!-- Success Modal Start -->

    <section>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <p>Item added <span class="text-success">Successfully!</span></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Modal End -->

    <!-- End Modals -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"
        integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"
        integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../../static/js/admin/script.js"></script>
    <script>
        function add_item() {
            var name = document.getElementById("name");
            var price = document.getElementById("price");
            var picture = document.getElementById("picture");
            var description = document.getElementById("description");
            alert(picture.files[0]);
        }
    </script>
    <!-- <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('success')) {
            show_modal();
        }
            // $("#successModal").modal('show');
            // $('#successModal').modal('show');
        function show_modal(){
            // document.getElementById("successModal").modal('show');
            $('#successModal').modal('show');
        }
    </script> -->
</body>

</html>