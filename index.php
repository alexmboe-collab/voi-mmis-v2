<?php

require_once 'config/config.php';
require_once 'config/database.php';
require_once 'includes/functions.php';

echo "<h1>" . APP_NAME . "</h1>";

echo "<hr>";

echo "<h2>Helper Function Tests</h2>";

echo "<p><strong>Tracking Number:</strong> " . generateTrackingNumber() . "</p>";

echo "<p><strong>Token:</strong> " . generateToken(16) . "</p>";

echo "<p><strong>Formatted Date:</strong> " . formatDate(date('Y-m-d H:i:s')) . "</p>";

echo "<p><strong>File Size:</strong> " . formatBytes(10485760) . "</p>";

echo "<p><strong>Escaped HTML:</strong> " . e("<script>alert('Hack');</script>") . "</p>";