<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Permiso;

class TablaPermisoSeeder extends Seeder
{
    public function run()
    {
        // factory(Permiso::class)->times(50)->create();
        DB::table('permiso')->insert([
            'nombre' => 'Prestar libros',
            'slug' => 'prestar-libros',
        ]);

        DB::table('permiso')->insert([
            'nombre' => 'Crear libros',
            'slug' => 'crear-libros',
        ]);

        DB::table('permiso')->insert([
            'nombre' => 'Editar libros',
            'slug' => 'editar-libros',
        ]);

        DB::table('permiso')->insert([
            'nombre' => 'Listar libros',
            'slug' => 'listar-libros',
        ]);


    }
}
