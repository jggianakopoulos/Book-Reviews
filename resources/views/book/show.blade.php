<x-frame>
    <x-book.bookheader :book="$book"/>
    <nav class="mx-auto flex flex-wrap items-center text-base justify-center">
        <button class="mx-2 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"><a href="/bookreview/showAll/{{$book->id}}">See User Reviews</a></button>

        @auth
            <button class="mx-2 inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0"><a href="/bookreview/review/{{$book->id}}">
                    @if (is_null($bookreview))
                        <span>Write a Review</span>
                    @else
                        <span>Edit your Review</span>
                    @endif
                </a></button>
            @unless (is_null($bookreview))
                <form class="my-0 inline" method="POST" action="/bookreview/remove/{{$book->id}}">
                    <button class="mx-2 bg-red-400 inline-flex items-center border-0 py-1 px-3 focus:outline-none hover:bg-red-300 rounded text-base mt-4 md:mt-0">
                            @csrf
                            <span>Delete Your Review</span>
                    </button>
                </form>
            @endif
        @endauth
    </nav>
    <p class="mb-8 m-5 leading-relaxed">{{$book->description}}</p>
</x-frame>


