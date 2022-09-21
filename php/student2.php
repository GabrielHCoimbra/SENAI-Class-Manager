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
        <?php 
            $class = $_GET['class'];
        ?>
        <form action="teams.php?class=<?=$class;?>" method="post">
            <h1>Digite o número de grupos:</h1>
            <input type="number" name="num_gr" class="input" required>
            <h1>Digite o número de alunos por grupo:</h1>
            <input type="number" name="num_gr_al" class="input" required>

            <input type="submit" value="Sortear Aluno" class="a_sort">

        </form>
        

        
    </div>
    
</body>
</html>