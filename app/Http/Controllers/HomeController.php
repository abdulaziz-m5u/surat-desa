<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Mail\AdminMail;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\LetterRequest;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Admin\StoreLetterRequest;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();

        return view('welcome', compact('categories'));
    }

    public function store(LetterRequest $request){
        if($request->validated()) {
            $image = $request->file('file_lampiran')->store(
                'images', 'public'
            );
            $letters = Letter::create($request->except('file_lampiran') + [ 'file_lampiran' => $image ]);

            Mail::to('hello@example.com')->send(new AdminMail($letters));          
        }

        return redirect()->back()->with([
            'message' => 'Berkas anda berhasil di kirim silahkan tunggu kami akan menghubungi anda dalam waktu 1 x 24 jam',
            'alert-type' => 'success'
        ]);
    }   

    public function detail($id)
    {
        $category = Category::findOrFail($id);
        
        return view('detail', compact('category'));
    }
}
