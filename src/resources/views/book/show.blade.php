<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細画面
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <div class="px-10 mt-4">
                <div class="bg-white rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold">
                            {{ $book->title }}
                        </h1>
                        <hr class="w-full border-gray-300 my-4">
                    </div>
                    @if ($book->user_id === $user->id)
                    <div class="flex justify-end mt-4">
                        <a href="{{ route('book.edit', $book) }}">
                            <x-primary-button class="bg-teal-700">編集</x-primary-button>
                        </a>
                        <form method="post" action="{{ route('book.destroy', $book) }}">
                            @csrf
                            @method('delete')
                            <x-primary-button class="bg-red-700 ml-4" onclick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                        </form>
                    </div>
                    @endif
                    @if($book->image)
                    <img src="{{ asset('storage/images/'.$book->image) }}" class="mx-auto my-4" style="height:300px;">
                    @endif
                    <div>
                        <h2 class="text-lg font-semibold">おすすめする理由</h2>
                        <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{{ $book->description }}</p>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold">URL</h2>
                        <a href="{{ $book->url }}" class="text-indigo-500 inline-flex items-center md:mb-3 lg:mb-0" target="_blank">{{ $book->url }}</a>
                    </div>
                    <div class="text-sm font-semibold flex justify-end">
                        <p>{{ $book->user->name }} • {{ $book->created_at->diffForHumans() }}</p>
                    </div>

                    <!-- いいねボタン -->
                    @if($bookmark)
                    <button class="bookmark bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="unbookmark('{{ $book->id }}')">
                        いいね解除！
                        <span class="badge">{{ $book->bookmarks->count() }}</span>
                    </button>
                    @else
                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="bookmark('{{ $book->id }}')">
                        いいね！
                        <span class="badge">{{ $book->bookmarks->count() }}</span>
                    </button>
                    @endif
                </div>
            </div>
        </div>

        <!-- コメント機能 start -->
        <div class="bg-white rounded-lg shadow-md mb-4 p-4">
            <form method="post" action="{{ route('comment.store') }}">
                @csrf
                <input type="hidden" name="book_id" value="{{ $book->id }}">
                <div class="mb-4">
                    <textarea name="body" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-200" rows="5" placeholder="コメントを入力する">{{ old('body') }}</textarea>
                </div>
                <div class="text-right">
                    <button type="submit" class="addcomment px-4 py-2 bg-indigo-500 text-white font-semibold rounded-md hover:bg-indigo-600">コメントする</button>
                </div>
            </form>
        </div>
        @if($book->comments->count() > 0)
        <div id="comment-data"></div>
        @foreach($comments as $comment)
        <div class="bg-white rounded-lg shadow-md mb-4 p-4">
            <div class="flex items-center mb-2">
                <span class="text-gray-700 font-semibold">{{ $comment->user->name ?? '削除されたユーザー' }}</span>
            </div>
            <div class="text-gray-800 mb-4">
                {{ $comment->body }}
            </div>
            <div class="text-gray-500 text-sm text-right">
                投稿日時 {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
        @endforeach
        @else
        <div class="bg-white rounded-lg shadow-md p-4">
            <p class="text-gray-700">コメントはまだありません。</p>
        </div>
        @endif
        <!-- コメント機能 end -->

    </div>
</x-app-layout>
