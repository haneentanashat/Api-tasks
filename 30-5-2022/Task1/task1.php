<?php
$db = new PDO("mysql:host=localhost;dbname=test", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $sql = ('UPDATE users SET address=:address WHERE id=:id and name=:name');

    $update_statement = $db->prepare($sql);

    $update_statement->bindValue(':address', $address);
    // $statement->bindValue(':email', $email);
    $update_statement->bindValue(':id', $id);
    $update_statement->bindValue(':name', $name);

    $update_statement->execute();

    $result = ['Data updated successfully...'];
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    $result = ['ERROR!!!'];
} finally {
    $db = null;
}
echo json_encode($result);
?>