<?php namespace Genius\Elixir\Console;

use Backend\Models\BrandSettings;
use Cms\Classes\Theme;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Config;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ElixirWatch extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'elixir:watch';

    /**
     * @var string The console command description.
     */
    protected $description = 'Install basic laravel elixir and Bower ecosystem.';

    /**
     * Execute the console command.
     * @return void
     */
    public function fire()
    {
        $path_destination = base_path('/');

        // instalar NPM
        system("cd $path_destination && gulp && gulp watch");

    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
