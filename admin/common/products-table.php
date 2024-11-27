<?php 
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $search_query = '';
    
    if (!empty($search)) {
        $search_query = " WHERE product.Product_Name LIKE '%$search%' OR category.Category_Name LIKE '%$search%' OR product.Product_Id LIKE '%$search%' ";
    }
    
    $query = "
        SELECT 
            product.Discount, 
            product.Product_Name, 
            product.Product_Id, 
            product.Product_Image, 
            category.Category_Name, 
            product.Sale_Price, 
            product.stock, 
            COUNT(o.Order_Id) AS Sold_Quantity, 
            product.is_active 
        FROM category_details_tbl AS category
        RIGHT JOIN product_details_tbl AS product ON category.Category_Id = product.Category_Id
        LEFT JOIN order_details_tbl AS o ON product.Product_Id = o.Product_Id 
        $search_query
        GROUP BY product.Product_Id 
        HAVING product.is_active = 1
    ";
    $total_result = mysqli_query($con, $query);
    $total_records = mysqli_num_rows($total_result);
    
    $records_per_page = 10;
    $total_pages = ceil($total_records / $records_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_from = ($page - 1) * $records_per_page;
    
    $query .= " LIMIT $start_from, $records_per_page ";
    $result = mysqli_query($con, $query);
    
?>                
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Sold Quantity</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(mysqli_num_rows($result)){
                                while($product = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/<?php echo $product['Product_Image']; ?>" alt="<?php echo $product['Product_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2"><?php echo $product['Product_Name']; ?></span>
                                        </td>
                                        <td>₹<?php echo $product['Sale_Price']; ?></td>
                                        <td><?php echo $product['Discount']; ?>%</td>
                                        <td><?php echo $product['Sold_Quantity']; ?></td>
                                        <td><?php echo $product['stock']; ?></td>
                                        <td><?php echo $product['Category_Name']; ?></td>
                                        <td>
                                            <div class="d-flex flex-nowrap">
                                                <a class="btn btn-info btn-sm me-1" href="view-product.php?product_id=<?php echo $product['Product_Id']; ?>">View</a>
                                                <a class="btn btn-success btn-sm me-1" href="update-product.php?product_id=<?php echo $product['Product_Id']; ?>">Update</a>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $product['Product_Id']; ?>" data-id="<?php echo $product['Product_Id']; ?>">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteModal<?php echo $product['Product_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this product? This action cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="delete-product.php?product_id=<?php echo $product['Product_Id']; ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                echo "<tr>
                                    <td colspan='7'>There is no products to display!</td>
                                </tr>";
                            }   
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=" . $search . "''>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."&search=" . $search . "''>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 