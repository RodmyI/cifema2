<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 20)->create();

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@cifema.com',
            'password' => Hash::make('123456789')
        ]);

        Role::create([
        	'name' => 'Administrador',
        	'slug' => 'admin',
        	'special' => 'all-access'
        ]);

        Role::create([
            'name' => 'Produccion',
            'slug' => 'jefe-produccion',
            'description' => 'Maneja las Odenes de Produccion'
        ]);

        Role::create([
            'name' => 'Almacenes',
            'slug' => 'alamacenero',
            'description' => 'Maneja los Porductos terminados y materiales'
        ]);
    }
}
