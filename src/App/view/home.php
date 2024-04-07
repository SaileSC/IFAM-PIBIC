<?php
// Iniciar a sessão
session_start();
// Incluir o arquivo do modelo do Firebase
require_once __DIR__.'/../Models/firebaseModel.php';
use App\Models\FirebaseModel;

// Carregar configurações do Firebase
$config = require_once __DIR__.'/../config/config.php';
$firebase_url = $config['firebase_url'];
$firebase_token = $config['firebase_token'];
$firebase_Model = new FirebaseModel($firebase_url, $firebase_token);

// Obter dados do usuário logado
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; // ID do usuário logado
$userData = $firebase_Model->getUserId($user_id); // Obtém os dados do usuário do Firebase
$dados_executivo = $firebase_Model->getdados_Executivo(); // Obtém os dados executivos do Firebase

// Verificar se o usuário possui um plano executivo
$planoExecutivo = null;
if (!empty($userData) && array_key_exists('plano_executivo', $userData)) {
    // Se o usuário tiver um plano executivo, procurar pelo ID do usuário nos dados executivos
    foreach ($dados_executivo as $executivo) {
        if ($executivo['id_user'] == $user_id) {
            $planoExecutivo = $executivo;
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <!-- Inclua o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/src/App/view/css/home.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <img src="/view/img/Login.png" alt="">
        </div>
    </div>

    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <!-- Barra de Pesquisa -->
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar">
                        <button class="btn btn-primary" type="button">Buscar</button>
                    </div>
                </div>
                <div class="col-md-2 text-end">
                    <a href="" class="perfil-icon">
                        Perfil
                    </a>
                    <a href="" class="ferramenta-icon">
                        Ferramenta
                    </a>
                </div>
            </div>
        </div>
    </header>

    <button class="btn btn-criar-plano">
    <a href="/executivo" style=" color: inherit;">
        Criar um novo plano
    </a>
</button>

    <div class="container mt-4">
        <h3 style="color: aliceblue;">Recentes</h3>
        <!-- Conteúdo da página aqui -->

        <?php if (!is_null($planoExecutivo)) : ?>
            <!-- Se o usuário tiver um plano executivo, exiba-o -->
            <div class="card plano-executivo">
                <div class="card-header">
                    <h2 class="mb-0">
                        Plano Executivo
                    </h2>
                </div>

                <div class="card-body">
                    <?php echo $planoExecutivo['nome_empresa']; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
                Você não tem um plano executivo associado à sua conta.
            </div>
        <?php endif; ?>
    </div>

    <!-- Inclua o JavaScript do Bootstrap (opcional) -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYlT"
    crossorigin="anonymous"></script>
</body>
</html>
