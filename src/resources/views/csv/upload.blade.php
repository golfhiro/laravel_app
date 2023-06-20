<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-4">CSV インポート</h1>
    <form action="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="flex mb-4">
            <label class="w-1/6 flex items-center justify-end pr-2" for="customFile">File:</label>
            <div class="w-5/6">
                <div class="flex">
                    <label class="custom-file-label flex-1 border border-gray-300 rounded px-3 py-2 text-gray-700 bg-white cursor-pointer" for="customFile" data-browse="参照">ファイル選択...</label>
                    <input type="file" name="csv" class="hidden">
                </div>
            </div>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white font-semibold py-2 px-4 rounded hover:bg-green-600">送信</button>
    </form>
</div>

@if(Session::has('flashmessage'))
<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('#myModal').modal('show');
    });
</script>
<!-- モーダルウィンドウの中身 -->
<div class="modal fixed inset-0 flex items-center justify-center" id="myModal" tabindex="-1" role="dialog" aria-labelledby="label1" aria-hidden="true">
    <div class="modal-dialog bg-white w-1/2 rounded-lg" role="document">
        <div class="modal-content p-4">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                {{ session('flashmessage') }}
            </div>
            <div class="modal-footer text-center">
            </div>
        </div>
    </div>
</div>
@endif
