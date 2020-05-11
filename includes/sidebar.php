<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
    <div class="input-group">
        <input type="text" name="search" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    <!-- /.input-group -->
    </form>
</div>

<?php 
    $query = "SELECT * FROM categories";
    $select_cat_sidebar = mysqli_query($connection, $query);
?>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
                <?php
                    while($row = mysqli_fetch_assoc($select_cat_sidebar)) {
                        $cat_title = $row['cat_title'];
                        echo "<li><a href='<?php echo {$cat_title}; ?>'>{$cat_title}</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>

</div>