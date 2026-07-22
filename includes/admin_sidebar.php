<?php
/**
 * ==========================================================
 * Admin Sidebar
 * ==========================================================
 */
?>

<aside class="sidebar">

    <div class="sidebar-title">
        <i class="fas fa-bars"></i>
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

                <li>

                    <a href="<?= BASE_URL ?>admin/projects/">
                        <i class="fas fa-road"></i>
                        Projects
                    </a>
                </li>

            <?php endif; ?>

            <li>
                <a href="<?= BASE_URL ?>admin/dashboard.php">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="<?= BASE_URL ?>admin/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>

        </ul>

    </nav>

</aside>

<main class="content">