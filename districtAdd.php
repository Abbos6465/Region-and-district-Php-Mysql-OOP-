<?php
$title = "Add District";
require_once "./includes/header.php";
$regions = Connect::getRegion();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $region_id = $_POST["region_id"];
    $district_name = $_POST['district_name'];
    $district_soato = $_POST["district_soato"];
    $district_description = $_POST["district_description"];
    $district_date = $_POST["district_date"];
    $get = "district";
    $has_district = Connect::getNameSoato($get,$district_name,$district_soato);
    
    if(!$has_district){
        $_SESSION["districtAdd"] = "DISTRICT ADD SUCCESSFULLY";
        Connect::ditrictAdd($region_id,$district_name,$district_soato,$district_description,$district_date);
        
    }
    else{
        $_SESSION["districtWrong"] = "NAME OR SOATO ENTERED BEFORE";
    }
}   
?>

<div class="container">
    <div class="p-5 mx-auto my-5">
        <?php if($_SESSION["districtWrong"]):?>
            <div class='alert alert-danger text-center' role='alert'>   
                <?php 
                    echo $_SESSION['districtWrong'];
                    unset($_SESSION['districtWrong']);

                    // session_unset();
        ?>
        </div>
        <?php endif; ?>
        <div class="card p-5 mt-5 rounded shadow">
                <h1 class="text-center">ADD DISTRICT</h1>
                <form action="" method="POST">
                <label class="form-label">Which region does this district belong to</label>
                <select name="region_id" class="form-select mb-3" aria-label="Default select example">
                        <?php foreach($regions as $reg): ?>
                            <option  value="<?= $reg->id ?>"><?= $reg->name ?></option>
                        <?php endforeach; 
                    
                        ?>
                </select>
                    <label class="form-label">Enter District name</label>
                    <input type="text" name="district_name" class="form-control mb-2" required>
                    <label class="form-label">Enter District soato</label>
                    <input type="number" min="1000000" max="9999999" required name="district_soato"  class="form-control mb-2">
                    <label class="form-label">Enter District description</label>
                    <input type="text" required name="district_description" class="form-control mb-2">
                    <label class="form-label">Enter District date</label>
                    <input type="date" required name="district_date" class="form-control mb-3">
                    <button class="btn btn-success d-block w-75 mx-auto py-2" type="submit">ADD</button>
                </form>
        </div>
    </div>
</div>

<?php require_once "./includes/footer.php" ?>