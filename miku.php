<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mikiu.css">
</head>
<body>
<div class='tytul'>
<?php
$conn = mysqli_connect("localhost", "root", "", "przepraszampana");
    if ($conn -> connect_error) {
      echo "Połączenie się nie powiodło";
 }  else {
    echo "<p>Połączenie się powiodło</p>";
 }
?>
</div>
<div class='sekai'> 
<?php
$conn = mysqli_connect("localhost", "root", "", "przepraszampana");
$sql = "SELECT id, nazwa, email FROM uzytkownicy";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['nazwa'];
    $email = $row['email'];

    echo "<p> Id: $id - Imię: $name - Email: $email </p>";
}
?>

<div class='sekai2'>
<form action='miku.php' method='POST'>
    <label for="">
        <input type='text' name='nazwa' placeholder='Podaj nazwę...'/>
    </label>

    <label for="">
        <input type='text' name='email' placeholder='Podaj email...'/>
    </label>

    <label for="">
        <input type='text' name='haslo' placeholder='Podaj haslo...'/>
    </label>

    <button>Dodaj</button>
</form>
</div>

<?php
if (isset($_POST['insert'])){

    $nazwa = $_POST['nazwa'];
    $email = $_POST['email'];
    $haslo = $_POST['haslo'];

    $sql = "INSERT INTO uzytkownicy (nazwa, email, haslo) VALUES ('$nazwa', '$email', '$haslo')";

    mysqli_query($conn, $sql);
    echo 'wykonane';
    
}
?>
<div class='zdjecie'>
<img src="Firefly_Gemini Flash_Wygeneruj tańczącego assassyna creed'a w sklepe elektronicznym a w tle Kratos który r 485074.png" alt="Sigma">
</div>
<div class='sekai'>
<form action='miku.php' method='POST'>
<label for="id">
        <input type='text' name='id' placeholder='Podaj id...'/>
    </label>

    <label for="nazwa">
        <input type='text' name='nazwa' placeholder='Podaj nazwę...'/>
    </label>

    <label for="email">
        <input type='text' name='email' placeholder='Podaj email...'/>
    </label>

    <button>Dodaj</button>
</form>
</div>
<div class='sekai2'>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $id = $_POST['id'];
        $nazwa = $_POST['nazwa'];
        $email = $_POST['email'];
        
        $sql = "UPDATE uzytkownicy SET nazwa = '$nazwa', email = '$email' WHERE id = '$id'";

        mysqli_query($conn, $sql);
        echo "dodano";
    }


      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $id = $_POST['id'];
        $sql = "DELETE FROM uzytkownicy WHERE id = '$id'";
        
        mysqli_query($conn, $sql);

        echo "Usunięto";
    }
?>
</div>
<div id='Ura'> <!-- Mam zgode na użycie tego nazwiska -->
<?php
$sql = "SELECT id, nazwa, cena FROM produkty WHERE dostępność = 1";
$result = mysqli_query($conn, $sql);
echo ("<table>
<tr> 
<th>id</th>
<th>nazwa</th>
<th>cena</th>
</tr>");
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $nazwa = $row['nazwa'];
    $cena = $row['cena'];
    echo ("
    <tr> 
    <td>$id</td>
    <td>$nazwa</td>
    <td>$cena</td>
    </tr>
    ");
}
echo "</table>";
?>
</div>
<div class='sekai'>
  <form action='miku.php' method='POST'>
    <label for="id">
        <input type='text' name='id' placeholder='Podaj id...'/>
    </label>

    <label for="nazwa">
        <input type='text' name='nazwa' placeholder='Podaj nazwę...'/>
    </label>

    <label for="cena">
        <input type='text' name='cena' placeholder='Podaj cena...'/>
    </label>

    <button>Dodaj</button>
</form>
</div>
<div class='sekai2'>
<?php
if (isset($_POST['insert'])){

    $id = $_POST['id'];
    $nazwa = $_POST['nazwa'];
    $cena = $_POST['cena'];

    $sql = "INSERT INTO produkty (id, nazwa, cena) VALUES ('$id', '$nazwa', '$cena')";
    mysqli_query($conn, $sql);
    echo 'wykonane';
    
}
?>
</div>
<div class='sekai'>
  <form action='miku.php' method='POST'>
    <label for="id">
        <input type='text' name='id' placeholder='Podaj id...'/>
    </label>

    <label for="cena">
        <input type='text' name='cena' placeholder='Podaj cene...'/>
    </label>

    <button>Dodaj</button>
</form>
</div>
<div class='sekai2'>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $id = $_POST['id'];
        $cena = $_POST['cena'];

        $sql = "UPDATE produkty SET cena = '$cena' WHERE id = '$id'";

        mysqli_query($conn, $sql);
        echo "dodano";
    }

  $conn = mysqli_connect("localhost", "root", "", "przepraszampana");
$sql = "SELECT koszyk.id_uzytkownika, nazwa, cena, kategoria FROM produkty INNER JOIN koszyk ON produkty.id = koszyk.id_produktu";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id_uzytkownika'];
    $nazwa = $row['nazwa'];
    $cena = $row['cena'];
    $kategoria = $row['kategoria'];

    echo "<p> ID: $id - Nazwa: $nazwa - Cena: $cena - Kategoria: $kategoria </p>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
    $id = $_POST['id'];   
    $sql = "DELETE FROM koszyk WHERE id_koszyka = '$id'";
        
    mysqli_query($conn, $sql);

    echo "Usunięto";
}
?>
</div>
</body>
</html>