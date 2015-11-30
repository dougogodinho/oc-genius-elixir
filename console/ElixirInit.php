<?php namespace Genius\Elixir\Console;

use Backend\Models\BrandSettings;
use Cms\Classes\Theme;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Config;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ElixirInit extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'elixir:init';

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
        $this->info('Initializing npm, bower and some boilerplates');

        // copiar templates
        $path_source = plugins_path('genius/elixir/assets/template/');
        $path_destination = base_path('/');

        $vars = [
            '{{theme}}' => Theme::getActiveTheme()->getDirName(),
            '{{project}}' => str_slug(BrandSettings::get('app_name')),
        ];

        $fileSystem = new Filesystem();

        foreach ($fileSystem->allFiles($path_source) as $file) {

            if (!$fileSystem->isDirectory($path_destination . $file->getRelativePath())) {
                $fileSystem->makeDirectory($path_destination . $file->getRelativePath(), 0777, true);
            }
            $fileSystem->put(
                $path_destination . $file->getRelativePathname(),
                str_replace(array_keys($vars), array_values($vars), $fileSystem->get($path_source . $file->getRelativePathname()))
            );
        }


        $this->info('... initial setup is ok!');
        $this->info('Installing npm... this can take several minutes!');

        // instalar NPM
        system("cd $path_destination && npm install");

        $this->info('... node components is ok!');


        $this->info('Installing bower... this will no longer take as!');

        // instalar NPM
        system("cd $path_destination && bower install");

        $this->info('... bower components is ok!');

        $this->info('Now... edit the /gulpfile.js as you wish and edit your assets at/ resources directory... that\'s is!');

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
