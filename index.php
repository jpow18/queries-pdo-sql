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
        if ($query) {
          $stmt = $pdo->prepare($query);
          $stmt->execute();

          // check if query was SELECT. If so, use fetchAll()
          if (strpos($query, 'SELECT') !== false) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $key => $value) {
              echo "<h3>".implode(' - ', $value)."</h3>";
            }
          } 

          $stmt->closeCursor();
        } else {
          echo "<h3>Please enter a query.</h3>";
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