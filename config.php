<?php

//declare(strict_types=1);

/**
 *
 */

use cryodrift\fw\Core;

if (!isset($ctx)) {
    $ctx = Core::newContext(new \cryodrift\fw\Config());
}

$cfg = $ctx->config();

\cryodrift\fw\FileHandler::addConfigs($ctx, [
  'themeswitcher.js' => 'shared/ui/themeswitcher/_.js',
]);
