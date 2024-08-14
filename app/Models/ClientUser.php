<?php
// app/Models/ClientUser.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUser extends Model
{
    use HasFactory;

    protected $table = 'client_users'; // Specify the table name

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'designation',
        'doj',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
