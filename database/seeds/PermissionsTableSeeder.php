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
            'type' => 'Usuario',
        ]);
        Permission::create([
        	'name'		  => 'Ver detalle de usuario',
        	'slug'		  => 'users.show',
        	'description' => 'Ver en detalle cada usuario del sistema',
            'type' => 'Usuario',
        ]);
        Permission::create([
            'name'        => 'Creación de usuario',
            'slug'        => 'users.create',
            'description' => 'Registrar cualquier dato de un usuario del sistema',
            'type' => 'Usuario',
        ]);
        Permission::create([
        	'name'		  => 'Editar de usuarios',
        	'slug'		  => 'users.edit',
        	'description' => 'Editar cualquier dato de un usuario del sistema',
            'type' => 'Usuario',
        ]);
        Permission::create([
        	'name'		  => 'Eliminar usuario',
        	'slug'		  => 'users.destroy',
        	'description' => 'Eliminar cualquier usuario del sistema',
            'type' => 'Usuario',
        ]);

        //Roles
        Permission::create([
        	'name'		  => 'Navegar roles',
        	'slug'		  => 'roles.index',
        	'description' => 'Lista y navega todos los roles del sistema',
            'type' => 'Roles',
        ]);
        Permission::create([
        	'name'		  => 'Ver detalle de rol',
        	'slug'		  => 'roles.show',
        	'description' => 'Ver en detalle cada rol del sistema',
            'type' => 'Roles',
        ]);
        Permission::create([
        	'name'		  => 'Creación de roles',
        	'slug'		  => 'roles.create',
        	'description' => 'Registrar cualquier dato de un rol del sistema',
            'type' => 'Roles',
        ]);
        Permission::create([
        	'name'		  => 'Editar de roles',
        	'slug'		  => 'roles.edit',
        	'description' => 'Editar cualquier dato de un rol del sistema',
            'type' => 'Roles',
        ]);
        Permission::create([
        	'name'		  => 'Eliminar rol',
        	'slug'		  => 'roles.destroy',
        	'description' => 'Eliminar cualquier rol del sistema',
            'type' => 'Roles',
        ]);

        //Category Products
        Permission::create([
            'name'        => 'Navegar categorias de productos',
            'slug'        => 'typepts.index',
            'description' => 'Lista y navega todos las categorias de productos del sistema',
            'type' => 'Categoria producto',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de categoria del producto',
            'slug'        => 'typepts.show',
            'description' => 'Ver en detalle cada categoria del producto del sistema',
            'type' => 'Categoria producto',
        ]);
        Permission::create([
            'name'        => 'Creación de categorias de productos',
            'slug'        => 'typepts.create',
            'description' => 'Registrar cualquier dato de una categoria de producto del sistema',
            'type' => 'Categoria producto',
        ]);
        Permission::create([
            'name'        => 'Editar de categorias de productos',
            'slug'        => 'typepts.edit',
            'description' => 'Editar cualquier dato de una categoria de producto del sistema',
            'type' => 'Categoria producto',
        ]);
        Permission::create([
            'name'        => 'Eliminar producto',
            'slug'        => 'typepts.destroy',
            'description' => 'Eliminar cualquier categoria de producto del sistema',
            'type' => 'Categoria producto',
        ]);

        //Products
        Permission::create([
            'name'        => 'Navegar productos',
            'slug'        => 'products.index',
            'description' => 'Lista y navega todos los productos del sistema',
            'type' => 'Producto',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de producto',
            'slug'        => 'products.show',
            'description' => 'Ver en detalle cada producto del sistema',
            'type' => 'Producto',
        ]);
        Permission::create([
            'name'        => 'Creación de productos',
            'slug'        => 'products.create',
            'description' => 'Registrar cualquier dato de un producto del sistema',
            'type' => 'Producto',
        ]);
        Permission::create([
            'name'        => 'Editar de productos',
            'slug'        => 'products.edit',
            'description' => 'Editar cualquier dato de un producto del sistema',
            'type' => 'Producto',
        ]);
        Permission::create([
            'name'        => 'Eliminar producto',
            'slug'        => 'products.destroy',
            'description' => 'Eliminar cualquier producto del sistema',
            'type' => 'Producto',
        ]);

        //Category Materials
        Permission::create([
            'name'        => 'Navegar categorias de materiales',
            'slug'        => 'typemats.index',
            'description' => 'Lista y navega todos las categorias de materiales del sistema',
            'type' => 'Categoria material',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de categoria del material',
            'slug'        => 'typemats.show',
            'description' => 'Ver en detalle cada categoria del material del sistema',
            'type' => 'Categoria material',
        ]);
        Permission::create([
            'name'        => 'Creación de categorias de materiales',
            'slug'        => 'typemats.create',
            'description' => 'Registrar cualquier dato de una categoria de material del sistema',
            'type' => 'Categoria material',
        ]);
        Permission::create([
            'name'        => 'Editar de categorias de materiales',
            'slug'        => 'typemats.edit',
            'description' => 'Editar cualquier dato de una categoria de material del sistema',
            'type' => 'Categoria material',
        ]);
        Permission::create([
            'name'        => 'Eliminar material',
            'slug'        => 'typemats.destroy',
            'description' => 'Eliminar cualquier categoria de material del sistema',
            'type' => 'Categoria material',
        ]);

        //Materials
        Permission::create([
            'name'        => 'Navegar materiales',
            'slug'        => 'materials.index',
            'description' => 'Lista y navega todos los materiales del sistema',
            'type' => 'Material',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de material',
            'slug'        => 'materials.show',
            'description' => 'Ver en detalle cada material del sistema',
            'type' => 'Material',
        ]);
        Permission::create([
            'name'        => 'Creación de materiales',
            'slug'        => 'materials.create',
            'description' => 'Registrar cualquier dato de un material del sistema',
            'type' => 'Material',
        ]);
        Permission::create([
            'name'        => 'Editar de materiales',
            'slug'        => 'materials.edit',
            'description' => 'Editar cualquier dato de un material del sistema',
            'type' => 'Material',
        ]);
        Permission::create([
            'name'        => 'Eliminar material',
            'slug'        => 'materials.destroy',
            'description' => 'Eliminar cualquier material del sistema',
            'type' => 'Material',
        ]);

        //Orderps
        Permission::create([
            'name'        => 'Navegar orden de producción',
            'slug'        => 'orderps.index',
            'description' => 'Lista y navega todas las orden de producción del sistema',
            'type' => 'Orden de producción',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de orden de producción',
            'slug'        => 'orderps.show',
            'description' => 'Ver en detalle cada orden de producción del sistema',
            'type' => 'Orden de producción',
        ]);
        Permission::create([
            'name'        => 'Creación de orden de producción',
            'slug'        => 'orderps.create',
            'description' => 'Registrar cualquier dato de orden de producción del sistema',
            'type' => 'Orden de producción',
        ]);
        Permission::create([
            'name'        => 'Editar de orden de producción',
            'slug'        => 'orderps.edit',
            'description' => 'Editar cualquier dato de orden de producción del sistema',
            'type' => 'Orden de producción',
        ]);
        Permission::create([
            'name'        => 'Eliminar orden de producción',
            'slug'        => 'orderps.destroy',
            'description' => 'Eliminar cualquier orden de producción del sistema',
            'type' => 'Orden de producción',
        ]);

        //Standard
        Permission::create([
            'name'        => 'Navegar estandares',
            'slug'        => 'standards.index',
            'description' => 'Lista y navega todos los estandares del sistema',
            'type' => 'Estandar',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de estandar',
            'slug'        => 'standards.show',
            'description' => 'Ver en detalle cada estandar del sistema',
            'type' => 'Estandar',
        ]);
        Permission::create([
            'name'        => 'Creación de estandares',
            'slug'        => 'standards.create',
            'description' => 'Registrar cualquier dato de un estandar del sistema',
            'type' => 'Estandar',
        ]);
        Permission::create([
            'name'        => 'Editar de estandares',
            'slug'        => 'standards.edit',
            'description' => 'Editar cualquier dato de un estandar del sistema',
            'type' => 'Estandar',
        ]);

        //Buyorder
        Permission::create([
            'name'        => 'Navegar ordenes de compra',
            'slug'        => 'buyorder_material.index',
            'description' => 'Lista y navega todos los ordenes de compra del sistema',
            'type' => 'Orden de compra',
        ]);
        Permission::create([
            'name'        => 'Ver detalle de orden de compra',
            'slug'        => 'buyorder_material.show',
            'description' => 'Ver en detalle cada orden de compra del sistema',
            'type' => 'Orden de compra',
        ]);
        Permission::create([
            'name'        => 'Creación de ordenes de compra',
            'slug'        => 'buyorder_material.create',
            'description' => 'Registrar cualquier dato de un orden de compra del sistema',
            'type' => 'Orden de compra',
        ]);
        Permission::create([
            'name'        => 'Editar de ordenes de compra',
            'slug'        => 'buyorder_material.edit',
            'description' => 'Editar cualquier dato de un orden de compra del sistema',
            'type' => 'Orden de compra',
        ]);
        Permission::create([
            'name'        => 'Imprimir orden de compra',
            'slug'        => 'buyorder_material.exportpdf',
            'description' => 'Exportar en PDF la orden de compra del sistema',
            'type' => 'Orden de compra',
        ]);
    }
}
