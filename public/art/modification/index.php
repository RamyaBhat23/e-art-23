<?php require_once('../../../private/initialize.php'); ?>
<?php $page_title; ?>

<?php include(SHARED_PATH . '/art_header.php'); ?>

<?php
$art_set=find_all_art();
// $art = [
//      ['id'=>'1' , 'type'=>'Portrait' , 'description' => 'Used graphite pencils'],
//      ['id'=>'2' , 'type'=>'Portrait' , 'description' => 'Used brustro sketch paper'],
//      ['id'=>'3' , 'type'=>'Water color painting' , 'description' => 'Used camlin water color']
//  ];
?>

<div class="main_content">
    <a href="<?php echo WWW_ROOT.'/art/modification/new.php'?>"> Add New Art </a>
    <br>
    <br>
    <div class="container scroll">
        <table class="table">
            <thead>
                <th>Art id</th>
                <th>Type</th>
                <th>Description</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </thead>
            <?php while($art=mysqli_fetch_assoc($art_set)) {?>
            <tr>
                <td><?php echo $art['id']; ?></td> 
                <td><?php echo $art['type']; ?></td>
                <td><?php echo $art['description']; ?></td>
                <td><a href="<?php echo WWW_ROOT.'/art/modification/show.php?id='. h(u( $art['id'])); ?>"> view </a></td>
                <td><a href="<?php echo WWW_ROOT.'/art/modification/edit.php?id='. h(u( $art['id'])); ?>"> edit </a></td>
                <td><a href="<?php echo WWW_ROOT.'/art/modification/delete.php?id='. h(u( $art['id'])); ?>"> delete </a></td>
            </tr>
            <?php } ?>
        </table>
        <?php mysqli_free_result($art_set);?><!-- to free up memory -->
    </div>
</div>

<?php include(SHARED_PATH . '/art_footer.php'); ?>