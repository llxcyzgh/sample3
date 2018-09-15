<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable=['content'];

    // 表明该 Status 模型和 User 模型的一对多关系
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
