<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insertar valores en la tabla roles';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roles = [
            'Profesional de proyectos - Desarrollador',
            'Gerente estratégico',
            'Auxiliar administrativo'
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert(['nombre' => $role]);
        }

        $this->info('Valores insertados en la tabla roles.');
    }
}
