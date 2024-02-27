

<?php include_once 'partials/header.tpl.php';?>
<body>
<?php include_once 'partials/nav.tpl.php';?>
    <h1>Login</h1>
   
    <div>
        <form method="POST" action="/login/validate">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="login">
        </form>

    </div>
    <?php 
           
    
    ?>


    
</body>
</html>