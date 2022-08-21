@unless ($book->cover == "")
    <img class="mx-auto lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="cover" src="{{ asset('/storage/'  . $book->cover) }}">
@endif
<div class="text-center mx-auto lg:w-2/3 w-full">
    <a href="/book/show/{{$book->id}}">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{$book->title}}</h1>
    </a>
    <h3 class="title-font sm:text-2xl text-1xl mb-4 font-medium text-gray-900">{{$book->author}}</h3>
    @unless(is_null($book->average_rating))
    <h4 class="title-font mb-4 font-medium text-gray-900">Average Rating: {{$book->average_rating}}/10</h4>
@endif
</div>
