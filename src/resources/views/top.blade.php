<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechNoviceLibrary</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="max-w-screen-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <div class="text-center">
                <img src="{{ asset('logo/logo.png') }}" class="w-48 mx-auto mb-4" alt="Logo">
                <h1 class="text-xl font-semibold">初心者エンジニア向けに選び抜いた、必読の技術書をご紹介</h1>
                <p class="text-gray-600">TechNoviceLibraryは、未経験エンジニア・新人エンジニアに読んで欲しい技術書を投稿し、紹介するサービスです</p>
            </div>
            <div class="mt-6 text-center">
                @if (Route::has('login'))
                @auth
                <a href="{{ url('/book') }}" class="text-blue-600 underline">技術書一覧</a>
                @else
                <a href="{{ route('login') }}" class="text-blue-600 underline">ログイン</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-blue-600 underline">新規登録</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </div>
</body>

</html>
