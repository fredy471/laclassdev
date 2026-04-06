<center>

<?php 
  $username='root';
  $host='localhost';
  $password='chef12er';
  $dbname='laclassdev';
  $dns="mysql:host=$host;dbname=$dbname";

  try {
    $conn = new PDO($dns, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM personne WHERE id_personne=? AND prenom=?";
    $stmt = $conn->prepare($sql);
    $id=2;
    $prenom='fredy';
    $stmt->execute([$id,$prenom]);
    while($row=$stmt->fetch()){
      echo $row['nom'].'-'.$row['prenom'].' email: '. $row['email'].' tel: '. $row['numero']. $row['pays']. "<br/>";

    
    }
   
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
 

?>
</center>