<section class="details-container">
        <h2><?= $hike['name'] ?></h2>
        <p><?= $hike['description'] ?></p>
        <p><i class="fa-solid fa-timer fa-x2"></i>Time : <?= $hike['duration'] ?></p>
        <p>elevation gain <?= $hike['elevation_gain'] ?></p>
<p>created by <?= $hike['creator'] ?></p>
        <a href="#" class="button">Réserver</a>

        <a href="/create-hike" class="create-hike-link">Créer une nouvelle randonnée</a>
        <a href="/update-hike?ID=<?= $hike['ID']; ?>" class="update-hike-link">Modifier cette randonnée</a>
        <a href="/delete-hike?ID=<?= $hike['ID']; ?>" class="delete-hike-link">Supprimer cette randonnée</a>

        
</section>


Fatal error: 
Uncaught PDOException: SQLSTATE[23000]: 
Integrity constraint violation: 
1451 Cannot delete or update a parent row: 
a foreign key constraint fails 
(`hamilton-8-triunity`.`manytomany`, CONSTRAINT `manytomany_ibfk_2` FOREIGN KEY (`hikeID`) 
REFERENCES `hiking` (`ID`)) in /application/models/Database.php:27 
Stack trace: #0 /application/models/Database.php(27): PDOStatement->execute() 
#1 /application/models/Hike.php(69): models\Database->query() 
#2 /application/controllers/HikeController.php(110): models\Hike->delete() 
#3 /application/core/Router.php(95): controllers\HikeController->deleteHike() 
#4 /application/public/index.php(11): core\Router->route() 
#5 {main} thrown in /application/models/Database.php on line 27