<?php
    include_once("functions.php");

    $updatedata = new DB_con();
    $revision = new DB_con();
    $tbName = "barf_cat";
    $tbName_revision = "stockin_history_cat";
    
    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $total = $_POST['total'];
        $number = $_POST['number'];
        $category = $_POST['name'];

        $sql = $updatedata->stockIn($total, $number, $id, $tbName);
        $revision->revisionHistory($tbName_revision, $category, $number); 
        if($sql) {
            // echo "<script>alert('Updated Successfully!');</script>";
            echo "<script>window.location.href='barf_cat.php'</script>";
        } else {
            echo "<script>alert('Something went wrong! Please try again!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock In - บาร์ฟแมว</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?version=2"></head>

</head>
<body>

    <div class="container">
    <a href="barf_cat.php" class="btn btn-color mt-4 fs-6">Back</a>
        <hr>
        <h1 class="mt-5">Stock In - บาร์ฟแมว</h1>
        <hr>
        <?php
            $id = $_GET['id'];
            $updatesubject = new DB_con();
            $sql = $updatesubject->fetchonerecord($id, $tbName);
            while($row = mysqli_fetch_array($sql)) {
            
        ?>

        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">สูตร</label>
                <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"" readonly>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">คงเหลือ</label>
                <input type="text" class="form-control" name="total" value="<?php echo $row['total']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">จำนวนที่ต้องการเพิ่ม</label>
                <input type="number" class="form-control" name="number" require>
            </div>
            <?php } ?>
            <button type="submit" name="update" class="btn pastel-yellow text-dark">Edit</button>
        </form> 

        <table></table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>