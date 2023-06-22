<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            技術本一覧
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form method="GET" action="{{ url()->current() }}" class="flex items-center mt-10">
            <input type="search" placeholder="本のタイトルを入力" name="search" value="@if (isset($search)) {{ $search }} @endif" class="border border-gray-300 rounded-l-md px-4 py-2 focus:outline-none focus:ring focus:border-blue-500 w-5/6">
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-r-md ml-2">検索</button>
            </div>
            <div>
                <button>
                    <a href="{{ route('book.index') }}" class="text-gray-600 ml-2 hover:underline">クリア</a>
                </button>
            </div>
        </form>

        <div class="mt-10 grid grid-cols-2 gap-8">
            @foreach ($books as $book)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-500">
                <div class="p-8">
                    <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer">
                        <a href="{{ route('book.show', $book) }}">{{ $book->title }}</a>
                    </h1>
                    <hr class="my-4">
                    <div class="text-right">
                        <span class="inline-block bg-violet-600 text-white text-sm font-bold px-2 py-1 rounded-full">{{ $book->tag->name }}</span>
                    </div>
                    @if($book->image)
                    <img src="{{ asset('storage/images/'.$book->image) }}" class="mx-auto my-6" style="height:300px;">
                    @endif
                    <div class="text-sm font-semibold flex justify-end">
                        <p>{{ $book->user->name }} • {{ $book->created_at->format('Y年m月d日') }}</p>
                    </div>
                    <span class="badge"> {{ $book->bookmarks->count() }} いいね</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 mb-10">
            {{ $books->links('vendor.pagination.tailwind2') }}
        </div>
    </div>
</x-app-layout>
