<?php namespace Genius\Elixir;

use System\Classes\PluginBase;

/**
 * StorageClear Plugin Information File
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
            'name'        => 'genius.elixir::lang.plugin.name',
            'description' => 'genius.elixir::lang.plugin.description',
            'author'      => 'Genius',
            'icon'        => 'icon-recycle'
        ];
    }

    /**
     * Register events and more.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommand('genius.elixir.init', 'Genius\Elixir\Console\ElixirInit');
    }
}
