<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <?php

$db = new PDO("mysql:host=localhost;dbname=test", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


try {
    $id = $_POST['id'];

    $select_statment = ('SELECT * FROM users WHERE id=:id');

    $statement = $db->prepare($select_statment);

    $statement->bindValue(':id', $id);

    $statement->execute();

    $sqldata = $statement->fetchAll();

    $result = [' Done Successfully'];

    echo ('<table class="table">
                    <thead class="orders_table_head">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                        </tr>
                    </thead>
                    <tbody>');

    foreach ($sqldata as $value) {
        echo "<tr><td>" . $value["id"] . "</td>
                    <td>" . $value["name"] . "</td>
                    <td>" . $value["address"] . "</td>
                    </tr>";
    }
    echo "</tbody></table>";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $result = ['ERROR'];
} finally {
    $db = null;
}

echo json_encode($result);
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>