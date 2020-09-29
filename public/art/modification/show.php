<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/art_header.php'); ?>
<?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM art ";
    $sql .= "WHERE id='". db_escape($db,$id) ."'";
    $result=mysqli_query($db, $sql);
    confirm_result_set($result);
    $art=mysqli_fetch_assoc($result);
    mysqli_free_result($result);
?>

<div class="content">
    <a href="<?php echo WWW_ROOT.'/art/modification/index.php'?>">&laquo; back to list </a>
    <br>
    <br>
    <div>id = <?php echo $art['id'];?></div>
    <div>type = <?php echo $art['type'];?></div>
    <div>description = <?php echo $art['description'];?></div>
    <br>
    <div id="imgparent">
        <img id="imgdisplay" src="" style="height:200px; width:300px">
    </div>
</div>

<!-- <a href="show.php?name=<?php //echo u('Ramya Bhat');?>">Link</a> -->
<?php
    // $name=$_GET['name'];
    // echo $name; 
?>

<script>
    var map = {
        12: "../../images/image1.jpg",
        15: "../../images/image2.jpg"
    }
    var url = map["<?php echo $id ?>"];
    document.getElementById("imgdisplay").setAttribute("src", url);
    // var image=document.getElementById("imgdisplay");
    // var imgwidth1=image.naturalWidth;
    // var imgheight1=image.naturalHeight;
    // var imgwidth2=image.clientWidth;
    // var imgheight2=image.clientHeight;
    // var aspect=imgheight1/imgwidth1;
    // imgheight2=imgheight2*aspect;
    // imgwidth2=imgwidth2*aspect;
    // document.getElementById("imgdisplay").setAttribute("width",imgwidth2);
    // document.getElementById("imgdisplay").setAttribute("height",imgheight2);
    // console.log("width"+imgwidth2);
    // console.log("height"+imgheight2);
</script>

<?php include(SHARED_PATH . '/art_footer.php'); ?>