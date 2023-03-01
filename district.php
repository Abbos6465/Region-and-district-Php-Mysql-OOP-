<?php
$title = "District";
require_once "./includes/header.php";
$districts = Connect::getDistrict();

if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["DELETE"])){
    $id=$_POST["id"];
    // echo $id;
    Connect::deleteDistrict($id);
}
?>

<div class="container mb-5">
        <h1 class="text-center my-3">District data table</h1>
        <?php if(isset($_SESSION["districtAdd"])):?>
            <div class='alert alert-success text-center' role='alert'>   
                <?php 
                    echo $_SESSION['districtAdd'];
                    unset($_SESSION['districtAdd']);
                 ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Region name</th>
                    <th>Name</th>
                    <th>Soato</th>
                    <th>Description</th>
                    <th>Region date</th>
                    <th>Created at</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($districts as $district): ?>
                    <tr>
                        <td><?= $district->id ?></td>
                        <td><?= $district->region_name ?></td>
                        <td><?= $district->name ?></td>
                        <td><?= $district->soato ?></td>
                        <td><?= $district->description ?></td>
                        <td><?= $district->district_date ?></td>
                        <td><?= $district->created_at ?></td>
                        <td>
                            <form action="" method="POST">
                            <input type="hidden" name="DELETE">
                            <input type="hidden" name="id"  value="<?= $district->id ?>">
                            <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php  require_once "./includes/footer.php" ?>