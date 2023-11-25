<!-- Pagination -->
<nav aria-label="Forum Page navigation">
    <ul class="pagination justify-center">
        <!-- First Page Link -->
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=1" aria-label="First page"><i class="material-icons">first_page</i></a>
        </li>

        <!-- Previous Page Link -->
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= max($page - 1, 1) ?>">Previous</a>
        </li>

        <!-- Page Number Links -->
        <?php for ($i = max($page - 2, 1); $i <= min($page + 2, $totalPages); $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i; ?>">
                    <?= $i; ?>
                </a>
            </li>
        <?php endfor; ?>

        <!-- Next Page Link -->
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= min($page + 1, $totalPages) ?>">Next</a>
        </li>

        <!-- Last Page Link -->
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $totalPages ?>" aria-label="Last page"><i class="material-icons">last_page</i></a>
        </li>
    </ul>
</nav>