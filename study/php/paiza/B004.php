<?php
//変数の前後に()をつけておく
/*
    $ipRegex1 = "[1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]";
    $ipRegex2 = "($ipRegex1)|\*|\[($ipRegex1)\-($ipRegex1)\]";
    $ipRegex3 = "(($ipRegex1)\.){2}($ipRegex2)\.($ipRegex2)";

    echo preg_match("/($ipRegex3)/", getStdin());
*/
$c = new B004;
$c->execute();

class B004
{
    private $baseIp = array();
    private $N;
    private $Log = array();
    private $Log2 = array();
    private $logIp = array();

    private $ipRegex = "[1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]";
    private $ipRegex2 = "($ipRegex1)|\*|\[($ipRegex1)\-($ipRegex1)\]";
    private $ipRegex3 = "(($ipRegex1)\.){2}($ipRegex2)\.($ipRegex2)";
    

    public function __construct()
    {
        $this->baseIp = explode('.',getStdin());    
        $this->N = getStdin();
    }

    public function execute()
    {
        for ($i = 0; $i < $this->N; $i++)
        {
            $this->getLogIp(getStdin());
        }
    }

    private function getLogIp($s)
    {
    //ログ１行分の先頭のIPAddrをオクテット毎に $this->logIpに配列格納
        $ipAddr = substr($s, 0, strpos($s, ' '));
        $this->logIp = explode('.', $ipAddr);
    }

    private function wildCheck()
    {
        if (preg_match("/($ipRegex)/"), $i) {
            return $i;
        }
        if (preg_match("/\*/"), $i) {
            return $i;
        }
        if (preg_match("/\[($ipRegex)\-($ipRegex)\]/"), $i) {
            return $i;
        }
    }
}

function getStdin()
{
    return trim(fgets(STDIN));
}
