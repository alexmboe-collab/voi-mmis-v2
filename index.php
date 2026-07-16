<?php

require_once 'config/config.php';
require_once 'config/database.php';

echo "<h1>" . APP_NAME . "</h1>";

echo "<hr>";

echo "<h2 style='color:green;'>✅ Database Connected Successfully!</h2>";

echo "<p><strong>Database:</strong> " . DB_NAME . "</p>";

echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";

echo "<p><strong>Server Time:</strong> " . date('d M Y H:i:s') . "</p>";