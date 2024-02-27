
<?php include_once 'partials/header.tpl.php';?>
<body>
<?php include_once 'partials/nav.tpl.php';?>
    <h1>Subscription</h1>
   
    <div>
        <form method="POST" action="/subscription/subscription">
            <div class="form-group">
              <label for="sub">Which subscription want?</label>
              <select class="form-control" name="sub" id="">
                <option name="3">Reader</option>
                <option name="2">Librarian</option>
                <option name="4">Registered</option>
              </select>            
            </div>
            <input type="submit" value="Subscribe">
        
        </form>

    </div>
    <?php 
           
    
    ?>


    
</body>
</html>