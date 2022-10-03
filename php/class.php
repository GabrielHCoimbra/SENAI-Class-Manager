<html>
<head>
<title>Insere Turma</title>
<link rel="stylesheet" href="../css/general.css">
</head>
<body>
<?php

$class = $_GET['class'];

$link = mysqli_connect("localhost", "root", "", "Senai")
or die("Nao foi possivel conectar ao servidor!");



$mat = $_POST["class"];
$nome = $_POST ["disci"];
$prof = $_POST["prof"];


$insere2 = "INSERT INTO aulas VALUES('DEFAULT','$mat','$nome', '$prof')";


$resultado2 = $link->query($insere2)
or die("<table height = '' align = 'center'>
<tr><td valign = 'middle' align = 'center'>
<font size = '5'>Nao foi possivel cadastrar aula!</font>
</td></tr></table>");

echo "<table height = '' align = 'center'><tr><td valign = 'middle' align = 'center'>
<font size = '5'>Aula cadastrada com sucesso!</font></td></tr></table>"; 



?>

<a href="./html/register3.php?class=<?=$class;?>">Cadastrar nova aula</a>

</body>
</html>