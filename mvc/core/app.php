<?php
class App
{
    //http://localhost/MILMVC/Home/hello/a/sv/f
    protected $controllers = "home";
    protected $acction = "default";
    protected $params = [];

    function __construct()
    {
        //Array ( [0] => home [1] => hello [2] => a [3] => sv [4] => 1 )
        $arr = $this->urlProcess();
  //xử lý controller
        if (isset($arr[0])) {
            if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
                 $this->controllers = $arr[0];
                require_once "./mvc/controllers/" . $this->controllers . ".php";
            }
        }
        unset($arr[0]); 
        require_once "./mvc/controllers/" . $this->controllers . ".php";
        //xử lý acction
        if (isset($arr[1])) {
            if (method_exists($this->controllers, $arr[1])) {
                $this->acction = $arr[1];
            }
            unset($arr[1]);
        }
//Điều hướng qua login
        if($this->controllers=="login"){
            $this->acction="excuteLogin";
        }

        if($this->controllers=="register"){
            $this->acction="excuteRegister";
        }

        if($this->controllers=="insert"){
            $this->acction="excuteInsert";
        }

        $this->controllers= new $this->controllers;

        //xử lý param
        $this->params = $arr ? array_values($arr) : [ ];
        call_user_func_array([$this->controllers, $this->acction],$this->params);
    
    }

    function urlProcess()
    {
        //Lấy các giá trị kể từ thanh địa chỉ gốc trở đi: Home/hello/a/sv/f
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
