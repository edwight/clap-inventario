<?php

use Illuminate\Database\Seeder;
use App\Models\Localizacion;

class LocalizacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $localizacion = new Localizacion;
        $localizacion->nombre = 'La Pastora: Casa de cultura.';
        $localizacion->proveedor_id = 1;
        $localizacion->save();

        $localizacion = new Localizacion;
        $localizacion->nombre = 'San Agustín: Urbanismo Tomar Torrijos.';
        $localizacion->proveedor_id = 1;
        //privilegios
        $localizacion->save();

        $localizacion = new Localizacion;
        $localizacion->nombre = 'San Francisco';
        $localizacion->proveedor_id = 2;
        //privilegios
        $localizacion->save();

        $localizacion = new Localizacion;
        $localizacion->nombre = 'Universidad Stanford de Palo Alto';
        $localizacion->proveedor_id = 2;
        //privilegios
        $localizacion->save();

        $localizacion = new Localizacion;
        $localizacion->nombre = 'Área de la Bahía de San Francisco';
        $localizacion->proveedor_id = 3;
        //privilegios
        $localizacion->save();
    }
}
