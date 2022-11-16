<x-layout>
    <x-slot name="title"><title>Blogs</title></x-slot>
        @foreach($blogs as $blog)
        <div>
            <h1><a href="blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
            <p><a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
            <div>
                <h4>Author -<a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></h4>
                <p>published at ->{{$blog->created_at->diffForHumans()}}</p>
                <p>{{$blog->intro}}</p>
            </div>
        </div>
        @endforeach
</x-layout>