<div class="header">
            <div class="logo">
                <h2>Music Is Life</h2>
            </div>
            <div class="menu">
                <div class="menu-item"> <a href="home">Home</a>
                </div>
                <div class="menu-item"> <a>Rank</a>
                </div>
                <div class="menu-item"> <a>Categories</a>
                </div>
                <div class="menu-item">
                    <?php 

                    if(isset($_SESSION['user']))
                    {
                       echo "<select id='logout'>
                       <option>".$_SESSION['user']." </option>
                        <option>Logout</option>
                        </select>";
                    }
                    else{
                        echo "<a href='login'>Login</a>";
                    }
                    ?>
               
                </div>
            </div>
        </div>