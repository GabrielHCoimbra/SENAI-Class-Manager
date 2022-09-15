<html>
<head>
<title>Insere aluno</title>
<link rel="stylesheet" href="../css/general.css">
</head>
<body>
<?php

$class = $_GET['class'];

$link = mysqli_connect("localhost", "root", "", "Senai")
or die("Nao foi possivel conectar ao servidor!");

$query = "SELECT * FROM Turmas";
$qry = $link->query($query) or die ($link->error);

$nome = $_POST ["nome"];

$cod_class;

while ($data = $qry->fetch_array()){
    if ($data['Nome_turma'] == $class) {
        $cod_class = $data['Cod_turma'];
    }
}

$insere2 = "INSERT INTO Alunos VALUES('DEFAULT','$nome','$cod_class')";



$resultado1 = $link->query("USE Senai");

$query2 = "SELECT * FROM Alunos";
$qry2 = $link->query($query2) or die ($link->error);


$resultado2 = $link->query($insere2)
or die("<table height = '' align = 'center'>
<tr><td valign = 'middle' align = 'center'>
<font size = '5'>Nao foi possivel cadastrar aluno!</font>
</td></tr></table>");

echo "<table height = '' align = 'center'><tr><td valign = 'middle' align = 'center'>
<font size = '5'>Aluno cadastrado com sucesso!</font></td></tr></table>"; 



?>

<a href="./html/register.php?class=<?=$class;?>">Cadastrar novo aluno</a>

</body>
</html>