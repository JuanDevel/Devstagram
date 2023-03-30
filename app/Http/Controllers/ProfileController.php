<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);
        
        $this->validate($request,[
            'username' => ['required','unique:users,username,'.auth()->user()->id, 'min:3','max:20', 'not_in:edit-profile'],
            'email' => ['required', 'unique:users,email,'.auth()->user()->id, 'email', 'max:60'],
        ]);



        if($request->image){
            $image = $request->file('image');

            $nameImage = Str::uuid().".".$image->extension();
    
            $imageServidor = Image::make($image);
            $imageServidor->fit(1000,1000);
    
            $imagePath = public_path('profiles').'/'.$nameImage;
            $imageServidor->save($imagePath);
        }

        // guardar cambios
        $user = User::find(auth()->user()->id);
        $user->username = $request->username;
        $user->email = $request->email;
        $user->image = $nameImage ?? auth()->user()->image ?? null;
        $user->save();

        // redireccionar al usuario

        return redirect()->route('posts.index', $user->username);
        
    }
}
