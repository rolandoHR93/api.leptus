<?php

namespace App\Console\Commands\Creacion;

use App\Models\Interno\Modulos;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DataFakeTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'creacion:dataFakeTable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generar Data Fake en la BD, para pruebas.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $model->getFillable()

        // --------------------
        echo "\n---- Generando Data Fake ∞∞∞∞∞∞∞∞∞∞∞∞";
        // --------------------
        $modulo = new Modulos();

        for ($i=3; $i < 5; $i++) {
            $modulo->create([
                'nombre' => "Modulo ${i}"
                , 'descripcion' => "Descripcion ${i}"
                , 'tipo_id' => 1
                , 'created_by' => 1
            ]);
        }

        // --------------------
        echo "\n√√√ EXITO ⁞⁞_⁞⁞ √√√√√√√";
        // --------------------

        return Command::SUCCESS;
    }

    public function ejemplo()
    {
         // $model->getFillable()

        // --------------------
        echo "\n---- Generando Data Fake ∞∞∞∞∞∞∞∞∞∞∞∞";
        // --------------------
        $modulo = new Modulos();

        for ($i=3; $i < 5; $i++) {
            $modulo->create([
                'nombre' => "Modulo ${i}"
                , 'descripcion' => "Descripcion ${i}"
                , 'tipo_id' => 1
                , 'created_by' => 1
            ]);
        }

        // --------------------
        echo "\n√√√ EXITO ⁞⁞_⁞⁞ √√√√√√√";
        // --------------------

        return Command::SUCCESS;
    }
}
