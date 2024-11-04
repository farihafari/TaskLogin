<?php
session_start();
include "model/category.php";
if(!isset($_SESSION['userName'])){
    echo "<script>
    location.assign('login.php')
    </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        
            <div class="row justify-content-end px-3">
            <div class="col-lg-2">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><?php
                        if(isset($_SESSION['userName'])){

                        
                        echo $_SESSION['userName'];
                        }else{
                            echo 'no user logged in ';
                        }
                        ?></a>
                    </li>
                </ul>
            </div>
    </div>

   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="category-result"></div>
      <form id="addCategoryForm" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="" class="form-label">Category Name</label>
                    <input
                        type="text"
                        name="category-name"
                        id="category-name"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                    />
                    <small></small>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">category Image</label>
                    <input
                        type="file"
                        name="category-image"
                        id="category-image"
                        class="form-control"
                        placeholder=""
                        aria-describedby="helpId"
                    />
                    <small></small>
                </div>
                
                <button
                    type="submit"
                    class="btn btn-outline-primary"
                    id="AddCategory" name="AddCategory"
                >
                    Submit
                </button>
                </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
    
    </div>

    <!-- view  category-->
<div class="container">
    <div class="row">
    <div class="col-md-12">
                        <h3 class="py-3 px-3">All categories</h3>
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Category Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Image</th>
                                        <th scope="col" colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $connect ->query("select * from categories");
                                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($row as $catRows){
                                        ?>
                                          <tr>
                                        <th scope="row"><?php echo $catRows['id']?></th>
                                        <td><?php echo $catRows['name']?></td>
                                        <td><img src="assets/images/<?php echo $catRows['image']?>" width="80" alt=""></td>
                                        <td><a href="#mod<?php echo $catRows['id']?>" data-bs-toggle="modal"><i class="fas fa-edit" style="color: #74C0FC;"></i></a></td>
                                        <td><a href="#delete<?php echo $catRows['id']?>" data-bs-toggle="modal"><i class="fas fa-trash" style="color: red;"></i></a></td>
                                    </tr>
                                        

<!--update Modal -->
<div class="modal fade" id="mod<?php echo $catRows['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="cId" id="" value="<?php echo $catRows['id']?>">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="cName" value="<?php echo $catRows['name']?>">
                                  
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Category Image</label>
                                    <input type="file" class="form-control" id="exampleInputPassword1" name="cImage">
                                    <img src="assets/images/<?php echo $catRows['image']?>" width="80" alt="">
                                </div>
                               
                                <button type="submit" name="updateCategory" class="btn btn-primary">Update Category</button>
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>


<!-- delete Modal -->
<div class="modal fade" id="delete<?php echo $catRows['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Categories</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post">
      <input type="hidden" name="cId" id="" value="<?php echo $catRows['id']?>">
                              
                               
                                <button type="submit" name="deleteCategory" class="btn btn-primary">Delete Category</button>
                            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
      
      </div>
    </div>
  </div>
</div>

                                        <?php
                                    }
                                    ?>
                                  
                               
                                </tbody>
                            </table>
                    </div>
    </div>
</div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/script.js"></script>

</body>

</html>