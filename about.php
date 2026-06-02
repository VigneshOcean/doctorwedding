<?php
// ========== Legacy/Direct Entry Point for About Us page ==========
// Since some server configurations (like LiteSpeed/SAPI setups) bypass .htaccess rewrite
// rules for .php files that do not physically exist, this physical file ensures
// that visiting about.php correctly routes through the main MVC entry point.

require_once __DIR__ . '/index.php';
