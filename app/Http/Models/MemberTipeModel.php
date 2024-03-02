<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class MemberTipeModel extends Model {
  protected $table = 'tipe_member';
  protected $fillable = ['nama', 'email', 'password'];
}
