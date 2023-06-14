<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            技術書の新規登録
        </h2>

        <!-- バリデーションエラー時のメッセージ -->
        <x-validation-errors class="mb-4" :errors="$errors" />

        <!-- 投稿成功時のメッセージ -->
        <x-message :message="session('message')" />
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-4 sm:p-8">
            <form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="md:flex items-center mt-8">
                    <div class="w-full flex flex-col">
                        <label for="title" class="font-semibold leading-none mt-4">タイトル</label>
                        <input type="text" name="title" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="title" value="{{old('title')}}" placeholder="本のタイトルを入力してください">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="description" class="font-semibold leading-none mt-4">説明</label>
                    <textarea name="description" class="w-auto py-2 border border-gray-300 rounded-md" id="body" cols="30" rows="10" placeholder="おすすめする理由を入力してください">{{old('description')}}</textarea>
                </div>

                <div class="w-full flex flex-col">
                    <label for="image" class="font-semibold leading-none mt-4">画像 （3MBまで） </label>
                    <div>
                        <input id="image" type="file" name="image">
                    </div>
                </div>

                <div class="w-full flex flex-col">
                    <label for="url" class="font-semibold leading-none mt-4">URL</label>
                    <input type="text" name="url" class="w-auto py-2 placeholder-gray-300 border border-gray-300 rounded-md" id="url" placeholder="ショッピングサイトのURLを入力してください（任意）">
                </div>

                <x-primary-button class="mt-4">
                    投稿
                </x-primary-button>

            </form>
        </div>
    </div>
</x-app-layout>
