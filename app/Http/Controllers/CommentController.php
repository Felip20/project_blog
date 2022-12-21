<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Mail\SubscriberMail;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog)
    {
        request()->validate([
            'comment'=>'required|min:10'
        ]);
        
        $blog->comments()->create([
            'body'=>request('comment'),
            'user_id'=>auth()->id(),
        ]);

        $subscribers = $blog->subscribers->filter(fn($subscriber)=> $subscriber->id !== auth()->id());

        $subscribers->each(function($subscriber) use($blog){
            Mail::to($subscriber->email)->queue(new SubscriberMail($blog));
        });

        return redirect('/blogs/'.$blog->slug);

    }
}
