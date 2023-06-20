<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            タグ一覧
        </h2>
        <x-message :message="session('message')" />
    </x-slot>

    <div class="mt-8">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-3 px-6 bg-gray-100 border-b">タグ名</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lists as $list)
                <tr>
                    <td class="py-4 px-6 border-b">{{$list->name}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-8 text-center">
        <a class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600" href="{{url('/tag/download')}}" target="_blank">Download CSV</a>
    </div>
    <div class="mt-6 mb-10">
        {{ $lists->links('vendor.pagination.tailwind2') }}
    </div>
</x-app-layout>
