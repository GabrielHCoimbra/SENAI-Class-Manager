<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <title>Document</title>
</head>
<body class="query2">
<?php

    $class = $_GET['class'];
    $gr = $_POST['num_gr'];
    $al = $_POST['num_gr_al'];

    $mysqli = mysqli_connect("localhost", "root", "", "Senai")
    or die("Nao foi possivel conectar ao servidor!");

    $query = "SELECT * FROM Turmas";
    $qry = $mysqli->query($query) or die ($mysqli->error);

    $cod_turma;

    while ($data = $qry->fetch_array()) {
        if ($data['Nome_turma'] == $class) {
            $cod_turma = $data['Cod_turma'];
        }
    }

    $query = "SELECT * FROM Alunos";
    $qry = $mysqli->query($query) or die ($mysqli->error);

    $i2 = 0;

    for ($i=0; $data = $qry->fetch_array(); $i++) { 
        if ($data['Cod_turma'] == $cod_turma) {
            $students[$i] = $data['Nome_aluno'];
        }else{
            $i--;
        }
    }

    foreach($students as $value){
        $i2++;
    }
    
    $rest = $i2 % $al;

    
    if (($i2 / $gr) == $al) {
        $gr2 = $gr;
        while ($gr2 >= 1 ) {
            $gr3 = ($gr - $gr2) + 1;
            ?><h1>Grupo <?php echo $gr3;?></h1><?php
            $gr2--;
            $al2 = $al;
            while ($al2 >= 1) {
                $al3 = ($al - $al2) + 1;
                $al2--;
            
            do{
                $num = floor(((float)rand()/(float)getrandmax())*$i2);
                $student = $students[$num];
            }while ($students[$num] == "");
            $students[$num] = "";  
            
            echo $student . '</br>';
            }
        }
    }
    if (($i2 / $gr) != $al) {
        $gr2 = $gr;
        while ($gr2 >= 2 ) {
            $gr3 = ($gr - $gr2) + 1;
            ?><h1>Grupo <?php echo $gr3;?></h1><?php
            $gr2--;
            $al2 = $al;
            while ($al2 >= 1) {
                $al3 = ($al - $al2) + 1;
                $al2--;
            
            do{
                $num = floor(((float)rand()/(float)getrandmax())*$i2);
                $student = $students[$num];
            }while ($students[$num] == "");
            $students[$num] = "";  
            echo $student . '</br>';
            }
        }
        while ($gr2 == 1 ) {
            $gr3 = ($gr - $gr2) + 1;
            ?><h1>Grupo <?php echo $gr3;?></h1><?php
            $gr2--;
            $al2 = $al + $rest;
            while ($al2 >= 1) {
                $al3 = ($al - $al2) + 1;
                $al2--;
            
            do{
                $num = floor(((float)rand()/(float)getrandmax())*$i2);
                $student = $students[$num];
            }while ($students[$num] == "");
            $students[$num] = "";  
            echo $student . '</br>';
            }
        }
    }
?>
</body>
</html>



