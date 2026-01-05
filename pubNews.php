<?php
    require 'crud.php';
    $p = new Crud("LexKnow_DB", "localhost", "root", "");

?>

<?php
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
    <title>Publicar Noticia</title>
    <link rel="stylesheet" href="assets/styles/colors.css">
    <link rel="stylesheet" href="assets/styles/sidebar.css">
    <link rel="stylesheet" href="assets/styles/pubNews.css">
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
        <?php
        //se o usuario clicar no button de cadastrat ou editar
            if (isset($_POST['titulo'])){
                //-------------------Editar--------------------
                if(isset($_GET['id_up']) && !empty($_GET['id_up'])){
                    $id_update = $_GET['id_up'];
                    $titulo = $_POST['titulo'];
                    $categoria = $_POST['categoria'];
                    $resumo = $_POST['resumo'];
                    $publicado = $_POST['publicado'];
                    $conteudo = $_POST['conteudo'];
                    if(!empty($titulo) && !empty($categoria) && !empty($resumo) && !empty($conteudo) && !empty($publicado)){
                        //Editar
                        $p->updateData($id_update, $titulo, $categoria, $resumo, $conteudo, $publicado);
                        header("location: news.php");
                    } else{
                        echo "Preencha todos os campos!";
                    }
                }
                //-------------------CADASTRAR--------------------
                else{
                    $titulo = $_POST['titulo'];
                    $categoria = $_POST['categoria'];
                    $resumo = $_POST['resumo'];
                    $publicado = $_POST['publicado'];
                    $conteudo = $_POST['conteudo'];
                    if(!empty($titulo) && !empty($categoria) &&   !empty($resumo) && !empty($publicado) && !empty($conteudo)){
                        header("location: news.php");
                        if(!$p->addPerson($titulo, $categoria, $resumo, $conteudo, $publicado)){
                            echo "Conteudo já publicado.";
                        } 
                    } else{
                        echo "Preencha ef todos os campos.";
                    }
                }
                
            
            }
        ?>

        <?php
            if(isset($_GET['id_up'])){
                //Se o usuario clicar no button de editar
                $id_update = $_GET['id_up'];
                $res = $p->fetchData($id_update);
            }
        ?>

        <div class="form">
            <form method="post">
                <h2>Noticias</h2>
                <div class="first-box-inputs">
                    <div class="campo">
                        <label for="ititulo">Titulo <span class="required">*</span></label>
                        <input type="text" name="titulo" id="ititulo" value="<?php if(isset($res)){echo $res['titulo'];} ?>">
                    </div>

                    <div class="campo">
                        <label for="icategoria">Categoria <span class="required">*</span></label>
                        <input type="text" name="categoria" id="icategoria" value="<?php if(isset($res)){echo $res['categoria'];} ?>">
                    </div>
                </div>
                <div class="campo">
                    <label for="iresumo">Resumo <span class="required">*</span></label>
                    <textarea name="resumo" id="iresumo" value="<?php if(isset($res)){echo $res['resumo'];} ?>"></textarea>
                </div>
                <div class="campo f">
                    <label for="idata">Data publicação <span class="required">*</span></label>
                    <input type="date" name="publicado" id="idata" value="<?php if(isset($res)){echo $res['publicado'];} ?>">
                </div>
                <div class="campo f">
                    <label for="iconteudo">Conteúdo <span class="required">*</span></label>
                    <textarea name="conteudo" id="iconteudo" value="<?php if(isset($res)){echo $res['conteudo'];} ?>"></textarea>
                </div>
                <div class="btn-enviar">
                    <input type="submit" value="<?php if(isset($_GET['id_up'])){echo "Actualizar";} else{echo "Publicar";}?>" class="submit" id="submit" >

                    <a href="news.php" id="close_modal" class="control_modal">Voltar</a>
                </div>
            </form>
        </div>
    </main>
    <script src="assets/script/dashboard.js"></script>
</body>

</html>