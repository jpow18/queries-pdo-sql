<?php
$query = filter_input(INPUT_POST, "query", FILTER_SANITIZE_SPECIAL_CHARS);
//echo $query;
include_once "./config/Database.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SQL Practice</title>
  <link rel="stylesheet" href="./css/main.css">
</head>

<body>
  <header>
    <h1>Practice Your SQL!</h1>
  </header>
  <main>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <input type="text" name="query" placeholder="SELECT * FROM <tablename> WHERE ...">
      <input type="submit" value="submit">
      <input type="submit" value="reset" onclick="window.location.href='index.php'">
    </form>
    <div class="output">
      <?php
        include_once "./config/phishapi.php";
        echo $query;
        for ($i = 0; $i < count($data["data"]); $i++) {
          // skip show with apostrophe in venue name
          if (strpos($data['data'][$i]['venue'], "'") !== false) {
            continue;
          }
        $stmt = $pdo->prepare("INSERT INTO `showinfo` (`date`, `state`, `city`, `venue`) VALUES ('{$data["data"][$i]["showdate"]}', '{$data["data"][$i]["state"]}', '{$data["data"][$i]["city"]}', '{$data["data"][$i]["venue"]}')");
          $stmt->execute();
          $stmt->closeCursor();
        }

      ?>
    </div>
  </main>
  <footer>
    <p>Contact us at sqlPractice@sqlP.com</p>
    <p>Copyright &copy 2023 sqlstuff</p>
  </footer>
</body>

</html>