<?php

if (php_sapi_name() === 'cli') {
  return;
}

require_once __DIR__ . '/include.php';
require_once __DIR__ . '/router.php';
router();
