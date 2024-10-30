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

// Consultando o banco de dados para buscar o caminho do vídeo (opcional)
$sql = "SELECT caminho_video FROM videos WHERE id = 1"; // Exemplo de consulta
$result = $conn->query($sql);

$videoPath = 'videos/exemplo.mp4'; // Caminho padrão do vídeo caso não use banco de dados
if ($result->num_rows > 0) {
    // Obtendo o caminho do vídeo do banco de dados
    $row = $result->fetch_assoc();
    $videoPath = $row['caminho_video'];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibição de Vídeo</title>
</head>
<body>

<h1>Exibindo um vídeo</h1>

<!-- Elemento de vídeo no HTML -->
<video width="640" height="360" controls>
    <source src="<?php echo $videoPath; ?>" type="video/mp4">
    Seu navegador não suporta o elemento de vídeo.
</video>

</body>
</html>
