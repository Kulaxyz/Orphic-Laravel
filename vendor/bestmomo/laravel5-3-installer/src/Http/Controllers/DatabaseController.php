<?php

namespace Bestmomo\Installer\Http\Controllers;

use Illuminate\Http\Request;
use AppController;
use Bestmomo\Installer\Repositories\EnvironmentRepository;
use Artisan;
use Exception;
use DB;

class DatabaseController extends AppController
{
    /**
     * Show form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $host = env('DB_HOST');
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        if(is_writable(base_path('.env')) && is_writable(base_path('config/app.php'))) {
          return view('vendor.installer.database', compact('host', 'database', 'username', 'password'));
        }else{
          return view('vendor.installer.env-error', ['env' => is_writable(base_path('.env')), 'app' => is_writable(base_path('config/app.php')) ]);
        }
    }

    /**
     * Manage form submission.
     *
     * @param Illuminate\Http\Request  $request
     * @param Bestmomo\Installer\Repositories\EnvironmentRepository $environmentRepository
     * @return redirection
     */
    public function store(Request $request, EnvironmentRepository $environmentRepository)
    {
        // Set config for migrations and seeds
        $connection = 'install_check';
        config([
            'database.connections.'.$connection.'.host' => $request->host,
            'database.connections.'.$connection.'.database' => $request->dbname,
            'database.connections.'.$connection.'.password' => $request->password,
            'database.connections.'.$connection.'.username' => $request->username,
        ]);


        // Test database connection
        try {
            DB::connection($connection)->table(DB::raw('DUAL'))->first([DB::raw(1)]);
        } catch (\Exception $e) {
            return view('vendor.installer.database-error');
        }

        // Update .env file
        $environmentRepository->SetDatabaseSetting($request);

        // Start migration
        return redirect('install/database/migrate');

    }

    /**
     * Install database
     *
     * @return \Illuminate\View\View
     */
    public function install()
    {
        // Migrations and seeds
        try {
            @Artisan::call('migrate');
            @Artisan::call('db:seed');
        } catch(Exception $e) {
            return view('vendor.installer.database-error');
        }

        if(config('installer.administrator')) {
            return redirect('install/register');
        }

        return redirect('install/end');
    }

}
