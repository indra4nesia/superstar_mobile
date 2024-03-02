<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model {
  protected $table = 'members';
  protected $fillable = ['nama', 'email', 'password'];
}
