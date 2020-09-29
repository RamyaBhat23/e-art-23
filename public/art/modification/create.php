<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/art_header.php'); ?>

<div class="content">
    <a href="<?php echo WWW_ROOT.'/art/modification/index.php'?>">&laquo; back to list <br><br></a>
</div>

<?php
if(isPostRequest())
{
    $type=$_POST['type']??'';
    //$type=isset($_POST['type'])?$_POST['type']:'';
    $description=$_POST['description']??'';
    $result=insert_art($type, $description);   
    $new_id=mysqli_insert_id($db);
    redirect(WWW_ROOT.'/art/modification/show.php?id=' . $new_id);
}

else
{
    redirect(WWW_ROOT.'/art/modification/new.php');
}
?>
<?php include(SHARED_PATH . '/art_footer.php'); ?>