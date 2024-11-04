<?php
include "auth.php";

if(isset($_POST["AddCategory"])){
    $name = $_POST['category-name'];
    $imageName = $_FILES['category-image']['name'];
    $image = $_FILES['category-image']['tmp_name'];
    $extension = pathinfo( $imageName, PATHINFO_EXTENSION );
    $address = "assets/images/".$imageName;
    if($extension == "png" || $extension == "jpg" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($image, $address)){
            $query = $connect->prepare("insert into categories(name,image) values(?,?)");
            $query->execute([$name,$imageName]);
            echo "<script>alert('category add successfully')</script>";

        }
}
}
// update category
if(isset($_POST['updateCategory'])){
    $categoryName = $_POST['cName'];
    $categoryId = $_POST['cId'];
    if(!empty($categoryImageName = $_FILES['cImage']['name'])){
        $categoryImageName = $_FILES['cImage']['name'];
        $categoryTmpImage =  $_FILES['cImage']['tmp_name'];
        $extension  = pathinfo($categoryImageName,PATHINFO_EXTENSION);
        $filePath = 'assets/images/'.$categoryImageName;
        if($extension == "jpg" || $extension == "jpeg" || $extension == "png" || $extension == "webp"){
    if(move_uploaded_file($categoryTmpImage,$filePath)){
        $query = $connect->prepare("update categories set name= ? , image = ? where id =?");
        $query->execute([$categoryName,$categoryImageName, $categoryId]);
        echo "<script>alert('category update into table')</script>";
    }
        }else{
            echo "<script>alert('you may use only jpg,png,webp or jpeg format ')</script>";
        }
    }else{
        $query = $connect->prepare("update categories set name= ?  where id =?");
      
        $query->execute([$categoryName,$categoryId]);
        echo "<script>alert('category update into table')</script>";
    }
}
// ddeleteCategory
if(isset($_POST['deleteCategory'])){
    $categoryId = $_POST['cId'];
    $query = $connect ->prepare("delete from categories where id = ?");
    $query->execute([$categoryId]);
    echo "<script>alert('category dalete from table');
    </script>";
}

?>