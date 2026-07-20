<?php

$recentUsers = $userModel->latest(5);

?>

<div class="card">

    <div class="card-header">

        <h3>

            <i class="fas fa-users"></i>

            Recently Registered Users

        </h3>

    </div>

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>Name</th>

                    <th>Username</th>

                    <th>Role</th>

                    <th>Status</th>

                    <th>Date</th>

                </tr>

            </thead>

            <tbody>

            <?php if (empty($recentUsers)): ?>

                <tr>

                    <td colspan="5">

                        No users found.

                    </td>

                </tr>

            <?php else: ?>

                <?php foreach ($recentUsers as $user): ?>

                <tr>

                    <td><?= e($user['full_name']) ?></td>

                    <td><?= e($user['username']) ?></td>

                    <td><?= e($user['role']) ?></td>

                    <td>

                        <?php if ($user['status'] === 'ACTIVE'): ?>

                            <span class="badge badge-success">

                                ACTIVE

                            </span>

                        <?php else: ?>

                            <span class="badge badge-danger">

                                INACTIVE

                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?= date('d M Y', strtotime($user['created_at'])) ?>

                    </td>

                </tr>

                <?php endforeach; ?>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>