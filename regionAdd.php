<?php
$title = "Add region";
require_once "./includes/header.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $region_name=$_POST['region_name'];
    $region_soato=$_POST["region_soato"];
    $region_description=$_POST['region_description'];
    $region_date=$_POST["region_date"];
    $get = "regions";
    $has_region = Connect::getNameSoato($get,$region_name,$region_soato);
    if(!$has_region){
            $_SESSION['regionAdd'] = "REGION ADD SUCCESSFULLY";
            Connect::regionAdd($region_name,$region_soato,$region_description,$region_date);
            $_SESSION["regionWrong"] = "name or soato entered before";
            header("location:regionAdd.php");
        
        }   
        else{
            $_SESSION["regionWrong"] = "NAME OR SOATO ENTERED BEFORE";
        }
}
?>

<div class="container">
    <div class="p-5 mx-auto my-5">
    <?php if(isset($_SESSION["regionWrong"])):?>
        <div class='alert alert-danger text-center' role='alert'>   
            <?php 
            echo $_SESSION['regionWrong'];
            unset($_SESSION["regionWrong"]);
            ?>
        </div>
    <?php endif; ?>
        <div class="card p-5 mt-5 rounded shadow">
                <h1 class="text-center">ADD REGION</h1>
                <form action="" method="POST">
                    <label class="form-label">Enter Region name</label>
                    <input type="text" name="region_name" class="form-control mb-2" required>
                    <label class="form-label">Enter Region soato</label>
                    <input type="number" min="10000" max="99999" required name="region_soato" class="form-control mb-2">
                    <label class="form-label">Enter Region description</label>
                    <input type="text" required name="region_description" class="form-control mb-2">
                    <label class="form-label">Enter Region date</label>
                    <input type="date" required name="region_date" class="form-control mb-3">
                    <button class="btn btn-success d-block w-75 mx-auto py-2" type="submit">ADD</button>
                </form>
        </div>
    </div>
</div>

<?php 
require_once "./includes/footer.php"; 
?>