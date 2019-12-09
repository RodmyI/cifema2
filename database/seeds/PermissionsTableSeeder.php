<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Users
        Permission::create([
        	'name'		  => 'Navegar usuarios',
        	'slug'		  => 'users.index',
        	'description' => 'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Ver detalle de usuario',
        	'slug'		  => 'users.show',
        	'description' => 'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
            'name'        => 'Creacion de usuario',
            'slug'        => 'users.create',
            'description' => 'Registrar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Editar de usuarios',
        	'slug'		  => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Eliminar usuario',
        	'slug'		  => 'users.destroy',
        	'description' => 'Eloiminar cualquier usuario del sistema',
        ]);

        //Roles
        Permission::create([
        	'name'		  => 'Navegar roles',
        	'slug'		  => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Ver detalle de rol',
        	'slug'		  => 'roles.show',
        	'description' => 'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Creacion de roles',
        	'slug'		  => 'roles.create',
        	'description' => 'Registrar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Editar de roles',
        	'slug'		  => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
        	'name'		  => 'Eliminar rol',
        	'slug'		  => 'roles.destroy',
        	'description' => 'Eloiminar cualquier rol del sistema',
        ]);

        //Products
        Permission::create([
            'name'        => 'Navegar products',
            'slug'        => 'products.index',
            'description' => 'Lista y navega todos los products del sistema',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de product',
            'slug'        => 'products.show',
            'description' => 'Ver en detalle cada product del sistema',
        ]);
        Permission::create([
            'name'        => 'Creacion de products',
            'slug'        => 'products.create',
            'description' => 'Registrar cualquier dato de un product del sistema',
        ]);
        Permission::create([
            'name'        => 'Editar de products',
            'slug'        => 'products.edit',
            'description' => 'Editar cualquier dato de un product del sistema',
        ]);
        Permission::create([
            'name'        => 'Eliminar product',
            'slug'        => 'products.destroy',
            'description' => 'Eloiminar cualquier product del sistema',
        ]);
    }
}
