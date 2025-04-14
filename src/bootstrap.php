<?php

namespace Lkt\FileBrowser;

use Lkt\Factory\Schemas\Schema;
use Lkt\Phinx\PhinxConfigurator;

/**
 * Load Schemas
 */
Schema::add(require_once __DIR__ . '/Config/Schemas/lkt-file-entities.php');

if (php_sapi_name() == 'cli') {
    PhinxConfigurator::addMigrationPath(__DIR__ . '/../database/migrations');
}