<html>
<head>
<title>Insere professor</title>
<link rel="stylesheet" href="../css/general.css">
</head>
<body>
<?php

$class = $_GET['class'];

$link = mysqli_connect("localhost", "root", "", "Senai")
or die("Nao foi possivel conectar ao servidor!");


$nome = $_POST ["nome"];
$directory = 'img_prof/' . $nome . "/";
$arquivo = $_FILES['file'];

$arquivoNovo = explode('.', $arquivo['name']);

 // Lista de tipos de arquivos permitidos
$tiposPermitidos= array('image/jpeg', 'image/pjpeg', 'image/png');
 // Tamanho maximo (em bytes)
$tamanhoPermitido = 4096 * 2000; // 1200 Kb
// O tipo mime do arquivo. Um exemplo pode ser "image/gif"
$arqType = $_FILES['file']['type'];
// O tamanho, em bytes, do arquivo
$arqSize = $_FILES['file']['size'];

if (array_search($arqType, $tiposPermitidos) === false) {
        echo "<center>O tipo de arquivo enviado � inv�lido! <a href='./html/register2.php?class=<?=$class;?>'>Tentar novamente</a></center>";
    // Verifica o tamanho do arquivo enviado
    } else if ($arqSize > $tamanhoPermitido) {
        echo "<center>O tamanho do arquivo enviado � maior que o limite!<a href='./html/register2.php?class=<?=$class;?>'>Tentar novamente</a></center>";
    // N�o houve erros, move o arquivo
    } else {

        if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg') {

            echo '<br>';
            echo "<a href='./html/register2.php?class=<?=$class;?>'>Tentar novamente</a><br><br>";
            die('Você não pode fazer upload deste tipo de arquivo'); 
            
        }else{
            //Diretório onde o arquivo será salvo
            if (!(file_exists( $directory ))) {
                //Criar o diretório
                mkdir($directory, 0777, true);
            }
            //Upload do arquivo
            $file = $arquivo['name'];
            $directory = 'img_prof/' . $nome . "/" . $file;
            move_uploaded_file($arquivo['tmp_name'], $directory);
        }
        
        
        
        
        $insere2 = "INSERT INTO Professores VALUES('DEFAULT','$nome','$directory')";
        
        
        $resultado2 = $link->query($insere2)
        or die("<table height = '' align = 'center'>
        <tr><td valign = 'middle' align = 'center'>
        <font size = '5'>Nao foi possivel cadastrar professor!</font>
        </td></tr></table>");
        
        echo "<table height = '' align = 'center'><tr><td valign = 'middle' align = 'center'>
        <font size = '5'>Professor cadastrado com sucesso!</font></td></tr></table>";
        echo "<a href='./html/register2.php?class=<?=$class;?>'>Cadastrar novo professor</a>";
    }



?>



</body>
</html>