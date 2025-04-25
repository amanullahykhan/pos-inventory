use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Spatie\Permission\Models\Role;

Role::create(['name' => 'Admin']);
Role::create(['name' => 'Cashier']);
}

$user = User::find(1);
$user->assignRole('Admin');