<nav>
        <ul>
            <?php  
            if (isset($_SESSION['userInfo'])) {
                echo '<li><a href="/index/index">Home</a></li>';
                echo '<li><a href="/login/logout">Log-out</a></li>';
                echo '<li><a href="/subscription/index">Subscription</a></li>';
            } else {
                echo '<li><a href="/index/index">Home</a></li>';
                echo '<li><a href="/login/index">Log-in</a></li>';
                echo '<li><a href="/register/index">Register</a></li>';
            }
            ?>            
        </ul>
</nav>