<div class="d-flex justify-content-end">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($page - 1) . "&search=" . urlencode($search) . "'>Previous</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . urlencode($search) . "'>" . $i . "</a></li>";
            }
            if ($page < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "&search=" . urlencode($search) . "'>Next</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>