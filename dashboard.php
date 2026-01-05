<?php
     //sessao
     session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: loginAdmin.html');
    }         
?>



<!DOCTYPE html>
<html lang="pt-ao">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/styles/colors.css">
    <link rel="stylesheet" href="assets/styles/sidebar.css">
    <link rel="stylesheet" href="assets/styles/dashboard.css">
</head>
<body>
    <nav id="sidebar">
        <section class="sidebar-content">
            <div id="logo">
                <h1>Logo</h1>
            </div>
            <ul id="side_items">
                <li class="side-item">
                    <a href="dashboard.html">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="item-description">Dashboard</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-users"></i>
                        <span class="item-description">Usuários</span>
                    </a>
                </li>
                <li class="side-item">
                   <a href="#">
                       <i class="fa-solid fa-rectangle-ad"></i>
                        <span class="item-description">publicar</span>
                    </a>
                </li>
                <li class="side-item">
                    <a href="#">
                        <i class="fa-regular fa-newspaper"></i>
                        <span class="item-description">Noticias</span>
                    </a>
                </li>
                 <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-scale-balanced"></i>
                        <span class="item-description">Legislações</span>
                    </a>
                </li>
            </ul>
            <button id="open-btn">
                <i class="fa-solid fa-chevron-right"></i>
                a
            </button>
        </section>

        <section id="logout">
            <a href="assets/backend/logout.php" id="logout-btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">Terminar sessão</span>
            </a>
        </section>
    </nav>

    <main>
        <section class="box-apresentacao">
            <h3>Bem-vindo a administrativa</h3>
        </section>

        <section class="card-container">
            <div class="card">
                <p class="Legislacao-count cn">3</p>
                <p class="card-text">Legislações</p>
            </div>

            <div class="card">
                <p class="Admin-count cn">1</p>
                <p class="card-text">Administrador</p>
            </div>

            <div class="card">
                <p class="News-count cn">3</p>
                <p class="card-text">Notícias</p>
            </div>

            <div class="card">
                <p class="Legislacao-count cn">3</p>
                <p class="card-text">Total Legislações</p>
            </div>
        </section>

        <section >
            <h4>Ordem Recente</h4>
            
            <table>
                <th>
                    
                </th>
            </table>
        </section>
    </main>

    <script src="assets/script/dashboard.js"></script>
</body>
</html>