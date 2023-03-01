<?php
$title = "Add Region";
require_once "./includes/header.php";
$regions = Connect::getRegion();
?>

    

    <div class="container mb-5">
        <h1 class="text-center my-3">Region data table</h1>
        <?php if(isset($_SESSION["regionAdd"])):?>
            <div class='alert alert-success text-center' role='alert'>   
                <?php 
                    echo $_SESSION['regionAdd'];
                    unset($_SESSION['regionAdd']);
                    // session_unset();
                 ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Soato</th>
                    <th>Description</th>
                    <th>Region date</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($regions as $region): ?>
                    <tr>
                        <td><?= $region->id ?></td>
                        <td><?= $region->name ?></td>
                        <td><?= $region->soato ?></td>
                        <td><?= $region->description ?></td>
                        <td><?= $region->reg_date ?></td>
                        <td><?= $region->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php require_once "./includes/footer.php" ?>