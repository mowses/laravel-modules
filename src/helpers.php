<?php

if (! function_exists('module_path')) {
    function module_path($name, $path = '')
    {
        $module = app('modules')->find($name);

        return $module->getPath() . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (! function_exists('public_path')) {
    /**
     * Get the path to the public folder.
     *
     * @param  string  $path
     * @return string
     */
    function public_path($path = '')
    {
        return app()->make('path.public') . ($path ? DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}

if (! function_exists('module_class')) {
    /**
     * Get the module instance based on the path of any class.
     *
     * @param  string  $class
     * @return Module|null
     */
    function module_class($class = '')
    {
        $filename = optional(new \ReflectionClass($class))->getFileName();
        
        if (!$filename) return;

        return Module::toCollection()->first(function(Module $module) use ($filename) {
            return str_starts_with($filename, $module->getPath() . DIRECTORY_SEPARATOR);
        });
    }
}
