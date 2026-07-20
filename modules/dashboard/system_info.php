<div class="dashboard-section">

<div class="card">

    <div class="card-header">

        <h3>

            <i class="fas fa-server"></i>

            System Information

        </h3>

    </div>

    <table class="table">

        <tbody>

            <tr>

                <th>Municipality</th>

                <td>The Municipality of Voi</td>

            </tr>

            <tr>

                <th>Application</th>

                <td><?= APP_NAME ?></td>

            </tr>

            <tr>

                <th>Version</th>

                <td><?= $dashboard->version(); ?></td>

            </tr>

            <tr>

                <th>Developer</th>

                <td>Mboe Alex Mwashamba</td>

            </tr>

            <tr>

                <th>Logged-in User</th>

                <td><?= e($dashboard->currentUser()); ?></td>

            </tr>

            <tr>

                <th>User Role</th>

                <td><?= e($dashboard->currentRole()); ?></td>

            </tr>

            <tr>

                <th>PHP Version</th>

                <td><?= $dashboard->phpVersion(); ?></td>

            </tr>

            <tr>

                <th>Database</th>

                <td>

                    <span class="badge badge-success">

                        <?= $dashboard->databaseStatus(); ?>

                    </span>

                </td>

            </tr>

            <tr>

                <th>Server Time</th>

                <td><?= $dashboard->serverTime(); ?></td>

            </tr>

        </tbody>

    </table>

</div>

</div>