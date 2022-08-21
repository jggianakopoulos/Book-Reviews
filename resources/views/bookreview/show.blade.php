<x-frame>
    <x-book.bookheader :book="$book" />
    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$user->username}}</h1>
        <p class="leading-relaxed">{{$bookreview->rating}}/10</p>
        <p class="leading-relaxed">{{$bookreview->review}}</p>

    </div>
</x-frame>
