<?php
class Connect{
    public static $pdo;
    public $region_id;
    public $region_name;
    public $region_soato;
    public $region_description;
    public $region_date;
    public $region_created_at;
    public $district_name;
    public $district_soato;
    public $district_description;
    public $district_date;
    public $district_created_at;

    public static function getRegion(){
        $stetament = self::$pdo->prepare("SELECT * FROM regions");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament->execute();
        $regions=$stetament->fetchAll();
        return $regions;
        exit;
    }

    public static function getDistrict(){
        $stetament = self::$pdo->prepare("
        select district.id , regions.name as region_name, district.name, district.soato,district.description, district.district_date,district.created_at from district left join regions on district.region_id = regions.id;
        ");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament->execute();
        $district=$stetament->fetchAll();
        return $district;
        exit;
    }

    public static function getNameSoato($get,$name,$soato){
        $stetament = self::$pdo->prepare("SELECT * FROM $get WHERE name=? || soato=?");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament->execute([$name,$soato]);
        $region=$stetament->fetch();
        return $region;
        exit;
    }

    public static function regionAdd($region_name,$region_soato,$region_description,$region_date){
        $stetament = self :: $pdo -> prepare("INSERT INTO regions (name,soato, description,reg_date) VALUES (?,?,?,?)");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament->execute([
            $region_name,
            $region_soato,
            $region_description,
            $region_date,
        ]);
        header("location:index.php");
        exit;
    }

    public static function ditrictAdd($region_id, $district_name,$district_soato,$district_description,$district_date){
        $stetament = self:: $pdo -> prepare("INSERT INTO district (region_id,name,soato,description,district_date) VALUES (?,?,?,?,?)");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament ->execute([
            $region_id, 
            $district_name,
            $district_soato,
            $district_description,
            $district_date 
        ]);
        header("location:district.php");
        exit;
    }

    public static function deleteDistrict($id){
        $stetament = self::$pdo -> prepare("DELETE FROM district WHERE id=?");
        $stetament->setFetchMode(PDO::FETCH_CLASS,"Connect");
        $stetament->execute([$id]); 
        header("location:district.php");
        exit;
    }
}

?>