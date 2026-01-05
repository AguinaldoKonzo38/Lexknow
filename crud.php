<?php
    class Crud{
        private $pdo;
        public function __construct($dbname, $host, $user, $pass){
            try {
                $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user.$pass);
            } catch (PDOException $th) {
                echo "Erro com o banco de dados: ".$th->getMessage();
                exit();
            } catch (Exception $e){
                echo "Erro generico: ".$e->getMessage();
            }
        }

        public function showData(){
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM noticias;");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }
        
        public function addPerson ($titulo, $categoria, $resumo, $conteudo, $publicado){
            $cmd = $this->pdo->prepare("select id from noticias where titulo = :e");
            $cmd->bindValue(":e", $titulo);
            $cmd->execute();
            if($cmd->rowCount() > 0){
                return false;
            } else{
                $cmd = $this->pdo->prepare("insert into noticias (titulo, categoria, resumo, conteudo, publicado) values (:n, :e, :c, :t, :p)");
                $cmd->bindValue(":n", $titulo);
                $cmd->bindValue(":e", $categoria);
                $cmd->bindValue(":c", $resumo);
                $cmd->bindValue(":t", $conteudo);
                $cmd->bindValue(":p", $publicado);
                $cmd->execute();
                return true;
            }
        }

        public function deletePerson($id){
            $cmd = $this->pdo->prepare("delete from noticias where id = :id");
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }

        //Metodos responsaveis para actualizar os dados
        //Buscar os dados de uma pessoa
        public function fetchData($id){
            $res = array();
            $cmd = $this->pdo->prepare("select * from noticias where id = :id");
            $cmd->bindValue(":id",$id );
            $cmd->execute();
            $res = $cmd->fetch(PDO::FETCH_ASSOC);
            return $res;
        }

        //Metodo para realizar os dados no banco de dados
        public function updateData ($id, $titulo, $categoria, $resumo, $conteudo, $publicado){
            $cmd = $this->pdo->prepare("update noticias set titulo = :n, categoria = :e, resumo = :c, conteudo = :t, publicado = :p where id = :id");
            $cmd->bindValue(":n", $titulo);
            $cmd->bindValue(":e", $categoria);
            $cmd->bindValue(":c", $resumo);
            $cmd->bindValue(":t", $conteudo);
            $cmd->bindValue(":p", $publicado);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
        }
    }
?>