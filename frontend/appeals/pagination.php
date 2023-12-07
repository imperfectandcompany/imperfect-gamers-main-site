<!-- Pagination -->
<nav aria-label="Forum Page navigation" class="flex justify-center mt-4">
  <ul class="inline-flex space-x-1">
    <!-- First Page Link -->
    <li class="<?= ($page <= 1) ? 'opacity-50 select-none' : '' ?>">
    <a class="<?= ($page <= 1) ? 'opacity-50 cursor-not-allowed select-none' : '' ?> flex items-center justify-center w-10 h-10 bg-red-800 text-white rounded-l-lg" href="<?= ($page > 1) ? '?page=1' : '#' ?>" aria-label="First" <?= ($page <= 1) ? 'onclick="return false;"' : '' ?>>
        <span class="material-icons">first_page</span>
      </a>
    </li>

    <!-- Previous Page Link -->
    <li class="<?= ($page <= 1) ? 'opacity-50 select-none' : '' ?>">
    <a class="<?= ($page <= 1) ? 'opacity-50 cursor-not-allowed select-none' : '' ?> flex items-center justify-center w-10 h-10 bg-red-800 text-white" href="<?= ($page > 1) ? '?page=' . max($page - 1, 1) : '#' ?>" aria-label="Previous" <?= ($page <= 1) ? 'onclick="return false;"' : '' ?>>
        <span class="material-icons">chevron_left</span>
      </a>
    </li>

    <!-- Page Number Links -->
    <?php for ($i = max($page - 2, 1); $i <= min($page + 2, $totalPages); $i++): ?>
      <li class="<?= ($i == $page) ? 'bg-red-600' : 'bg-red-800' ?>">
        <a class="flex items-center justify-center w-10 h-10 text-white" href="?page=<?= $i; ?>" <?= ($i == $page) ? 'aria-current="page"' : '' ?>>
          <?= $i; ?>
        </a>
      </li>
    <?php endfor; ?>

    <!-- Next Page Link -->
    <li class="<?= ($page >= $totalPages) ? 'opacity-50 select-none' : '' ?>">
    <a class="<?= ($page >= $totalPages) ? 'opacity-50 cursor-not-allowed select-none' : '' ?> flex items-center justify-center w-10 h-10 bg-red-800 text-white" href="<?= ($page < $totalPages) ? '?page=' . min($page + 1, $totalPages) : '#' ?>" aria-label="Next" <?= ($page >= $totalPages) ? 'onclick="return false;"' : '' ?>>
        <span class="material-icons">chevron_right</span>
      </a>
    </li>

    <!-- Last Page Link -->
    <li class="<?= ($page >= $totalPages) ? 'opacity-50 select-none' : '' ?>">
    <a class="<?= ($page >= $totalPages) ? 'opacity-50 cursor-not-allowed select-none' : '' ?> flex items-center justify-center w-10 h-10 bg-red-800 text-white rounded-r-lg" href="<?= ($page < $totalPages) ? '?page=' . $totalPages : '#' ?>" aria-label="Last" <?= ($page >= $totalPages) ? 'onclick="return false;"' : '' ?>>
        <span class="material-icons">last_page</span>
      </a>
    </li>
  </ul>
</nav>
