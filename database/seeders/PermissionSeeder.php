<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Enums\Roles;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        app()[ \Spatie\Permission\PermissionRegistrar::class ]->forgetCachedPermissions();

        $access = config( 'permission.access' );

        foreach ( $access as $type ) {
            foreach ( $type as $permission ) {
                Permission::findOrCreate( $permission );
            }
        }

        // Customer
        if ( ! Role::where( 'name', Roles::CUSTOMER )->exists() ) {
            $role = Role::create( [ 'name' => Roles::CUSTOMER ] );
            $role->givePermissionTo( array_values( $access['account'] ) );
        }

        if (!Role::where('name', Roles::MODERATOR)->exists()) {
            $moderatorRoles = array_merge(
                array_values($access['categories']),
                array_values($access['products'])
            );
            $role = Role::create(['name' => Roles::MODERATOR])
                        ->givePermissionTo($moderatorRoles);
        }
        if (!Role::where('name', Roles::ADMIN)->exists()) {
            $role = Role::create(['name' => Roles::ADMIN]);
            $role->givePermissionTo(Permission::all());
        }
    }
}
