<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id']))
{
  redirect(WWW_ROOT.'/art/modification/index.php');
}

$id = $_GET['id'];

if(isPostRequest()) 
{
  $sql="DELETE FROM art ";
  $sql.="WHERE id='".db_escape($db,$id)."' ";
  $sql.="LIMIT 1";
  $result=mysqli_query($db, $sql);

  if($result)
  {
    redirect(WWW_ROOT.'/art/modification/index.php');
  }
  else
  {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
?>

<?php //$page_title = 'Delete art'; ?>

<?php include(SHARED_PATH . '/art_header.php'); ?>

<div class="content">
  <a href="<?php echo WWW_ROOT.'/art/modification/index.php'; ?>">&laquo; back to list </a>
  <br>
  <br>
  <p>Are you sure you want to delete this art?</p>
  <form action="<?php echo WWW_ROOT.'/art/modification/delete.php?id=' . h(u($id)); ?>" method="post">
      <input type="submit" name="commit" value="Delete" class="btn btn-primary submit"/>
  </form>
</div>

<?php include(SHARED_PATH . '/art_footer.php'); ?>