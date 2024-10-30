<?php
$host = 'sql303.infinityfree.com';
$username = 'if0_37622883';
$password = 'qgRe92k7LSh';
$dbname = 'if0_37622883_XXX';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql = "SELECT caminho_video FROM videos ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

$videoPath = 'uploads/exemplo.mp4'; // Caminho padrão caso não haja vídeo no banco
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $videoPath = $row['caminho_video'];
}

$conn->close();

echo json_encode(['videoPath' => $videoPath]);
?>
