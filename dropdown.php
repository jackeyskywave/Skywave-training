<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
      if(isset($_SESSION['message'])){
//         ?>
        <div class="alert alert-success alert-dismissible">
   <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   <strong>Hey!</strong> <?= $_SESSION['message']; ?>
 </div>
<?php 
unset($_SESSION['message']);
}
?>
    <form action="dropinsert.php" method="POST">
    
    <label><b>Course:</b></label>
                            <select name="course[]" multiple class="select form-control">
                                <option value="Web Designing">Web Designing</option>
                                <option value="Web Development">Web Development</option>
                                <option value="App Development">App development</option>
                                <option value="Game development">Game Development</option>
                                <option value="Graphic Designing">Graphic Desiging</option>
                                <option value="Digital marketing">Digital Marketing</option>
                            </select>

        <button type="submit" name='submit'>Submit</button>
    </form>
</body>
</html>