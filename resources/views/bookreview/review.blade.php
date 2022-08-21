<x-frame>
    <x-book.bookheader :book="$book"/>
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <form method="POST" action="/bookreview/save/{{$book->id}}" enctype="multipart/form-data" class="flex flex-wrap -m-2">
            @csrf
            <div class="p-2 w-1/2">
                <div class="relative">
                    <label for="rating" class="leading-7 text-sm text-gray-600">Rating (out of 10)</label>
                    <input type="text" id="rating" name="rating" value="{{ old('rating') ?? is_null($bookreview) ? "" : $bookreview->rating }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                @error('rating')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="p-2 w-full">
                <div class="relative">
                    <label for="review" class="leading-7 text-sm text-gray-600">Review</label>
                    <textarea id="review" name="review" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{old('review') ?? is_null($bookreview) ? "" : $bookreview->review }}</textarea>
                </div>
                @error('review')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="p-2 w-full">
                <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save Review</button>
            </div>
        </form>
    </div>
</x-frame>
