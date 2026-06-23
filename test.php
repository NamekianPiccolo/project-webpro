<?php
$db = new mysqli('localhost', 'root', '', 'weblabolatorium');
$res = $db->query("SELECT * FROM users");
while($row = $res->fetch_assoc()) {
    echo $row['nim'] . " -> " . $row['password'] . "\n";
    echo "password123: " . (password_verify('password123', $row['password']) ? 'YES' : 'NO') . "\n";
}
