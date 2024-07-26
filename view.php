<?php
  $pageTitle = 'View Images';
  include './inc/header.php';
  include './inc/navbar.php';
  require "./inc/database.php";
  $stmt = $conn->prepare('select * from uploadimages');
  $stmt->execute();
  $imagelist = $stmt->fetchAll();
?>
<div class="view-container">
</div>
  <section class="image-row row">
<?php
  foreach($imagelist as $image) {
 ?>
    <div class="col-sm-12 col-md-3 col-lg-3"> 
      <img src="<?php echo $image['image']?>" alt="<?=$image['name'] ?>" class="img-fluid" >
      <p><?php echo $image["name"]; ?></p>
    </div>
<?php
}
?>
  </section>
<?php include './inc/footer.php'; ?>

