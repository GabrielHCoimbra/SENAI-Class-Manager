<?php
    $class = $_POST['name'];



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
        Nome_Prof 	Varchar(60)
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
        Foreign key (Cod_Professor) references Professores (Cod_Prof)
            ON update cascade ON delete cascade
    )";

    $resultado6 = $link->query($verify6);

    if ($class!='ADM') {
        $query = "SELECT * FROM Turmas";
        $qry = $link->query($query) or die ($link->error);

        $verif = false;

        while ($data = $qry->fetch_array()){
            if ($data['Nome_turma'] == $class) {
                $verif = true;
            }
        }
        if($verif == false){
            $insere = "INSERT INTO Turmas VALUES(DEFAULT,'$class')";

            $resultado = $link->query($insere)
            or die("<table height = '' align = 'center'>
            <tr><td valign = 'middle' align = 'center'>
            <font size = '5'>Nao foi possivel cadastrar a turma!</font>
            </td></tr></table>");
        }
    }

    
    
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="senai_software">
    <link rel="stylesheet" href="../css/main.css">
    <title>Gestão de Aula - Senai</title>
</head>
<body>
    <header class="main-header">
        <div class="div-header-img">
            <img class="header-img" src="../img/logo-senai.png" alt="senai-logo">
        </div>

        <div class="rest">
            <h1 class="title">OLÁ SEJA BEM VINDO AOS REGISTROS DA TURMA <?php echo "$class"; ?></h1>
            <nav class="nav1">
                <ul class="ul1">
                    <li class="li1"> Professores
                        <ul class="ul2">
                            <li><a href="html/register2.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Professor</a></li>
                            <li><a href="teacher_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Professor</a></li>
                            <li><a href="html/register3.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Turma</a></li>
                            <li><a href="team_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Turma</a></li>
                            <li><a href="html/register4.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Matérias</a></li>
                            <li><a href="subject_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Matérias</a></li>
                            <li><a href="html/register5.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Aula</a></li>
                            <li><a href="class_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Aula</a></li>
                        </ul>
                    </li>
                    <?php if($class!='ADM'){ ?>
                    <li class="li1"> Alunos
                        <ul class="ul2">
                            <li><a href="html/register.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Aluno</a></li>
                            <li><a href="student_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Aluno</a></li>
                            <li></li>
                            <li></li>
                        </ul>
                    </li>
                    <li class="li1"> Ferramentas
                        <ul class="ul2">
                            <li><a href="student1.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Sortear Aluno</a></li>
                            <li><a href="student2.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Sortear Grupos</a></li>
                            <li><a href="html/number_sort.html" target="resultado" class="hiperlinks">Sortear Numero</a></li>
                            <li><a href="html/timer.html?class=<?=$class;?>" target="resultado" class="hiperlinks">Temporizador</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="li1"> <a href="html/credit.php?class=<?=$class;?>" class="hiperlinks">Créditos</a></li>
                </ul>
            </nav> 
        </div>
        
    </header>
    <main>
        <div id="resultado">
        <iframe name="resultado" scrolling="auto" width="100%" height="100%" frameborder="0" src=""></iframe>
        </div>
    </main>
    <footer class="footer">
        <a href="https://br.linkedin.com/in/gabriel-henrique-coimbra-viana-413036241" class="footer_a">Desenvolvido por: <b>Gabriel Henrique Coimbra Viana</b></a>
    </footer>
</body>
</html>

