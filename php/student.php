<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="senai_software">
    <link rel="stylesheet" href="../css/general.css">
    <title>Gestão de Aula - Senai</title>
</head>
<body>
    <div class="sort">
        
        <h1>Aluno Sorteado:</h1>
        <h2>
        <?php 
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
            
            $num = floor(((float)rand()/(float)getrandmax())*$i2);
            
            echo $students[$num];

        ?>
        </h2>
        <a href="student.php?class=<?=$class;?>" class="a_sort">Sortear Outro Aluno</a>
    </div>
    
</body>
</html>