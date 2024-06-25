<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        // return Chat::all();
        $chats = Chat::latest()->get();
        return response()->json($chats);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        return Chat::create($request->all());
    }

    public function destroy($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->delete();

        // return response()->json(null, 204);
        return response()->json(['message' => 'Message deleted successfully']);
    }
    public function like($id)
    {
        $chat = Chat::findOrFail($id);
        $chat->likes += 1; // Misalnya, kita tambahkan jumlah likes
        $chat->save();

        return response()->json(['likes' => $chat->likes]);
    }
}
