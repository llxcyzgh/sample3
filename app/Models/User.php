<?php

namespace App\Models;

use App\Notifications\ResetPassword;
use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use function PHPSTORM_META\map;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    public function getImage()
    {
        // 0-9 ascii 48-57
        // A-Z ascii 65-90
        // a-z ascii 97-122
        // _ ascii  95 => 0
//        return ord(strtoupper($this->name[1]));
        $c = strtoupper($this->name[0]);

        $r   = ord(strtoupper($this->name[0]));
        $g   = ord(strtoupper($this->name[1]));
        $b   = ord(strtoupper($this->name[2]));
        $arr = [$r, $g, $b];
//        var_dump($arr);
        $arr   = array_map(function ($v) {
            if ($v >= 65 && $v <= 90) {
                $v = 10 + $v - 65 + 1;
            } elseif ($v >= 48 & $v <= 57) {
                $v = 0 + $v - 48 + 1;
            } elseif ($v == 95) {
                $v = 0;
            }
            $v = floor($v / 37 * 255);
            return $v;
        }, $arr);
        $color = 'rgb(' . join(",", $arr) . ')';
        $img   = <<<HEREDOC
<div class="text-center" style="background-color: $color;font-size: 50px;">
    $c
</div>
HEREDOC;
        return $img;
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    // 表明 Status 模型和本 User 模型的一对多关系
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function feed()
    {
        return $this->statuses()
            ->orderBy('created_at', 'desc');
//            ->paginate(10);
    }
}
