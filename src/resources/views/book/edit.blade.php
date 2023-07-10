<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class=" font-semibold text-xl text-gray-800 leading-tight">編集画面</h2>
            </div>
            <div class="mx-auto message">
                <x-message :message="session('message')" />
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('book.update', $book)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">タイトル</label>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{old('title', $book->title)}}">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="description" class="font-semibold leading-none mt-4">説明</label>
                    <textarea name="description" class="w-auto py-2 border border-gray-300 rounded-md" id="description" cols="30" rows="10">{{old('description', $book->description)}}</textarea>
                </div>

                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="technology_tags" class="font-semibold leading-none mt-4">技術タグ（タグの間は半角空白スペースを空けるようにしてください 例: php laravel）</label>
                        <input type="text" name="technology_tags" class="w-auto py-2 border border-gray-300 rounded-md" id="technology_tags" value="{{ old('technology_tags', $book->technology_tags->pluck('name')->implode(' ')) }}">
                    </div>
                </div>

                <div class="w-full flex flex-col mt-10">
                    @if($book->image)
                    <img src="{{ asset('storage/images/'.$book->image)}}" class="mx-auto" style="height:300px;">
                    @endif

                    <label for="image" class="font-semibold leading-none mt-4">画像 （3MBまで）（任意）</label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="url" class="font-semibold leading-none mt-4">URL</label>
                        <input type="text" name="url" class="w-auto py-2 border border-gray-300 rounded-md" id="url" value="{{old('url', $book->url)}}">
                    </div>
                </div>

                <x-primary-button class="mt-4">
                    変更する
                </x-primary-button>

            </form>
        </div>
    </div>

</x-app-layout>
