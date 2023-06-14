<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿の編集画面
        </h2>

        <x-validation-errors class="mb-4" :errors="$errors" />
        <x-message :message="session('message')" />

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="post" action="{{route('book.update', $book)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="body" class="font-semibold leading-none mt-4">タイトル</label>
                        <input type="text" name="title" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{old('title', $book->title)}}" placeholder="Enter Title">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="description" class="font-semibold leading-none mt-4">説明</label>
                    <textarea name="description" class="w-auto py-2 border border-gray-300 rounded-md" id="description" cols="30" rows="10">{{old('description', $book->description)}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    @if($book->image)
                    <img src="{{ asset('storage/images/'.$book->image)}}" class="mx-auto" style="height:300px;">
                    @endif

                    <label for="image" class="font-semibold leading-none mt-4">画像 （3MBまで）</label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <x-primary-button class="mt-4">
                    更新する
                </x-primary-button>

            </form>
        </div>
    </div>

</x-app-layout>
