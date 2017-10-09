<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (scandir('app/Models') as $fileName) {
            if (!in_array($fileName, array('.', '..'))) {
                $fileName = str_replace('.php', '', $fileName);
                if (is_file('App/Repositories/Contracts/' . $fileName . 'InterFace.php') && is_file('App/Repositories/' . $fileName . 'Repository.php')) {
                    $this->app->bind("App\Repositories\Contracts\\{$fileName}Interface", function () use ($fileName) {
                        $repoClass  = "\App\Repositories\\{$fileName}Repository";
                        $modelClass = "\App\Models\\{$fileName}";
                        return new $repoClass(new $modelClass);
                    });
                }
            }
        }
    }
}
