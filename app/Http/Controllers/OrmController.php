<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Seller;
use App\Models\Publication;
use App\Models\Coment;
use App\Models\Complaint;
use App\Models\Category;
use App\Models\Image;
use App\Models\ChatSupport;

class OrmController extends Controller
{
    // 1. Traer todos los usuarios con su rol y publicaciones
    public function usersRelations()
    {
        $users = User::with([
            'role',
            'coments',
            'complaints',
            'images',
            'publications' // publications_users pivot
        ])->get();

        return response()->json($users);
    }

    // 2. Traer todas las publicaciones con seller, categoría, comentarios e imágenes
    public function publicationsRelations()
    {
        $publications = Publication::with([
            'seller',
            'category',
            'coments.user',
            'complaints.user',
            'images'
        ])->get();

        return response()->json($publications);
    }

    // 3. Traer todos los sellers con sus publicaciones e imágenes
    public function sellersRelations()
    {
        $sellers = Seller::with([
            'publications.coments',
            'publications.complaints',
            'images'
        ])->get();

        return response()->json($sellers);
    }

    // 4. Traer todos los comentarios con su usuario y publicación
    public function comentsRelations()
    {
        $comments = Coment::with([
            'user',
            'publication'
        ])->get();

        return response()->json($comments);
    }

    // 5. Traer todas las quejas con usuario, publicación y reason
    public function complaintsRelations()
    {
        $complaints = Complaint::with([
            'user',
            'publication',
        ])->get();

        return response()->json($complaints);
    }

    // 6. Traer todos los chats con usuario
    public function chatSupportUsers()
    {
        $chats = ChatSupport::with('user')->get();
        return response()->json($chats);
    }

    // 7. Traer imágenes polimórficas de usuarios y sellers
    public function imagesRelations()
    {
        $images = Image::with('imageable')->get(); // imageable polimórfico
        return response()->json($images);
    }
}