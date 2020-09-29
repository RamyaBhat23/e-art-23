<!--single-page processing. like combination of new.php & create.php files in a single file-->

<!-- <?php phpinfo();?> -->
<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/art_header.php'); ?>

<?php
if(!isset($_GET['id']))
{
    redirect(WWW_ROOT.'/art/modification/index.php');
}

$id=$_GET['id'];

//editing previous data
if(isPostRequest())
{
    $art=[];
    $art['type']=$_POST['type']??'';
    $art['description']=$_POST['description']??'';

    $sql = "UPDATE art SET ";
    $sql .= "type='" . $art['type'] . "', ";
    $sql .= "description='" . $art['description'] . "' ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result=mysqli_query($db, $sql);

    if($result)
    {
        redirect(WWW_ROOT.'/art/modification/show.php?id='.$id);
    }
    
    else
    {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

//to display previous data
else
{
    $sql = "SELECT * FROM art ";
    $sql .= "WHERE id='".$id."'";
    $result=mysqli_query($db, $sql);
    confirm_result_set($result);
    $art=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}
?>

<div class="content">
    <a href="<?php echo WWW_ROOT.'/art/modification/index.php'?>">&laquo; back to list </a>
    <br>
    <br>
    <form action="<?php echo WWW_ROOT.'/art/modification/edit.php?id='.$id?>" method="post">
    <!-- if it is show.php, edit won't take place.
    if it is new.php even after with & without editing it goes to new.php. no effect of edit.
    it can be empty -->
        <div>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" value="<?php echo $art['type']?>">
        </div>
        <br>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo $art['description']?>">
        </div>
        <br>
        <div>
            <input type="submit" id="submit" name="submit" value="Edit" class="btn btn-primary submit">
        </div>
    </form>
</div>

<?php include(SHARED_PATH . '/art_footer.php'); ?>