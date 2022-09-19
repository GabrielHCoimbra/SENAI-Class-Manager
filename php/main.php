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
        Nome_turma varchar(20) 
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
        
            <a href="html/register.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Cadastrar Aluno</a>
            <a href="student_query.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Consultar Aluno</a>
            <a href="student1.php?class=<?=$class;?>" target="resultado" class="hiperlinks">Sortear Aluno</a>
            <a href="html/number_sort.html" target="resultado" class="hiperlinks">Sortear Numero</a>
            <a href="html/timer.html?class=<?=$class;?>" target="resultado" class="hiperlinks">Temporizador</a>
            <a href="html/credit.php?class=<?=$class;?>" class="hiperlinks">Créditos</a>
        </div>
        
    </header>
    <main>
        <div id="resultado">
        <iframe name="resultado" scrolling="auto" width="100%" height="100%" frameborder="0" src=""></iframe>
        </div>
    </main>
    <footer></footer>
</body>
</html>

