<?php

namespace Hounddd\TestBatches;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * TestBatches Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'hounddd.testbatches::lang.plugin.name',
            'description' => 'hounddd.testbatches::lang.plugin.description',
            'author'      => 'Hounddd',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        $this->registerConsoleCommand('hounddd.seedqueue', \Hounddd\TestBatches\Console\SeedQueue::class);
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            'Hounddd\TestBatches\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return []; // Remove this line to activate

        return [
            'hounddd.testbatches.some_permission' => [
                'tab' => 'hounddd.testbatches::lang.plugin.name',
                'label' => 'hounddd.testbatches::lang.permissions.some_permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return [
            'testbatches' => [
                'label'       => 'hounddd.testbatches::lang.plugin.name',
                'url'         => Backend::url('hounddd/testbatches/batches'),
                'icon'        => 'icon-bars-progress',
                'permissions' => ['hounddd.testbatches.*'],
                'order'       => 500,
            ],
        ];
    }
}
