<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Products</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-product.php">Add Product</a>
            </div>
            <?php 
            include "common/products-table.php"; ?>
        </div>
    </main>
<?php include("footer.php");
?>
