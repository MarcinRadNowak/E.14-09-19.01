<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane o zwierzętach</title>
    <link rel="stylesheet" href="styl3.css">
</head>
<body>
    <header>
        <h1>ATLAS ZWIERZĄT</h1>
    </header>
    <div id="formularz">
        <h2>Gromady</h2>
        <ol>
            <li>Ryby</li>
            <li>Płazy</li>
            <li>Gady</li>
            <li>Ptaki</li>
            <li>Ssaki</li>
        </ol>
        <form action="" method="POST">
            <label>Wybierz gromadę</label>
            <input type="number" name="wybor">
            <button type="submit">Wyświetl</button>
        </form>
    </div>
    <div id="lewy">
        <img src="zwierzeta.jpg" alt="dzikie zwierzęta">
    </div>
    <div id="srodkowy">
        <?php
            $conn=mysqli_connect('localhost','root','','gatunki');
            @$wybor=$_POST['wybor'];
            if($wybor==1){
                echo '<h2>'."RYBY".'</h2>';
            }
            elseif($wybor==2){
                echo '<h2>'."PŁAZY".'</h2>';
            }
            elseif($wybor==3){
                echo '<h2>'."GADY".'</h2>';
            }
            elseif($wybor==4){
                echo '<h2>'."PTAKI".'</h2>';
            }
            elseif($wybor==5){
                echo '<h2>'."SSAKI".'</h2>';
            }
            $sql="SELECT gatunek, wystepowanie FROM zwierzeta where gromady_id='$wybor'";
            $result=mysqli_query($conn, $sql);
            while($row=mysqli_fetch_assoc($result)){
                echo $row['gatunek'].", ".$row['wystepowanie'].'<br>';
            }
        ?>
    </div>
    <div id="prawy">
        <h2>Wszystkie zwierzęta w bazie</h2>
        <?php
            $sql2="SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa FROM zwierzeta, gromady WHERE zwierzeta.Gromady_id=gromady.id";
            $result2=mysqli_query($conn, $sql2);
            while($row=mysqli_fetch_assoc($result2)){
                echo $row['id'].". ".$row['gatunek'].", ".$row['nazwa'].'<br>';
            }
            mysqli_close($conn);
        ?>
    </div>
    <footer>
        <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
        <label>autor Atlasu zwierząt: 0000000</label>
    </footer>
</body>
</html>