<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news, 200);
    }



    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'address' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['string','nullable'],
            'user_id' => ['required', 'exists:users,id'],
        ]);


        $news = News::create($validatedData);

        return response()->json([
            'message' => 'News created successfully!',
            'reservation' => $news,
        ], 201);
    }





    public function show($id)
    {
        $news = News::findOrFail($id);
        return $news;
    }





    public function update(Request $request, $id)
    {


        $validatedData = $request->validate([
            'address' => ['required', 'string'],
            'content' => ['required', 'string'],
            'image' => ['string','nullable'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $news = News::findOrFail($id);
        $news->update($validatedData);

        return response()->json([
            'message' => 'News updated successfully!',
            'reservation' => $news,
        ], 201);
    }





    public function destroy($id)
    {

        $news = News::findOrFail($id);
        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully!',
        ]);
    }
}
