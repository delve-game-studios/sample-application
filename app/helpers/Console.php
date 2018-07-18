<?php

namespace App\Helpers;

use App\Helpers\Traits\SingletonPattern;

class Console
{
    use SingletonPattern;

    public function migrate()
    {
        $migrationsDir = realpath(APP . 'migrations');
        $migrationFiles = scandir($migrationsDir);
        
        // var_dump(Capsule::getInstance()->table('migrations')->get());exit;
        $alreadyDoneMigrations = Capsule::getInstance()->table('migrations')->select('migration')->get()->toArray();
        $result = ['already exist' => [], 'added' => []];
        foreach ($alreadyDoneMigrations as $key => $value) {
            $alreadyDoneMigrations[$key] = $value->migration;
            $result['already exist'][] = $value->migration;
        }

        $migrationFiles = array_filter($migrationFiles, function ($var) use ($alreadyDoneMigrations) {
            if (in_array($var, ['.','..','Migration.php'])) {
                return false;
            }
            if (in_array(trim($var, '.php'), $alreadyDoneMigrations)) {
                return false;
            }
            return true;
        });

        foreach ($migrationFiles as $file) {
            $className = trim($file, '.php');
            $migration = call_user_func(['\App\Migrations\\' . $className, 'getInstance']);
            $migration->up();

            Capsule::getInstance()->table('migrations')->insert(['migration' => $className]);
            $result['added'][] = $file;
        }

        return $result;
    }
}
