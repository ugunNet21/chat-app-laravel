<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $table = 'chats';
    protected $fillable = ['user', 'message','likes'];

    public function deleteMessage($id)
    {
        return $this->findOrFail($id)->delete();
    }
}
