<?php //新增留言，成功後導向主頁
session_start();
$pig = mysqli_connect('localhost', 'root', '', 'cv1');
//    if (! $conn) {
//        die ('Could not connect : '. mysqli_connect_error());
//    }
//    echo 'Connected successfully'."<br>";
$name = mysqli_real_escape_string($pig, trim($_SESSION['username']));
$message = mysqli_real_escape_string($pig, trim($_POST['message']));
if (! empty ($message)) {
    $sql = "INSERT INTO datas (username, message) VALUES ('$name', '$message')";
    if (mysqli_query($pig, $sql)) { ?>
        <script>
            alert("新增留言成功")
        </script>
        <?php
        header ("Refresh:0; url=./index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($pig);
    }
} else { ?>
    <script>
        alert("留言欄不可為空，請重新輸入")
    </script>
    <?php
    header ("Refresh:0; url=./message.php");
}
$pig->close();
exit();
?>