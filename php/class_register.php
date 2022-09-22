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


$nome = $_POST ["nome"];


$insere2 = "INSERT INTO Turmas VALUES('DEFAULT','$nome')";


$resultado2 = $link->query($insere2)
or die("<table height = '' align = 'center'>
<tr><td valign = 'middle' align = 'center'>
<font size = '5'>Nao foi possivel cadastrar aluno!</font>
</td></tr></table>");

echo "<table height = '' align = 'center'><tr><td valign = 'middle' align = 'center'>
<font size = '5'>Turma cadastrada com sucesso!</font></td></tr></table>"; 



?>

<a href="./html/register3.php?class=<?=$class;?>">Cadastrar nova turma</a>

</body>
</html>