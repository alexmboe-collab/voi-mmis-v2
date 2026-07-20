<?php

require_once '../config/config.php';
require_once '../includes/functions.php';
require_once '../includes/auth.php';

logout();

redirect('login.php');