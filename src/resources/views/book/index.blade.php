<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の一覧
        </h2>

        <x-message :message="session('message')" />

    </x-slot>

    {{-- 投稿一覧表示用のコード --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($books as $book)
        <div class="mx-4 sm:p-8">
            <div class="mt-4">
                <div class="bg-white w-full  rounded-2xl px-10 py-8 shadow-lg hover:shadow-2xl transition duration-500">
                    <div class="mt-4">
                        <h1 class="text-lg text-gray-700 font-semibold hover:underline cursor-pointer float-left pt-4">
                            <a href="{{route('book.show', $book)}}">{{ $book->title }}</a>
                        </h1>
                        <hr class="w-full">
                        <hr class="w-full">
                        @if($book->image)
                        <img src="{{ asset('storage/images/'.$book->image)}}" class="mx-auto" style="height:300px;">
                        @endif
                        <p class="mt-4 text-gray-600 py-4">{{$book->description}}</p>
                        <p class="mt-4 text-gray-600 py-4">{{$book->url}}</p>
                        <div class="text-sm font-semibold flex flex-row-reverse">
                            <p> {{ $book->user->name }} • {{$book->created_at->format('Y年m月d日')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
