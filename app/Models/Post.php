<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "posts";

    protected $fillable = [
        'user_id','name','description','images','status'
    ];

    protected $casts = [
        'images' => 'json'
    ];

    public static function createUpdate($post, $request)
    {
        if(Auth::check()) {
            $post->user_id = Auth()->user()->id;
        }

        if(isset($request->name)){
            $post->name = $request->name;
        }

        if(isset($request->description)){
            $post->description = $request->description;
        }

        if(isset($request->images)){
            foreach($request->file('images') as $file){
                if($request->file('images')){
                    $name= $request->file('images');
                    $filename= time().'-'.$file->getClientOriginalName();
                    $file-> move(public_path('image/post'), $filename); 
                    $imgData[] = $filename;
                }
            }
            $post->images = $imgData;
        }

        if(isset($request->status)){
            $post->status = $request->status;
        }

        $post->save();
        return $post;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($user){
            if(Auth::check()){
                $user->created_by = Auth::user()->id;
            }
        });

        self::created(function ($user){
            //
        });

        self::updating(function ($user){
            if(Auth::check()){
                $user->updated_by = Auth::user()->id;
            }
        });

        self::updated(function ($user){
            //
        });

        self::deleted(function ($user) {
            $user->deleted_by = Auth::user()->id;
            $user->save();
        });
    }

    public function user()
    {
       return $this->belongsTo(User::class,'user_id');
    }
}
