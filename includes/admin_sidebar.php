<aside class="sidebar">

<div class="sidebar-title">

MAIN MENU

</div>

<nav>

<ul>

<?php if (hasRole(['ICT_ADMIN'])): ?>

<li>

    <a href="<?= BASE_URL ?>admin/users/index.php">

        <i class="fas fa-users-cog"></i>

        User Management

    </a>

</li>

<?php endif; ?>

<li><a href="../admin/logout.php">

<i class="fas fa-sign-out-alt"></i>

Logout

</a></li>

</ul>

</nav>

</aside>

<main class="content">