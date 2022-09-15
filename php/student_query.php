<head>
    <link rel="stylesheet" href="../css/general.css">
</head>

<body bgcolor="#FFFFFF" class="query">

<?php


//Conexão e consulta ao Mysql

$class = $_GET['class'];

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

$i = 1;

?>
<div class="query">
    <table class="table2">
        <tr class="tr">
            <td class="title">ID</td>
            <td class="title">NOME</td>
        </tr>
        <?php while ($data = $qry->fetch_array()) { 
               if ($data['Cod_turma'] == $cod_turma) { 
            ?>
            <tr class="tr">
                <td class="tabi"><?php echo $i;?></td>
                <td class="tab"><?php echo $data['Nome_aluno'];?></td>
            </tr>
        <?php $i++;}} ?>
    </table>
</div>
</body>