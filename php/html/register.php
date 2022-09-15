<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="senai_software">
    <link rel="stylesheet" href="../../css/general.css">
    <title>Gestão de Aula - Senai</title>
</head>
<body>
    <?php
        $class = $_GET['class'];
    ?>
    <form action="../register_student.php?class=<?=$class;?>" method="post" class="form_register">
        <table align = "center">
        <tr>
        <td colspan="2">
        <h3>Aluno</h3>
        </td>
        </tr>
        <tr>
        <td colspan="2">
            <div class="input-group">
                <input required="" type="text" name="nome" autocomplete="off" class="input" placeholder="Nome"> 
            </div>
        </td>
        </tr>
        <td align = "left">
        <input type = "reset" value = "Limpar" class="btn">
        </td>
        <td align = "right">
        <input type = "submit" value = "Cadastrar" class="btn">
        </td>
        </table>
    </form>
</body>
</html>