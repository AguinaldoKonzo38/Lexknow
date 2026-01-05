<?php
    require 'crud.php';
    $p = new Crud("LexKnow_DB", "localhost", "root", "");
    //sessao
    session_start();

    if(!isset($_SESSION['logado'])){
        header('Location: loginAdmin.html');
    }         
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Noticias</title>
    <link rel="stylesheet" href="assets/styles/colors.css">
    <link rel="stylesheet" href="assets/styles/sidebar.css">
    <link rel="stylesheet" href="assets/styles/header.css">
    <link rel="stylesheet" href="assets/styles/news.css">
</head>

<body>
    <nav id="sidebar">
        <section class="sidebar-content">
            <div id="logo">
                <h1>Logo</h1>
            </div>
            <ul id="side_items">
                <li class="side-item">
                    <a href="dashboard.php">
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
                    <a href="news.php">
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
        <section class="header">
            <div>
                <h1>Painel Administrativo</h1>
            </div>

            <div>
                <p>Notícias</p>
            </div>
        </section>

        <section class="box table">
            <section class="btn-pub-noticia">
                <a href="pubNews.php" target="_self">Nova Notícia</a>
            </section>

            <div class="box_cards">
                <?php
                    $data = $p->showData();                    
                    if(count($data) > 0){
                        for ($i=0; $i <  count($data); $i++) { 
                            echo "<div class='data_cards'> ";

                            echo "<img src='assets/files/martelo.jpg' alt='news_icon' class='news_icon'>";
                            echo "<h3>" . htmlspecialchars($data[$i]['titulo']) . "</h3>";
                            echo "<p><strong>Categoria:</strong> " . htmlspecialchars($data[$i]['categoria']) . "</p>";
                            echo "<p>" . htmlspecialchars($data[$i]['resumo']) . "</p>";
                            echo "<p><strong>Data de Publicação:</strong> " . htmlspecialchars($data[$i]['publicado']) . "</p>";
                ?>
                            <div class="actions">
                                <a href="pubNews.php?id_up=<?php echo $data[$i]['id'];
                                ?>" >Editar</a>
                                    <a href="news.php?id=<?php echo $data[$i]['id']; ?>" id="btn_delete">Excluir</a>
                            </div>
                <?php
                            echo "</div>";
                        }
                    }else{
                        echo "Nenhuma pessoa cadastrada.";
                    }
                ?>
            
            </div>
                
        </section>
    </main>



    <script src="assets/script/dashboard.js"></script>
</body>

</html>

<?php
    if(isset($_GET['id'])){
        $id_person = $_GET['id'];
        $p->deletePerson($id_person);
        header('location: news.php');
    }
?>