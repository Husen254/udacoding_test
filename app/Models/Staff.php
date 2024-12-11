<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    protected $fillable = [
        'name',
        'id_library',
        'email',
        'password',
        'phone',
        'level',
        'alamat',
        'created_by',
    ];

    // Relationship to User who created the staff entry
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Automatically hash password when setting it
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
