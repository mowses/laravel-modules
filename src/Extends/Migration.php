<?php

namespace Nwidart\Modules\Extends;

use Illuminate\Database\Migrations\Migration as MigrationBase;
use Illuminate\Support\Facades\Schema;

class Migration extends MigrationBase
{
    public function __construct()
    {
        if ($this->connection === null) {
            $module = optional(module_class(static::class));
            $this->connection = config($module->getLowerName() . '.connection');
        }
    }

    public function schema()
    {
        return Schema::connection($this->connection);
    }
}
