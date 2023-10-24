<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Comments For YOUR COMPANY NAME</title>
</head>

<body>




    <div class="header">
        <div class="header__logo">
            <img class="header__logo--img" src="YOUR-COMPANY-LOGO" alt="YOUR-COMPANY-LOGO">

        </div>
        <div class="header__adresses">
            <h3 class="header__adresses--heading">YOUR COMPANY NAME</h3>
            <p class="header__adresses--content">YOUR COMPANY ADRESS
            </p>
            <button class="yorumbuton header__adresses--btn btn btn-primary">Add Comment</button>
        </div>
    </div>
    <div class="comment__group disabled clearfix">
        <div class="comment__group--formgroup">
            <form method='post' action='gonder.php'>
                <label class="form-label" for="name">Company name</label>
                <input class="form-control" type="text" name="name" id="name">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" id="phone">
                <label class="form-label" for="mail">E-Mail</label>
                <input class="form-control" type="text" name="mail" id="mail">
                <label class="form-label" for="yorum">Your Comment</label>
                <input class="form-control comment" type="text" name="yorum" id="yorum">

                <span class="char">150</span>
                <input class=" gonder btn btn-primary" type="submit" value="Gönder">
            </form>
            <!-- <form action="gonder.php" class="input-group" method="post">
                <label class="form-label" for="name">Firma İsminiz</label>
                <input class="form-control" type="text" name="name" id="name">
                <label class="form-label" for="phone">Telefon</label>
                <input class="form-control" type="text" name="phone" id="phone">
                <label class="form-label" for="mail">E-Mail</label>
                <input class="form-control" type="text" name="mail" id="mail">
                <label class="form-label" for="yorum">Yorumunuz</label>
                <input class="form-control" type="text" name="yorum" id="comment">
                <span class="char">150</span>
                <input class=" gonder btn btn-primary" type="submit" value="Gönder">

            </form> -->
        </div>
    </div>
    <div class="content">
        <?php

        $connection = mysqli_connect("db_hostname", "db_username", "db_password", "db_name");
        $comment_table = "db_comment_table";
        $ip_address = $_SERVER["REMOTE_ADDR"];

        if ($connection->connect_errno > 0) {
            die("<b>Bağlantı Hatası:</b> " . $connection->connect_error);
        } else {


        }


        if ($connection->errno > 0) {
            die("<b>Sorgu Hatası:</b> " . $connection->error);
        }



        // $cikti = $sorgu->fetch_array();
        

        $select = "SELECT _name, phone, mail, comment, _date FROM " . $comment_table . "";
        $result = $connection->query($select);
        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {

                echo '
        <div class="content__comment">
    <div class="content__comment--img">
        <span class="content__comment--img--name">' . $data["_name"][0] . '</span>
    </div>
    <div class="content__comment--comment ">
        <p>' . $data["comment"] . '
        </p>
    </div>

    <div class="content__comment--name clearfix">
    <span class="allname">' . $data["_name"] . '</span>
        <span class="phone">' . $data["phone"] . '</span>
        <span >' . $data["_date"] . '</span>
    </div>
</div>
    ';







            }
        } else {
            echo "<div class='bg-color'>it have no comment yet!!</div>";





        }


        $result->close();
        $connection->close();

        ?>

        <!-- <div class="content__comment clearfix">
            <div class="content__comment--img">
                <span class="content__comment--img--name">A</span>
            </div>
            <div class="content__comment--comment ">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate sint beatae doloribus at
                    expedita, delectus inventore maxime harum ex odio, asperiores reprehenderit dolor nisi eaque?
                </p>
            </div>

            <div class="content__comment--name ">
                <span>İsim Soyisim</span><br>
                <span>05345312456</span><br>
                <span>tarih</span>
            </div>
        </div>

        <div class="content__comment clearfix">
            <div class="content__comment--img">
                <span class="content__comment--img--name">B</span>
            </div>
            <div class="content__comment--comment ">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate sint beatae doloribus at
                    expedita, delectus inventore maxime harum ex odio, asperiores reprehenderit dolor nisi eaque?</p>
            </div>

            <div class="content__comment--name ">
                <span>İsim Soyisim</span><br>
                <span>05345312456</span>
            </div>
        </div> -->



    </div>
    <footer class="footer">
        <div class="footer__name">
            <span>Copright 2023 @ <a href="https://www.instagram.com/azizbaskan1/" target="_blank">QuaTech</a></span>
        </div>
        <div class="footer__copright">

        </div>
    </footer>
    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>