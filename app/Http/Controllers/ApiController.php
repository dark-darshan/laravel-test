<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function softDelete()
    {
        $deletedCount = Post::onlyTrashed()->forceDelete();

        if ($deletedCount > 0) {
            return response()->json(['message' => 'Posts soft deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'No posts were soft deleted'], 400);
        }
    }
}
