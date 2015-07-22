<?php
$B015 = new SegmentClass();
echo ($B015->isNormalPosition() == true) ? ("Yes\n") : ("No\n");
echo ($B015->isSymmetryPosition() == true) ? ("Yes\n") : ("No\n");
echo ($B015->isRotatePosition() == true) ? ("Yes\n") : ("No\n");

class SegmentClass
{
    protected $defaultSeg = array();

    protected  $baseSegs = array(
        '0' =>  array('1', '1', '1', '1', '1', '1', '0'),
        '1' =>  array('0', '1', '1', '0', '0', '0', '0'),
        '2' =>  array('1', '1', '0', '1', '1', '0', '1'),
        '3' =>  array('1', '1', '1', '1', '0', '0', '1'),
        '4' =>  array('0', '1', '1', '0', '0', '1', '1'),
        '5' =>  array('1', '0', '1', '1', '0', '1', '1'),
        '6' =>  array('1', '0', '1', '1', '1', '1', '1'),
        '7' =>  array('1', '1', '1', '0', '0', '1', '0'),
        '8' =>  array('1', '1', '1', '1', '1', '1', '1'),
        '9' =>  array('1', '1', '1', '1', '0', '1', '1'),
    );

    public $resultFlag = array(
        'normal'  => array('A' => 0, 'B' => 0),
        'symmetry' => array('A' => 1, 'B' => 0),
        'rotate'   => array('A' => 0, 'B' => 0),
    );

    private function __construct()
    {
        $this->defaultSeg['A'] = explode(' ', $this->getStdin());
        $this->defaultSeg['B'] = explode(' ', $this->getStdin());
    }

    }



    public function setResultFlag($form, $baseSegment)
    {
            $compareSegmentName = "user".ucfirst($form)."Segments";
            if ($baseSegment == $this->{$compareSegmentName}['A']) {
                $this->resultFlag[$form]['A'] = 1;
            }

            if ($baseSegment == $this->{$compareSegmentName}['B']) {
                $this->resultFlag[$form]['B'] = 1;
            }
    }


    protected function generateSymmetryPosition()
    {
        $this->changeSegments('Symmetry', 'Default', 'A', '0', 'B', '0');
        $this->changeSegments('Symmetry', 'Default', 'A', '5', 'B', '1');
        $this->changeSegments('Symmetry', 'Default', 'A', '4', 'B', '2');
        $this->changeSegments('Symmetry', 'Default', 'A', '3', 'B', '3');
        $this->changeSegments('Symmetry', 'Default', 'A', '1', 'B', '5');
        $this->changeSegments('Symmetry', 'Default', 'A', '2', 'B', '4');
        $this->changeSegments('Symmetry', 'Default', 'A', '6', 'B', '6');
    }

    protected function generateRotatePosition()
    {
        $this->changeSegments('Rotate', 'Default', 'A', '0', 'B', '3');
        $this->changeSegments('Rotate', 'Default', 'A', '1', 'B', '4');
        $this->changeSegments('Rotate', 'Default', 'A', '2', 'B', '5');
        $this->changeSegments('Rotate', 'Default', 'A', '3', 'B', '0');
        $this->changeSegments('Rotate', 'Default', 'A', '4', 'B', '1');
        $this->changeSegments('Rotate', 'Default', 'A', '5', 'B', '2');
        $this->changeSegments('Rotate', 'Default', 'A', '6', 'B', '6');
    }

    protected function changeSegments($change, $base, $segA, $numA, $segB, $numB)
    {
        $changeSegName = "user" . $change . "Segments";
        $baseSegName = "user" . $base . "Segments";

        $this->{$changeSegName}[$segA][$numA] = $this->{$baseSegName}[$segB][$numB];
        $this->{$changeSegName}[$segB][$numB] = $this->{$baseSegName}[$segA][$numA];
    }


    
    protected function getStdin()
    {
        return trim(fgets(STDIN));
    }
}

class NormalClass extends SegmentClass
{
    public function __construct()
    {
    }

    public function isNormalPosition()
    {
        foreach ($this->baseSegments as $baseSegment) {
            $this->setResultFlag('default', $baseSegment);
            if ($this->resultFlag['default']['A'] == 1 && $this->resultFlag['default']['B'] == 1) {
                    return true;
            }
        }
        return false;
    }
}

class SymmetryClass extends SegmentClass
{
    public function __construct()
    {

    }

    public function isSymmetryPosition()
    {
        $this->generateSymmetryPosition();
        foreach ($this->baseSegments as $baseSegment) {
            $this->setResultFlag('symmetry', $baseSegment);
            if ($this->resultFlag['symmetry']['A'] == 1 && $this->resultFlag['symmetry']['B'] == 1) {
                return true;
            }
        }
        return false;
    }
}

class RotateClass extends SegmentClass
{
    public function __construct()
    {
    }

    public function isRotatePosition()
    {
        $this->generateRotatePosition();

        foreach ($this->baseSegments as $baseSegment) {
            $this->setResultFlag('rotate', $baseSegment);
            if ($this->resultFlag['rotate']['A'] == 1 && $this->resultFlag['rotate']['B'] == 1) {
                return true;
            }
        }
        return false;
    }
}
/*
 * 問題
 *
  7セグメントディスプレイは、7つのセグメントの点灯と消灯の状態を組み合わせて、0～9の数字を表示する装置です。ある7セグメントディスプレイ s の i 番目のセグメント s_i が点灯しているならばs_i=1と表し、消灯しているならば s_i=0 と表します。 s_1～s_7 を並べることで、7セグメントディスプレイの状態を表現することができます。

あなたは趣味の電子工作で、2つの7セグメントディスプレイを横に並べて00～99の2桁の数字を表示する装置を作りました。 ところが、配線を間違ってしまったのか、意図しないセグメントが点灯・消灯してしまいます。

この装置をよく観察すると、どうやら装置を対称移動したり回転移動すれば、正しく2桁の数字を表示することができるようです。

入力として装置の2つの7セグメントディスプレイ a と b の状態が与えられるので、次の各条件を満たすかどうか判定するプログラムを作成してください。

1. 装置が正しく2桁の数字を表す
2. 装置を対称移動すると正しく2桁の数字を表す
3. 装置を回転移動すると正しく2桁の数字を表す

それぞれの条件を満たすかどうか調べるプログラムを書いてください。

/*
 * 入力
 * 
1 1 1 1 0 1 1
0 1 1 0 0 0 0

/*
 * 出力
 * 
 * 装置が正しく2桁の数字を表すか
 * 装置を対称移動すると正しく2桁の数字を表すか
 * 装置を回転移動すると正しく2桁の数字を表すか
 *
Yes
No
No


/*
 * セグメント周り
 *
 -     -  -     -  -  -  -  -
| |  |  |  || ||  |  | || || |
       -  -  -  -  -     -  -
| |  ||    |  |  || |  || |  |
 -     -  -     -  -     -  -

数字    s_1～s7
0   1111110
1   0110000
2   1101101
3   1111001
4   0110011
5   1011011
6   1011111
7   1110010
8   1111111
9   1111011


・対称移動とは、装置の左右の端から等しい距離にある対称軸を基準に装置全体を奥行方向に180度回転させて、裏返す操作のことです。
・回転移動とは、装置の中央にある中心点を中心に装置全体を平面的に180度回転させて、逆さまにする操作のことです。

初期
  a1     b1
a6  a2 b6  b2
  a7     b7
a5  a3 b5  b3
  a4     b4

対称移動
  b1     a1
b2  b6 a2  a6
  b7     a7
b3  b5 a3  a5
  b4     a4

回転移動
  b4     a4
b3  b5 a3  a5
  b7     a7
b2  b6 a2  a6
  b1     a1

*/
