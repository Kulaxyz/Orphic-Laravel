<?php

namespace Bestmomo\Installer\Http\Controllers;

use AppController;
use Artisan;

class EndController extends AppController
{
    /**
     * End the installation
     *
     * @return \Illuminate\View\View
     */
    public function end()
    {
        // Remove service provider
        $path = base_path('config/app.php');

        file_put_contents($path, str_replace(
            'Bestmomo\Installer\InstallerServiceProvider::class,', '', file_get_contents($path)
        ));

        file_put_contents($path, str_replace(
            '// Backpack\Settings\SettingsServiceProvider::class,', 'Backpack\Settings\SettingsServiceProvider::class,', file_get_contents($path)
        ));

        // Change key in .env
        @Artisan::call('key:generate');

        return view('vendor.installer.end');
    }
}
