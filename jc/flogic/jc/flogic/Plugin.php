<?php namespace JC\Flogic;

use Backend;
use System\Classes\PluginBase;

/**
 * Flogic Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Flogic',
            'description' => 'No description provided yet...',
            'author'      => 'JC',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'JC\Flogic\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'jc.flogic.some_permission' => [
                'tab' => 'Flogic',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'flogic' => [
                'label'       => 'Flogic',
                'url'         => Backend::url('jc/flogic/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['jc.flogic.*'],
                'order'       => 500,
            ],
        ];
    }

}
