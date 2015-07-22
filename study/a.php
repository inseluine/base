<?php
$c = new fifth;
$c->execute();
exit;

class fifth {
    //get field info
    public function __construct() {
        $this->id = 0;
        list($this->height, $this->width) = explode(' ', $this->getStdin());
        for ($i = 0; $i < $this->height; $i++) {
            $this->lines[] = $this->getStdin();
        }
    }

    public function execute() {
        $poolCount = 0;
        $this->previousPools = null;
        $this->currentPools = null;

        foreach ($this->lines as $line) {
            $this->currentPools = $this->getPools($line);
            $poolCount += $this->unionPools();
            $this->previousPools = $this->currentPools;
        }
        $poolCount += count($this->currentPools);
        echo $poolCount, "\n";
    }

    public function unionPools() {
        $unsetPreviousKeys = array();
        if (! is_array($this->previousPools)) return 0;
        foreach ($this->currentPools as $currentKey => $currentPool) {
            foreach ($this->previousPools as $previousKey => $previousPool) {
                if ($currentPool['bin'] & $previousPool['bin'] ||
                $currentPool['bin'] << 1 & $previousPool['bin'] ||
                $currentPool['bin'] >> 1 & $previousPool['bin']) {
                    $this->currentPools[$currentKey]['id'] = min($this->currentPools[$currentKey]['id'], $this->previousPools[$previousKey]['id']);
                    $unsetPreviousKeys[] = $previousKey;
                }
            }
        }
        $unsetPreviousKeys = array_unique($unsetPreviousKeys);
        foreach($unsetPreviousKeys as $key) {
            unset($this->previousPools[$key]);
        }
        foreach($this->previousPools as $previousKey => $previousPool) {
            foreach ($this->currentPools as $currentPool) {
                if ($previousPool['id'] == $currentPool['id']) {
                    unset($this->previousPools[$previousKey]);
                }
            }
        }
        return count($this->previousPools);
    }

    public function toBin($pos, $len) {
        $bin = 0;
        for ($i = 0; $i < $len; $i++) {
            $bin += pow(2, $this->width - 1 - $pos - $i);
        }
        return $bin;
    }

    public function getId() {
        return $this->id++;
    }

    public function getDec($line) {
        $result = 0;
        for ($i = 0; $i <= $this->width; $i++) {
            $result += (substr($line, $this->width - $i - 1, 1) == 'w') ? (pow(2, $i)) : 0;
        }
        return $result;
    }

    public function getPools($line) {
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
                        break;
                    }
                    break;
                case '.':
                    if ($previous == 'w') {
                        $result[] = array('id' => $this->getId(), 'pos' => $pos, 'len' => $len, 'bin' => $this->toBin($pos, $len));
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
            $result[] = array('id' => $this->getId(), 'pos' => $pos, 'len' => $len, 'bin' => $this->toBin($pos, $len));
        }
        return $result;
    }

    
    public function getStdin() {
        return trim(fgets(STDIN));
    }

}


