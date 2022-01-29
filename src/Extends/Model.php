<?php

namespace Nwidart\Modules\Extends;

use Illuminate\Database\Eloquent\Model as ModelBase;

class Model extends ModelBase
{
    public function __construct()
    {
        if ($this->connection === null) {
            $module = optional(module_class(static::class));
            $this->connection = config($module->getLowerName() . '.connection');
        }

        return parent::__construct(...func_get_args());
    }
}
