<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class InsertAreas extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:areas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insertar valores en la tabla areas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $areas = ['Ventas', 'Calidad', 'Produccion'];

        foreach ($areas as $area) {
            DB::table('areas')->insert(['nombre' => $area]);
        }

        $this->info('Valores insertados en la tabla areas.');
    }
}
