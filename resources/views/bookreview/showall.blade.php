<x-frame>
    <x-book.bookheader :book="$book"/>
    <div>
        @unless (count($bookReviews) == 0)
            <div class="-my-8 divide-y-2 divide-gray-100">
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                    <div class="md:flex-grow">
                        <p class="leading-relaxed">Review</p>
                    </div>
                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                        <span class="font-semibold title-font text-gray-700">Rating</span>
                    </div>
                </div>

            </div>

            @foreach($bookReviews as $review)
                <x-bookreview.reviewtile :review="$review" />
            @endforeach

            <div class="mt-6 p-4">
                <?php echo ($bookReviews->links()); ?>
            </div>
        @else
            <div class="text-center">This book hasn't been reviewed yet.</div>
        @endif
    </div>
</x-frame>
