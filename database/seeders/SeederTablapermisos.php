<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Permission;

class SeederTablapermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos=[
            
            //tablaroles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'eliminar-rol',

            //tablaproductos
            'ver-producto',
            'crear-producto',
            'editar-producto',
            'eliminar-producto',

        ];
        foreach ($permisos as $permiso ) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
