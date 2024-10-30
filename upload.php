<?php
$host = 'sql303.infinityfree.com';
$username = 'if0_37622883';
$password = 'qgRe92k7LSh';
$dbname = 'if0_37622883_XXX';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video'])) {
    $targetDir = "uploads/";
    $videoFile = $targetDir . basename($_FILES['video']['name']);
    $videoFileType = strtolower(pathinfo($videoFile, PATHINFO_EXTENSION));

    // Verifica se é um arquivo de vídeo
    $allowedTypes = ['mp4', 'webm', 'ogg'];
    if (in_array($videoFileType, $allowedTypes)) {
        // Tenta fazer o upload
        if (move_uploaded_file($_FILES['video']['tmp_name'], $videoFile)) {
            // Insere o caminho do vídeo no banco de dados
            $sql = "INSERT INTO videos (caminho_video) VALUES ('$videoFile')";
            if ($conn->query($sql) === TRUE) {
                echo "Upload realizado com sucesso!";
            } else {
                echo "Erro ao salvar o caminho no banco de dados: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload do vídeo.";
        }
    } else {
        echo "Tipo de arquivo não permitido. Apenas MP4, WEBM e OGG são aceitos.";
    }
}

$conn->close();
?>
