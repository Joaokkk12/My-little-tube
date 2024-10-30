<?php
// Definindo os detalhes da conexão com o servidor
$host = 'sql303.infinityfree.com'; // ou o IP do servidor
$username = 'if0_37622883';
$password = 'qgRe92k7LSh';
$dbname = 'if0_37622883_XXX';

// Conectando ao servidor de banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
.l
// Consultando o banco de dados para buscar o caminho do vídeo
$sql = "SELECT caminho_video FROM videos WHERE id = 1"; // Exemplo de consulta
$result = $conn->query($sql);

// Definindo o caminho padrão do vídeo caso não use banco de dados
$videoPath = 'videos/exemplo.mp4';
if ($result && $result->num_rows > 0) {
    // Obtendo o caminho do vídeo do banco de dados
    $row = $result->fetch_assoc();
    $videoPath = $row['caminho_video'];
}

$conn->close();

// Retornando o caminho do vídeo como JSON
echo json_encode(['videoPath' => $videoPath]);
?>
