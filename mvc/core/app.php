<?php
class App
{
    //http://localhost/MILMVC/Home/hello/a/sv/f
    protected $controllers = "home";
    protected $acction = "default";
    protected $params = [];
    protected $check=false;

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
        //Điều hướng qua login
        if ($this->controllers == "login") {
            $this->check=true;
            if ($this->acction != "excuteLogin" && isset($arr[1])){
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
            } else {
                $this->acction = "excuteLogin";
            }
        }

        if ($this->controllers == "playlistsong") {
            $this->check=true;
            if ($this->acction != "playlistUser" && isset($arr[1])){
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
            } else {
                $this->acction = "playlistUser";
            }
        }

        if ($this->controllers == "register") {
            $this->check=true;
            if ($this->acction != "excuteRegister" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "excuteRegister";
            }
        }

        if ($this->controllers == "insert") {
            $this->check=true;
            if ($this->acction != "excuteInsert" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "excuteInsert";
            }
        }

        if ($this->controllers == "playlist") {
            $this->check=true;
            if ($this->acction != "excuteList" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "excuteList";
            }
        }

        if ($this->controllers == "changepassword") {
            $this->check=true;
            if ($this->acction != "excuteChange" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "excuteChange";
            }
        }

        if ($this->controllers == "player") {
            $this->check=true;
            if ($this->acction != "controlPlayer" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "controlPlayer";
            }
        }

        if ($this->controllers == "singer") {
            $this->check=true;
            if ($this->acction != "listSinger" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "listSinger";
            }
        }
  
        if ($this->controllers == "categories") {
            $this->check=true;
            if ($this->acction != "listCategory" && isset($arr[1])){
                if (isset($arr[1])) {
                    if (method_exists($this->controllers, $arr[1])) {
                        $this->acction = $arr[1];
                    }
                    unset($arr[1]);
                }
            } else {
                $this->acction = "listCategory";
            }
        }

        if (isset($arr[1])&&  !$this->check) {
            if (method_exists($this->controllers, $arr[1])) {
                $this->acction = $arr[1];
            }
            unset($arr[1]);
        }

        $this->controllers = new $this->controllers;

        //xử lý param
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([$this->controllers, $this->acction], $this->params);
    }

    function urlProcess()
    {
        //Lấy các giá trị kể từ thanh địa chỉ gốc trở đi: Home/hello/a/sv/f
        if (isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
