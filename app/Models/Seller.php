<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Seller extends Model implements Authenticatable
{
    use HasApiTokens;
    protected $table = 'seller';
    protected $primaryKey = 'seller_id';

    function getAuthIdentifierName() {
        return 'seller_id';
    }
    public function getAuthIdentifier() {
        return $this->seller_id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    use HasFactory;
}
