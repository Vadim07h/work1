<?php
  session_start();
  include "header.php";
?>
    <div class="start_div">
        <img src="img/173337_or.png" alt="">
        <div class="second_menu">
            <a href="#main1">Фортнайт</a>
            <a href="#main2">Как приручить дракона</a>
            <a href="#main3">Парк Юрского периода</a>
            <a href="#main4">День рождения</a>
            <a href="#main5">Новый год</a>
        </div>
    </div>
    <div class="red_line">
        <p>Выбирайте на свое усмотрение аниматоров и программы:</p>
    </div>
    <?php
            $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
            $sql = "SELECT * FROM products WHERE id = 3";
            $result = mysqli_query($conn,$sql);
            while ($products = mysqli_fetch_assoc($result)){
        ?>
    <div class="main_card main_red" id="main1">
        <h1 class="title"><?php echo $products['name']; ?></h1>
        <img class="img" src="<?php echo $products['photo']; ?>" alt="">
        <h2><?php echo $products['quantity']; ?></h2>
        <p class="text"><?php echo $products['description']; ?></p>  
        <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                    <button type="submit" class="btn">Добавить в корзину <?php echo $products['price']?> руб</button>
                </form>  
    </div>
    <?php
            };
        ?> 

<?php
            $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
            $sql = "SELECT * FROM products WHERE id = 4";
            $result = mysqli_query($conn,$sql);
            while ($products = mysqli_fetch_assoc($result)){
        ?>
    <div class="main_card main_orange" id="main2">
        <h1 class="title"><?php echo $products['name']; ?></h1>
        <img class="img" src="<?php echo $products['photo']; ?>" alt="">
        <h2><?php echo $products['quantity']; ?></h2>
        <p class="text"><?php echo $products['description']; ?></p>  
        <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                    <button type="submit" class="btn">Добавить в корзину <?php echo $products['price']?> руб</button>
                </form>  
    </div>
    <?php
            };
        ?> 


<?php
            $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
            $sql = "SELECT * FROM products WHERE id = 5";
            $result = mysqli_query($conn,$sql);
            while ($products = mysqli_fetch_assoc($result)){
        ?>
    <div class="main_card main_3" id="main3">
        <h1 class="title"><?php echo $products['name']; ?></h1>
        <img class="img" src="<?php echo $products['photo']; ?>" alt="">
        <h2><?php echo $products['quantity']; ?></h2>
        <p class="text"><?php echo $products['description']; ?></p>  
        <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                    <button type="submit" class="btn">Добавить в корзину <?php echo $products['price']?> руб</button>
                </form>  
    </div>
    <?php
            };
        ?> 



<?php
            $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
            $sql = "SELECT * FROM products WHERE id = 6";
            $result = mysqli_query($conn,$sql);
            while ($products = mysqli_fetch_assoc($result)){
        ?>
    <div class="main_card main_4" id="main4">
        <h1 class="title"><?php echo $products['name']; ?></h1>
        <img class="img" src="<?php echo $products['photo']; ?>" alt="">
        <h2><?php echo $products['quantity']; ?></h2>
        <p class="text"><?php echo $products['description']; ?></p>  
        <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                    <button type="submit" class="btn">Добавить в корзину <?php echo $products['price']?> руб</button>
                </form>  
    </div>
    <?php
            };
        ?>



<?php
            $conn = mysqli_connect('localhost','root','','vadim') or die('Ошибка');
            $sql = "SELECT * FROM products WHERE id = 7";
            $result = mysqli_query($conn,$sql);
            while ($products = mysqli_fetch_assoc($result)){
        ?>
    <div class="main_card main_5" id="main5">
        <h1 class="title"><?php echo $products['name']; ?></h1>
        <img class="img" src="<?php echo $products['photo']; ?>" alt="">
        <h2><?php echo $products['quantity']; ?></h2>
        <p class="text"><?php echo $products['description']; ?></p>  
        <form method="post" action="add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                    <button type="submit" class="btn">Добавить в корзину <?php echo $products['price']?> руб</button>
                </form>  
    </div>
    <?php
            };
        ?>

    <?php
  include "footer.php";
?>
