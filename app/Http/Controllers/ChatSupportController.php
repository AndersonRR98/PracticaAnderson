<?php

namespace App\Http\Controllers;

use App\Models\ChatSupport;
use App\Http\Requests\StoreChatsSupportRequest;
use App\Http\Requests\UpdateChatsSupportRequest;
use Illuminate\Http\Request;

class ChatSupportController extends Controller
{
    public function index()
    {
        $chatsupport = ChatSupport:: //with('users','category'->)
         included()
        ->filter()
        ->sort()
        ->getOrPaginate();
        return response()->json($chatsupport);
        
    }

    public function store(Request $request)
    {
               $request->validate([
            'mensaje' => 'required|string|max:255',
            'fecha_mensaje' => 'required|date',
            'atendido' => 'required|integer',
            'user_id' => 'required|exists:users,id'     ]);

        $chatsupport = ChatSupport::create($request->all());
        return response()->json($chatsupport, 201);
    }

   public function show($id)
    {
        $chatsupport = ChatSupport::with(['user'])->findOrFail($id);
        return response()->json($chatsupport);
    }

    public function update(Request $request, ChatSupport $chatsupport)
    {
          $request->validate([
            'mensaje' => 'required|string|max:255',
            'fecha_mensaje' => 'required|date',
            'atendido' => 'required|integer',
            'user_id' => 'required|exists:users,id'         
        ]);

        $chatsupport->update($request->all());
        return response()->json($chatsupport);
        
    }

    public function destroy(ChatSupport $chatsupport)
    {
        $chatsupport->delete();
        return response()->json(['message' => 'Deleted successfully']);
        
    }
}
