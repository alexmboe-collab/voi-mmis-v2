<div class="dashboard-section">

<div class="card">

<div class="card-header">

<h3>

<i class="fas fa-chart-pie"></i>

User Analytics

</h3>

</div>

<div class="analytics-grid">

<div class="analytics-box">

<h4>Active Users</h4>

<h2><?= $dashboard->activeUsers(); ?></h2>

</div>

<div class="analytics-box">

<h4>Inactive Users</h4>

<h2><?= $dashboard->inactiveUsers(); ?></h2>

</div>

</div>

<br>

<table class="table">

<thead>

<tr>

<th>Role</th>

<th>Total Users</th>

</tr>

</thead>

<tbody>

<?php foreach($dashboard->usersByRole() as $role): ?>

<tr>

<td><?= e($role['role']) ?></td>

<td><?= e($role['total']) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

</div>

</div>