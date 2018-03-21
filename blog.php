<?php
$username = "db-user";
$password = "db-password";

$attrs = array(PDO::ATTR_PERSISTENT => true);

// Create connection
$pdo = new PDO("mysql:host=localhost;dbname=db-name", $username, $password, $attrs);

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Check connection
$stmt = $pdo->prepare("SELECT * FROM wp_posts");

$results = array();
if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $url = preg_replace('/[^a-zA-Z0-9_\-]/s', '', $row["post_name"]);
        $update = $pdo->prepare("UPDATE wp_posts SET post_name=? WHERE ID=?");
        $update->execute(array($url, $row["ID"]));
    }
}
?>