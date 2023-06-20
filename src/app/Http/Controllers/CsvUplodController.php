<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;


class CsvUplodController extends Controller
{
    public function index()
    {
        return view('csv.upload');
    }

    public function upload_regist(Request $rq)
    {
        if ($rq->hasFile('csv') && $rq->file('csv')->isValid()) {
            // CSV ファイル保存
            $tmpname = uniqid("CSVUP_") . "." . $rq->file('csv')->guessExtension(); //TMPファイル名
            $rq->file('csv')->move(public_path() . "/csv/tmp", $tmpname);
            $tmppath = public_path() . "/csv/tmp/" . $tmpname;

            // Goodby CSVの設定
            $config_in = new LexerConfig();
            $config_in
                ->setFromCharset("SJIS-win")
                ->setToCharset("UTF-8") // CharasetをUTF-8に変換
                ->setIgnoreHeaderLine(true) //CSVのヘッダーを無視
            ;
            $lexer_in = new Lexer($config_in);

            $datalist = array();

            $interpreter = new Interpreter();
            $interpreter->addObserver(function (array $row) use (&$datalist) {
                // 各列のデータを取得
                $datalist[] = $row;
            });

            // CSVデータをパース
            $lexer_in->parse($tmppath, $interpreter);

            // TMPファイル削除
            unlink($tmppath);

            // 処理
            foreach ($datalist as $row) {
                // 各データ取り出し
                $csv_tag = $this->get_csv_tag($row);

                // DBへの登録
                $this->regist_tag_csv($csv_tag);
            }
            return redirect('/csv/upload')->with('flashmessage', 'CSVのデータを読み込みました。');
        }
        return redirect('/csv/upload')->with('flashmessage', 'CSVの送信エラーが発生しましたので、送信を中止しました。');
    }

    private function get_csv_tag($row)
    {
        $tag = array(
            'name' => $row[0],
        );
        return $tag;
    }

    private function regist_tag_csv($tag)
    {
        $newtag = new \App\Models\Tag;
        foreach ($tag as $key => $value) {
            $newtag->$key = $value;
        }
        $newtag->save();
    }
}
