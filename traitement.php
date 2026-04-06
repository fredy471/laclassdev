<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-5.3.5-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="image/icone.jpg">
        <title>Laclass Dev|contact</title>
        
    </head>
    <body>
    <center><h2>Formulaire d'enregistrement</h2></center>
        <div>
           
            
        <center>
            <p>
                <?php 
            
               
                if($_SERVER["REQUEST_METHOD"] ==="POST"){

                     if (isset($_POST["send"])) {

                        $nom=htmlspecialchars($_POST["nom"]);
                        $prenom=htmlspecialchars($_POST["prenom"]);
                        $email=htmlspecialchars($_POST["email"]);
                        $num=htmlspecialchars($_POST["numero"]);
                        $pays=htmlspecialchars($_POST["pays"]);

                        $username = "root";
                        $password = "chef12er";
                        $host='localhost';
                        $dbname = "laclassdev";

                        try{
                            $conn= new PDO ("mysql:host=$host;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                             
                            $sql="INSERT INTO personne (nom, prenom, email, numero, pays) VALUES (:nom, :prenom, :email, :numero, :pays)";
                            $stmt=$conn->prepare($sql);
                            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
                            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                            $stmt->bindParam(':numero', $num,PDO::PARAM_INT);
                            $stmt->bindParam(':pays', $pays,PDO::PARAM_STR);
                            $stmt->execute();  
                        } 
                            catch(PDOException $e) {
                                echo "Connection failed: " . $e->getMessage();
                                }  

                               
                          
                    }else {
                        echo "<p style='background-color:red; color:white; width:400px;>'aucune donnee enregistree</p>";
                    }
                   
                }
               

                echo  "<p style='color:white;background:rgb(250,100,250); width:400px;'><a href='test.php'>afficher tout les donnees</a></p>"

               

    

              
            
               
           
                ?>
                
            </p>
        </center>
        </div>   

    </body>
</html>