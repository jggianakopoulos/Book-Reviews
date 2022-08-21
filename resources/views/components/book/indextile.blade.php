<div class="xl:w-1/4 md:w-1/2 p-4">
    <a href="/book/show/{{$book->id}}">

        <div class="bg-gray-100 p-6 rounded-lg">
            @unless($book->cover == "")
                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/'  . $book->cover) }}" alt="content">
            @endif
            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{$book->author}}</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{$book->title}}</h2>
            <p class="leading-relaxed text-base">
                @if (strlen($book->description) > 100)
                    {{substr($book->description, 0, 100) . "..."}}
                @else
                    {{$book->description}}
                @endif
            </p>
        </div>
    </a>
</div>
