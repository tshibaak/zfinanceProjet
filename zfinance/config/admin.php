<?php
// Admin credentials for simple demo (change in production)
define('ADMIN_USER', 'admin');
// Use password_hash to generate a new password for production
define('ADMIN_PASSWORD_HASH', password_hash('admin123', PASSWORD_DEFAULT));
