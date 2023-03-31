<div>
    @if ($posts->count())
                
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show',['post'=>$post, 'user'=>$post->user]) }}">
                        <img src="{{asset('uploads').'/'. $post->image}}" alt="Image post {{$post->title}}">
                    </a>
                    <div class="font-bold">
                        <a href="{{route('posts.index', $post->user)}}">{{$post->user->username}}</a>
                        <p>{{$post->likes->count()}} Likes</p>
                        <p class="text-sm text-gray-500">
                            {{$post->created_at-> diffForHumans()}}
                        </p>
                        <p class="mt-5">
                            {{$post->description}}
                        </p>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="my-10">
            {{$posts->links('')}}
        </div>

    @else
        <p class="text-gray-700 uppercase text-sm text-center font-bold">0 Posts</p>
    @endif
</div>