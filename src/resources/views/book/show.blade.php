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
                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold">
                            {{ $book->title }}
                        </h1>
                        <hr class="w-full">
                    </div>
                    @if ($book->user_id === $user->id)
                        <div class="flex justify-end mt-4">
                            <a href="{{route('book.edit', $book)}}">
                                <x-primary-button class="bg-teal-700 float-right">編集</x-primary-button></a>
                            <form method="post" action="{{route('book.destroy', $book)}}">
                            @csrf
                            @method('delete')
                                <x-primary-button class="bg-red-700 float-right ml-4" onClick="return confirm('本当に削除しますか？');">削除</x-primary-button>
                            </form>
                        </div>
                    @endif
                    @if($book->image)
                    <img src="{{ asset('storage/images/'.$book->image)}}" class="mx-auto" style="height:300px;">
                    @endif
                    <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{{$book->description}}</p>
                    <p class="mt-4 text-gray-600 py-4 whitespace-pre-line">{{$book->url}}</p>
                    <div class="text-sm font-semibold flex flex-row-reverse">
                        <p> {{ $book->user->name }} • {{$book->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
