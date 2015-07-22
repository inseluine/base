<?php
$baseTime = microtime(true);

$c = new fifth;
$c->execute();

class fifth {
    //標準入力読み込み
    public function __construct() {
        $this->id = 0;
        list($this->height, $this->width) = explode(' ', $this->getStdin());
        for ($i = 0; $i < $this->height; $i++) {
            $this->lines[] = $this->getStdin();
        }
    }

    //実行
    public function execute() {
        $poolCount = 0;
        $this->previousPools = null;
        $this->currentPools = null;

        foreach ($this->lines as $line) {
            //getPools 1行毎に水たまりグループにIDとフィルターを取得
            $this->currentPools = $this->getPools($line);
            //取得行と、前行を結合と比較
            //結合無しの水たまりグループ総数を返り値とする
            $poolCount += $this->unionPools();
            $this->previousPools = $this->currentPools;
        }
        //最終行残りの水たまりをカウント
        $poolCount += count($this->currentPools);
        echo $poolCount, "\n";
    }

    //1行毎の水たまりグループにIDを割り当て、2進数で見た時の値を取得
    // .w.www ならば 010000 と 000111 と割り振る
    protected function getPools($line) {
        $result = array();
        $pos = 0;
        $len = 1;
        $previous = null;
        $current = 0;

        for ($i = 0; $i < $this->width; $i++) {
            $current = substr($line, $i, 1);

            switch ($current) {
                case 'w':
                    if ($previous == 'w') { $len++; break;}
                    if ($previous == '.') {
                        $pos = $i;
                        $len = 1;
                    }
                    break;
                case '.':
                    if ($previous == 'w') {
                        $result[] = array('id' => $this->getId(), 'bin' => $this->toBin($pos, $len));
                        $pos = null; $len = null;
                    }
                    break;
                default:
                    echo 'error', $previous, $current, $i;exit;; 
            }
            $previous = $current;
        }
        //行末で'w'の場合登録
        if ($current == 'w') {
            $result[] = array('id' => $this->getId(), 'bin' => $this->toBin($pos, $len));
        }
        return $result;
    }

    protected function toBin($pos, $len) {
        for ($i = 0, $bin = 0; $i < $len; $i++) {
            $bin += pow(2, $this->width - 1 - $pos - $i);
        }
        return $bin;
    }

    //水たまりの結合
    //前行の水たまりと現在行の水たまりを総当り(IDを書き換えるため総当り)
    //結合出来なかった水たまり総数をカウント
    public function unionPools() {
        $unsetPreviousKeys = array();
        if (! is_array($this->previousPools)) return 0;
        foreach ($this->currentPools as $currentKey => $currentPool) {
            $cBin = $currentPool['bin'];
            foreach ($this->previousPools as $previousKey => $previousPool) {
                $pBin = $previousPool['bin'];
                if (($cBin & $pBin) || ($cBin << 1 & $pBin) || ($cBin >> 1 & $pBin)) {
                    //結合した場合IDを若い方で書換
                    $this->currentPools[$currentKey]['id'] = min($this->currentPools[$currentKey]['id'], $this->previousPools[$previousKey]['id']);
                    $this->previousPools[$previousKey]['id'] = min($this->currentPools[$currentKey]['id'], $this->previousPools[$previousKey]['id']);
                    $unsetPreviousKeys[] = $previousKey;
                }
            }
        }
        //前行の結合済み水たまりを削除
        $unsetPreviousKeys = array_unique($unsetPreviousKeys);
        foreach($unsetPreviousKeys as $key) {
            unset($this->previousPools[$key]);
        }
        //前行の結合していない水たまりで、現在行の水たまりの同IDを持つ場合は、削除
        foreach($this->previousPools as $previousKey => $previousPool) {
            foreach ($this->currentPools as $currentPool) {
                if ($previousPool['id'] == $currentPool['id']) {
                    unset($this->previousPools[$previousKey]);
                }
            }
        }
        //削除されていない(結合されていない、且つ現在行の水たまりと繋がっていない)ものをカウント
        return count($this->previousPools);
    }

    protected function getId() {
        return $this->id++;
    }

    public function getStdin() {
        return trim(fgets(STDIN));
    }

}
$maxMemoryUsage = memory_get_peak_usage() / (1024 * 1024);
$processTime = microtime(true) - $baseTime;

printf("Max Memory Usage : %.3f [MB]\n", $maxMemoryUsage);
printf("Process Time : %.2f [s]\n", $processTime);
