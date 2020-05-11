<?php 
    include "includes/admin-header.php";
    include "includes/admin-nav.php";
?>
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin!
                        <small>Author</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="col-xs-6">
              <?php 
                if(isset($_POST['submit'])) {
                  $cat_title = $_POST['cat_title'];
                  if($cat_title == "" || empty($cat_title)) {
                    echo "<h4 class='text-info'>Please add a category</h4>";
                  } else {
                    $query = "INSERT INTO categories(cat_title) ";
                    $query .= "VALUE('{$cat_title}')";

                    $create_cat_query = mysqli_query($connection, $query);

                    if(!$create_cat_query) {
                      die("<p class='text-danger'>QUERY FAILED " . mysqli_error($connection) . "</p>");
                    }
                  }
                }
              ?>
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Add Category</label>
                  <input class="form-control" type="text" name="cat_title">
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                </div>
              </form>
              <form action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Update Category</label>
                  <input class="form-control" type="text" name="cat_title">
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="submit" value="Update Category">
                </div>
              </form>
            </div>

            <div class="col-xs-6">
              <?php 
                $query = "SELECT * FROM categories";
                $select_cat_sidebar = mysqli_query($connection, $query);
              ?>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  // Find all categories
                  $query = "SELECT * FROM categories";
                  $select_cat_sidebar = mysqli_query($connection, $query);
                  while($row = mysqli_fetch_assoc($select_cat_sidebar)) {
                      $cat_id = $row['cat_id'];
                      $cat_title = $row['cat_title'];
                      echo "<tr><td>{$cat_id}</td><td>{$cat_title}</td><td><a href='categories.php?delete={$cat_id}'>Delete</a></td></tr>";
                  }
                ?>

                <?php
                  // Delete query categories
                  if(isset($_GET['delete'])) {
                    $get_cat_id = $_GET['delete'];
                    $query = "DELETE FROM categories WHERE cat_id = {$get_cat_id} ";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: categories.php");
                  }
                ?>
                </tbody>
              </table>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php 
    include "includes/admin-footer.php";
?>