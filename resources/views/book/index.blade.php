<x-frame>
    <form action="">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
            </div>
            <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" placeholder="Search Books..."/>
            <div class="absolute top-2 right-2">
                <button type="submit" class="h-10 w-20 text-white rounded-lg bg-gray-500 hover:bg-gray-600">Search</button>
            </div>
        </div>
    </form>
        @unless(count($books) == 0)
        <div class="flex flex-wrap -m-4">

        @foreach($books as $book)
            <x-book.indextile :book="$book" />
        @endforeach
        </div>

        <div class="mt-6 p-4">
                {{$books->links()}}
            </div>
        @else
            <div>No books added</div>
        @endunless
</x-frame>

