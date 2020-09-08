<div class="header">
            <div class="logo">
                <h2>Music Is Life</h2>
            </div>
            <div class="task_search">
                <input type="text" name="search" id="task_search">
            </div>
            <div class="results_search" id="results_search">
            </div>
            <div class="menu">
                <div class="menu-item"> <a href="/MIL/home" class="item-header">Home</a>
                </div>
                <div class="menu-item" id="fix-hover"> <a class="item-header">Categories</a>
                <div class="list-categories" id="categories">
                </div>
                </div>
                <div class="menu-item"> <a href="/MIL/playlist" class="item-header">Playlist</a>
                </div>
              
                    <?php 

                    if(isset($_SESSION['user']))
                    {
                      echo " <div class='menu-item'><a href='/MIL/insert' id='acction' class='item-header'>Insert</a></div>";
                        if($_SESSION['user']=="admin"){
                        echo " <div class='menu-item'><a href='/MIL/home/admin' id='acction' class='item-header'>Manager</a></div>";
                        echo " <div class='menu-item'><a  id='acction' class='item-header'>".$_SESSION['user']."</a></div>";
                        echo "<div class='menu-item'><a href='/MIL/login/logout' class='item-header'>Logout</a></div>";
                        }
                      else{
                        echo " <div class='menu-item'><a id='acction' class='item-header'>".$_SESSION['user']."</a></div>";
                        echo "<div class='menu-item'><a href='/MIL/login/logout' class='item-header'>Logout</a></div>";
                        echo "<div class='menu-item'><a href='/MIL/changepassword' class='item-header'>ChangePass</a></div>";
                      }
                    }
                    else{
                        echo "<div class='menu-item'><a href='/MIL/login' class='item-header'>Login</a></div>";
                    }
                    ?>
               
        
            </div>
        </div>