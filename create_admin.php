<?php

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Znajdź rolę 'admin'
$adminRole = Role::where('name', 'admin')->first();

// Stwórz użytkownika administratora
User::create([
    'name' => 'admin',
    'email' => 'admin@admin.com',
    'password' => Hash::make('s9Q.iU6_RQj6_KT'),
    'role_id' => $adminRole->id,
]);

echo "Admin user created successfully.\n";
