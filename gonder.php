<?php
ob_start();
?>

<style>
    .bg-color {
        background-color: #42bea0c2;
        color: #000;
        width: 100%;
        text-align: center;
        font-size: 1.6rem;
    }

    .disable {
        display: none;
    }
</style>

<?php
ob_start();
//veritabanına veri eklemek için veri tabanı bağlantısını yapıyoruz.
$db_hostname = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "db_name";
$ip_address = $_SERVER["REMOTE_ADDR"];
$comment_table = "db_comment_table";

// Bağlantıyı oluştur
$connection = mysqli_connect($db_sunucu, $db_kullanici, $db_sifre, $db_adi);

// Bağlantıyı Kontrol Et
if (!$connection) {
    die("Connection error: " . mysqli_connect_error());
}

//Post metodu ile gönderilen verilerimizi alıyoruz.
$name = $_POST["name"];
$phone = $_POST["phone"];
$mail = $_POST["mail"];
$comment = $_POST["comment"];
$date = date("d-m-Y");

$add = $connection->prepare("INSERT INTO $comment_table (_name,phone,mail,comment,_date,ipadress)  VALUES (?,?,?,?,?,?)");
$add->bind_param("ssssss", $name, $phone, $mail, $comment, $date, $ip_address);

if (strlen($comment) > 150 || strlen($name) < 3 || strlen($comment) < 10) {
    echo "<div class='bg-color'>Character Error (MAX 150 Char - MİN 10 Char) ** Please write true your name.. ** Please write true your phone.. </div>";
    header("Refresh: 3; url=index.php");

} else if (empty($phone) || !empty($name)) {
    $sorgu = "SELECT * FROM $comment_table WHERE ipadress LIKE " . $ip_address . "";
    $sqlsorgusu = $connection->query($sorgu);
    $kayit_kontrol_sonuc = $connection->query("SELECT EXISTS(SELECT * FROM $comment_table WHERE ipadress='$ip_address') AS kayit_varmi");
    $kayit_varmi = mysqli_fetch_assoc($kayit_kontrol_sonuc);

    if ($kayit_varmi['kayit_varmi'] == "0") {
        if ($add->execute() === TRUE) {

            echo "<div class='bg-color'>Thanks for comment!!<br>Your ip Adress: " . $ip_address . "</div>";

            header("Refresh: 2; url=index.php");
            die();


        } else {
            echo "Hata: " . $add . "<br>" . $connection->error;
            die();
        }
    } else {
        echo "<div class='bg-color'>We have same your ip adress, we need different ip adress</div>";
        header("Refresh: 2; url=index.php");

        die();
    }


}
;




ob_end_flush();


?>