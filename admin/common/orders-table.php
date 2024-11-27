<?php
                    
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $search_query = '';

                    if (!empty($search)) {
                        $search_query = "WHERE CONCAT(u.First_Name, ' ', u.Last_Name) LIKE '%$search%' 
                            OR oh.Order_Id LIKE '%$search%' 
                            OR oh.Order_Status LIKE '%$search%'";
                    }

                    $query = "
                        SELECT 
                            oh.Order_Id, 
                            CONCAT(u.First_Name, ' ', u.Last_Name) AS Customer_Name, 
                            oh.Order_Date, 
                            SUM(od.Quantity) AS Total_Quantity, 
                            oh.Total AS Total_Price, 
                            oh.Order_Status
                        FROM order_header_tbl oh
                        JOIN user_details_tbl u ON oh.User_Id = u.User_Id
                        JOIN order_details_tbl od ON oh.Order_Id = od.Order_Id
                        $search_query
                        GROUP BY oh.Order_Id, Customer_Name, oh.Order_Date, oh.Order_Status
                        ORDER BY oh.Order_Date DESC 
                    ";

                    $result = mysqli_query($con, $query);
                    $total_records = mysqli_num_rows($result);

                    $records_per_page = 10;
                    $total_pages = ceil($total_records / $records_per_page);

                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start_from = ($page - 1) * $records_per_page;

                    $query .= " LIMIT $start_from, $records_per_page";
                    $result = mysqli_query($con, $query);
                
                ?>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                ?>
                                <tr>
                                <td><?php echo $row['Order_Id']; ?></td>
                                <td><a href='user-profile.php?username=<?php echo $row["Customer_Name"]; ?>'><?php echo $row["Customer_Name"]; ?></a></td>
                                <td><?php echo $row['Order_Date']; ?></td>
                                <td><?php echo $row['Total_Quantity']; ?></td>
                                <td>₹<?php echo number_format($row['Total_Price'], 2); ?></td>
                                <td><?php echo $row['Order_Status']; ?></td>
                                <td>
                                    <div class='d-flex flex-nowrap'>
                                        <a href='view-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-info btn-sm me-1'>View</a>
                                        <a href='update-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-primary btn-sm me-1'>Edit</a>
                                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal<?php echo $row["Order_Id"]; ?>'>Delete</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="deleteModal<?php echo $row["Order_Id"]; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this order? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-order.php?order_id=<?php echo $row["Order_Id"]; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No orders found.</td></tr>";
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