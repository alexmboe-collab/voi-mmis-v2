<?php

require_once '../../includes/bootstrap.php';

requireLogin();

requireRole(['ICT_ADMIN']);

$pageTitle = "Add Project";

require_once '../../modules/projects/model.php';

$projectModel = new ProjectModel($pdo);

$errors = [];

$data = [

    'project_name' => '',
    'description' => '',
    'ward' => '',
    'location' => '',
    'budget' => '',
    'funding_source' => '',
    'contractor' => '',
    'start_date' => '',
    'end_date' => '',
    'status' => 'PLANNED',
    'progress' => 0

];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data['project_name'] =
        trim($_POST['project_name'] ?? '');

    $data['description'] =
        trim($_POST['description'] ?? '');

    $data['ward'] =
        trim($_POST['ward'] ?? '');

    $data['location'] =
        trim($_POST['location'] ?? '');

    $data['budget'] =
        trim($_POST['budget'] ?? '');

    $data['funding_source'] =
        trim($_POST['funding_source'] ?? '');

    $data['contractor'] =
        trim($_POST['contractor'] ?? '');

    $data['start_date'] =
        $_POST['start_date'] ?? '';

    $data['end_date'] =
        $_POST['end_date'] ?? '';

    $data['status'] =
        $_POST['status'] ?? 'PLANNED';

    $data['progress'] =
        (int)($_POST['progress'] ?? 0);
        if (empty($data['project_name'])) {

    $errors[] =
        "Project name is required.";

}

if (empty($data['ward'])) {

    $errors[] =
        "Ward is required.";

}

if (!is_numeric($data['budget'])) {

    $errors[] =
        "Budget must be numeric.";

}

if (
    $data['progress'] < 0 ||
    $data['progress'] > 100
) {

    $errors[] =
        "Progress must be between 0 and 100.";

}

if (empty($errors)) {

    if ($projectModel->create($data)) {

        $_SESSION['success'] =
            "Project created successfully.";

        redirect('index.php');

    }

}
}

require_once '../../includes/admin_header.php';
require_once '../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>Add Project</h2>

    <a href="index.php" class="btn">

        <i class="fas fa-arrow-left"></i>

        Back

    </a>

</div>

<?php if (!empty($errors)): ?>

<div class="alert alert-danger">

    <ul>

        <?php foreach ($errors as $error): ?>

            <li><?= e($error) ?></li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<div class="card">

<form method="POST">

<div class="form-grid">

    <div class="form-group">

        <label>Project Name *</label>

        <input
            type="text"
            name="project_name"
            class="form-control"
            value="<?= e($data['project_name']) ?>"
            required>

    </div>

    <div class="form-group">

        <label>Ward *</label>

        <input
            type="text"
            name="ward"
            class="form-control"
            value="<?= e($data['ward']) ?>"
            required>

    </div>

    <div class="form-group">

        <label>Location</label>

        <input
            type="text"
            name="location"
            class="form-control"
            value="<?= e($data['location']) ?>">

    </div>

    <div class="form-group">

        <label>Budget (KES)</label>

        <input
            type="number"
            name="budget"
            class="form-control"
            value="<?= e($data['budget']) ?>">

    </div>

    <div class="form-group full-width">

        <label>Description</label>

        <textarea
            name="description"
            class="form-textarea"
            rows="4"><?= e($data['description']) ?></textarea>

    </div>

    <div class="form-group">

        <label>Funding Source</label>

        <input
            type="text"
            name="funding_source"
            class="form-control"
            value="<?= e($data['funding_source']) ?>">

    </div>

    <div class="form-group">

        <label>Contractor</label>

        <input
            type="text"
            name="contractor"
            class="form-control"
            value="<?= e($data['contractor']) ?>">

    </div>

    <div class="form-group">

        <label>Start Date</label>

        <input
            type="date"
            name="start_date"
            class="form-control"
            value="<?= e($data['start_date']) ?>">

    </div>

    <div class="form-group">

        <label>End Date</label>

        <input
            type="date"
            name="end_date"
            class="form-control"
            value="<?= e($data['end_date']) ?>">

    </div>

    <div class="form-group">

        <label>Status</label>

        <select
            name="status"
            class="form-select">

            <option value="PLANNED">
                Planned
            </option>

            <option value="ONGOING">
                Ongoing
            </option>

            <option value="COMPLETED">
                Completed
            </option>

            <option value="DELAYED">
                Delayed
            </option>

        </select>

    </div>

    <div class="form-group">

        <label>Progress (%)</label>

        <input
            type="number"
            name="progress"
            class="form-control"
            min="0"
            max="100"
            value="<?= e($data['progress']) ?>">

    </div>

    </div>

    <br>

    <button class="btn btn-success">

        <i class="fas fa-save"></i>

        Save Project

    </button>

    </form>

</div>

<?php require_once '../../includes/admin_footer.php'; ?>