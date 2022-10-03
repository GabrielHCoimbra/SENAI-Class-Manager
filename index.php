<?php

//Conexão e consulta ao Mysql

$link = mysqli_connect("localhost", "root", "")
or die("Nao foi possivel conectar ao servidor!");

$verify = "CREATE DATABASE IF NOT EXISTS Senai";

$resultado = $link->query($verify) or die("<table height = '90%' align = 'center'>
<tr><td valign = 'middle' align = 'center'>
<font size = '5'>Nao foi possivel criar o banco de dados</font>
</td></tr></table>");

$resultado = $link->query("USE Senai");

$verify2 = " CREATE TABLE IF NOT EXISTS Turmas(
    Cod_turma Int Primary Key auto_increment,
    Nome_turma varchar(20),
    Apelido varchar(10) 
)";

$resultado2 = $link->query($verify2);

$verify3 = "CREATE TABLE IF NOT EXISTS Alunos(
    Cod_aluno Int Primary Key auto_increment,
    Nome_aluno Varchar(60),
    Cod_turma Int,
    Foreign key (Cod_turma) references Turmas (Cod_turma)
    ON update cascade ON delete cascade
)";

$resultado3 = $link->query($verify3);

$verify4 = "CREATE TABLE IF NOT EXISTS Professores(
    Cod_Professor 	Int Primary Key auto_increment,
    Nome_Prof 	Varchar(60),
    Foto_Prof   varchar(220)
)";

$resultado4 = $link->query($verify4);

$verify5 = "CREATE TABLE IF NOT EXISTS Disciplinas(
    Cod_Disci 	Int Primary Key auto_increment,
    Nome_Disci 	Varchar(60)
)";

$resultado5 = $link->query($verify5);

$verify6 = "CREATE TABLE IF NOT EXISTS Aulas(
    Cod_aula 	Int Primary Key auto_increment,
    Cod_turma 	Int,
    Cod_Disci 	Int,
    Cod_Professor 	Int,
    Foreign key (Cod_turma) references Turmas (Cod_turma)
        ON update cascade ON delete cascade,
    Foreign key (Cod_Disci) references Disciplinas (Cod_Disci)
        ON update cascade ON delete cascade,
    Foreign key (Cod_Professor) references Professores (Cod_Professor)
        ON update cascade ON delete cascade
)";

$resultado6 = $link->query($verify6);

$mysqli = mysqli_connect("localhost", "root", "", "Senai")
or die("Nao foi possivel conectar ao servidor!");


$id_prof;
$id_turma;

$query = "SELECT * FROM Aulas";
$qry = $mysqli->query($query) or die ($mysqli->error);




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="senai_software">
    <link rel="stylesheet" href="./css/index.css">
    <title>Gestão de Aula - Senai</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <main >
        <section class="main-index">
            <h1>SELECIONE O PROFESSOR:</h1>
            <div class="profiles">
                <?php
                $query = 'SELECT distinct Professores.Nome_Prof, professores.Foto_Prof FROM Professores INNER JOIN Aulas ON Professores.Cod_professor = Aulas.Cod_professor';
                $qry = $mysqli->query($query) or die ($mysqli->error);
                while ($data = $qry->fetch_array()) {
                    $nome_prof = $data['Nome_Prof'];
                    $foto_prof = $data['Foto_Prof'];
                    $query2 = "SELECT Professores.Nome_prof as Professor, Turmas.Nome_turma as Turma, Turmas.Apelido as Apelido 
                    FROM Professores INNER JOIN Aulas ON Professores.Cod_professor = Aulas.cod_professor 
                                     INNER JOIN Turmas ON Aulas.Cod_turma = Turmas.Cod_turma
                                     WHERE Professores.Nome_prof = '$nome_prof'";
                    $qry2 = $mysqli->query($query2) or die ($mysqli->error);    
                    ?>
                    <ul class="ul1">
                        <li class="li1">
                            <img src="<?= './php/'.$foto_prof ?>" alt="" class="img">
                            <ul class="ul2">
                                <?php
                                    while ($data2 = $qry2->fetch_array()) { 
                                        $turma=$data2['Turma'];
                                ?>
                                    <li class="li2"><form action="php/main.php" method="post"> 
                                        <input type="hidden" name="name" value="<?= $turma ?>">
                                        <a onclick="this.parentNode.submit();"><?php echo $data2['Apelido']; ?></a>
                                    </form></li>
                                    <?php
                                    }
                                    ?>
                                
                            </ul>   
                        </li>   
                    </ul>
                    
                    <?php
                                    
                }
                ?>
                <ul class="ul1">
                    <li class="li1">
                        <img src="./img/logo-senai.png" alt="" class="img">
                        <ul class="ul2">
                                <li class="li2">
                                            <form action="php/main.php" method="post"> 
                                                <input type="hidden" name="name" value="ADM">
                                                <a onclick="this.parentNode.submit();">ADM</a>
                                            </form>      
                                </li>
                        </ul>
                    </li>                                
                    </ul>
            </div>
        </section>
    </main>
    <footer class="footer">
        <a href="https://br.linkedin.com/in/gabriel-henrique-coimbra-viana-413036241" class="footer_a">Desenvolvido por: <b>Gabriel Henrique Coimbra Viana</b></a>
    </footer>

    
</body>
</html>