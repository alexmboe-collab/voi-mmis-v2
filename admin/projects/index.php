<?php

require_once
'../../includes/bootstrap.php';

requireLogin();

$pageTitle =
"Projects";

require_once
'../../modules/projects/model.php';

$projectModel =
new ProjectModel($pdo);

require_once
'../../includes/admin_header.php';

require_once
'../../includes/admin_sidebar.php';
?>

<div class="page-title">

    <h2>

        Projects

    </h2>

</div>

<div class="card">

    <p>

        Total Projects:

        <strong>

            <?= $projectModel->count(); ?>

        </strong>

    </p>

</div>

<?php require_once
'../../includes/admin_footer.php'; ?>