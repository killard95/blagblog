<?php
require('Database.php') ;


class Blague_DAO extends Controller {

    private $db_connect ;

    public function create($data)
    {
        $this->db_connect = connectToDB();


        $db = connectToDB();
        $blague = $data['blague'];
        $statement = $db->prepare("
                    INSERT INTO Blagues(blague, id_user)
                    VALUES (:blague, :id_user)
                ");
        try {
            $statement->execute(array(
                ':blague' => $blague,
                ':id_user' => $_SESSION['id_user']
            ));
            ?>
            <meta http-equiv="refresh" content="3; URL=/Views/Dashboard_tpl.php">
            <?php
            echo "blague ajoutée avec succès!"; ;
            return TRUE;
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function getBlague(){

        $db = connectToDB();
        $id = $_SESSION['id_user'];
        $query_blagues = "
        SELECT id_blague, COUNT(DISTINCT id_blague) AS num_blague, blague, Blagues.id_user, User.nickname  FROM `Blagues`
        INNER JOIN `User` ON `User`.`id_user` = `Blagues`.`id_user`
        WHERE Blagues.id_user = $id
        GROUP BY id_blague
        ORDER BY id_blague;
                ";
                $statement = $db->query($query_blagues)->fetchAll(PDO::FETCH_ASSOC);
                $count = 0;
                ?>
                <meta URL=/Blague/get>
                <?php
                echo "<h2>Les Blagues de ".$_SESSION['nickname']."</h2>";
                echo "<table class='table table-striped' border=1><thead><tr class='table-primary'><th>N° de blague</th><th width=100%>Blague</th></tr></thead><tbody>";
                foreach ($statement as $row) {
                    $nom['id'] = $row['num_blague']+$count;
                    $nom['blague'] = $row['blague'];
                    $count++;
                
                  echo "<tr><td><center>".$nom['id']."</center></td><td><center> ".$nom['blague']."</center></td></tr>";
                }
                echo "</tbody></table>";
                if ($count == 0) {
                  $nom['blague'] = '';
                }
                ?>
                <a href="/Views/Dashboard_tpl.php">retour</a>
                <?php
    }

    public function delete($id){
        $db = connectToDB();
        $id = $_SESSION['id_user'];
        $statement = $db->prepare("
                    DELETE FROM Blagues WHERE COUNT(DISTINCT id_blague) AS id_blague = :id_blague
                ");
        try {
            $statement->execute(array(
                ':id_blague' => $id
            ));
            return true;
        } catch (PDOException $e) {
            echo "Erreur : ". $e->getMessage();
        }
    }
}

