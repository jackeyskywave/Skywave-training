
<?php

if(isset($_SESSION['message'])){
?>
<div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Hey!</strong> <?= $_SESSION['message']; ?>
</div>
<?php 
unset($_SESSION['message']);
}
?>
