<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'MaBaiViet',
        'MaNguoiDung',
        'NoiDung',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class, 'MaBaiViet');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'MaNguoiDung');
    }
}
