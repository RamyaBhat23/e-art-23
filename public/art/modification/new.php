<!-- <?php //phpinfo();?>//to check buffering is on/off -->
<?php require_once('../../../private/initialize.php');?>
<?php include(SHARED_PATH . '/art_header.php'); ?>
<?php
    // $test=$_GET['test']??'';

    // if($test=='404')
    // {
    //     error_404();
    // }

    // else if($test=='500')
    // {
    //     error_500();
    // }

    // else if($test=='redirect'){
    //     redirect(WWW_ROOT.'/art/modification/index.php');
    // }
    
    // else{
    //     echo 'no error';
    // }
?>

<div class="content">
    <a href="<?php echo WWW_ROOT.'/art/modification/index.php'?>">&laquo; back to list </a>
    <br>
    <br>
    <form action="<?php echo WWW_ROOT.'/art/modification/create.php' ?>" method="post">
        <div>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type">
        </div>
        <br>
        <div>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
        </div>
        <br>
        <div>
            <input type="submit" id="submit" name="submit" value="Add" class="btn btn-primary submit">
        </div>
    </form>
</div>

<?php include(SHARED_PATH . '/art_footer.php'); ?>