

<?php include_once 'partials/header.tpl.php';?>
<body>
<?php include_once 'partials/nav.tpl.php';?>
    <h1>Registro</h1>
   
    <h3><?$error;?></h3>
    <div>
        <form method="POST" action="/register/register">
            <input type="text" name="userName" placeholder="Nombre de usuario" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="contraseña" required>
            <input type="submit" value="Registarse">
        </form>

        
        
    </div>
    <?php 
           
    
    ?>


    
</body>
</html>