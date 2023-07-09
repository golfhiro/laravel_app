$(document).on('click', '.addcomment', function(e){
    e.preventDefault();  // 通常のフォーム送信（ページのリロード）をキャンセル

    let form = $(this).closest('form'); // このボタンが所属するフォーム要素を取得
    let url = form.attr('action'); //送信先URLを取得

    $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(),  // フォーム内のデータを送信
        dataType: 'json',  // 応答としてJSONを期待
        success: function () {
          location.reload();
        },
        error: function (data) {
          alert('コメントの追加が失敗しました: ' + data.body);
          console.log('Error:', data);
        }
    });
});
