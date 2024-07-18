<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use app\Http\Request\NewsUpdateRequest;
use App\Models\News;
use Illuminate\Support\Facades\storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(News $model)
    {
        //
        return view('admin.news.index')->with('news' , $model->all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'address' => ['required' , 'string'] ,
            'content' => ['required' , 'max:2500'],
           // 'user_id' => ['required' , 'exists:users,id'],
            'img' => ['required' ,  'mimes:png,jpg']
        ]);

        News::create([
            'address' => $request->address ,
            'content' => $request->content ,
            'user_id' => Auth::user()->id ,
            'image' => $request->file('img')->store('admin' , 'public')
        ]);

        return redirect()->route('admin.news_1.index')->withSuccess(__('admin.created'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $news=news::find($id);

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'address' => ['required' , 'string'] ,
            'content' => ['required' , 'max:2500'],
            'img' => ['nullable' ,  'mimes:png,jpg']


        ]);

        $news=News::find($id);

        if(!$news)
        { return redirect()->route('admin.news_1.index')->withSuccess(__('admin.error','News not found.'));}

//تحديث بيانات الخبر
        $news->address = $request->input('address');
        $news->content = $request->input('content');

        if($request->hasfile('image'))
        {
//حذف الصورة القديمة اذا كانت موجودة
if($news->image)
{
    Storage::delete('app/public/' . $news->image); }

//رفع الصورة الجديدة
$imageName = time().'.'.$request->image->extension();
$request->image->store('app/public', $imageName);
$news->image =$imageName;

}
//حفظ التعديلات
$news->save();

       // $news->img = $request->input('img');
        return redirect()->route('admin.news_1.index')->withSuccess(__('admin.created'));



      /*  $request->validated();
        $image ='' ;
        $news=News::whereId(1)->first();
        if($request->img)
        {
            if($news->image) {
                unlink(storage_path('app/public/' . $news->image));
            }
            $image = $request->file('img')->store('admin' , 'public');
        }
        else{
            $image=$news->image;
        }

         News::whereId($id)->update([
            'address' => $request->address ,
            'content' => $request->content ,
            'user_id' => Auth::user()->id ,
            'image' => $image
        ]);

        return redirect()->route('admin.news_1.index')->withSuccess(__('admin.created'));

    */

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)//(News $news)
    {
        $news = News::findOrFail($id);
      //  $news=News::find($id);

        if(!$news)
        { return redirect()->route('admin.news_1.index')->withSuccess(__('admin.error','News not found.'));}

    if($news->image) {
        unlink(storage_path('app/public/' . $news->image));
    }
    $news->delete();
    return redirect()->route('admin.news_1.index')->withSuccess(__('admin.created'));








        //
       /* if($news->image) {
            unlink(storage_path('app/public/' . $news->image));
        }
        $news->delete();
        return redirect()->route('admin.news_1.index')->withSuccess(__('admin.created'));

    }*/
}
}
