<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barferydays - บาร์ฟแมว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?version=2"></head>
</head>
<body>
    <div class="container bg-pastel">
        <a href="index.php" class="btn btn-color mt-4 fs-6">Back</a>
        <h1 class="mt-3">บาร์ฟแมว</h1>
        <hr>
        <a href="stockIn_history_cat.php" class="btn pastel-green mb-3 fs-6 ">StockIn - History</a>
        <a href="stockOut_history_cat.php" class="btn pastel-red mb-3 fs-6 ">StockOut - History</a>
        <table id="mytable" class="table table-success table-striped" style="margin-bottom: 5rem">
        <thead >
            <th>Barfs</th>
            <th>Total</th>
        </thead>

        <tbody>
            <?php
            
                include_once('functions.php');
                $fetchdata = new DB_con();
                $tbName = "barf_cat";
                $sql = $fetchdata->fetchdata($tbName);
                while($row = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td><?php echo $row['name']; ?> </td>
                    <td><?php echo $row['total']; ?> </td>
                    <td>
                        <a id="btn-stockIn" href="stockIn_cat.php?id=<?php echo $row['id']; ?>" class="btn text-dark pastel-green ">Stock In</a> 
                        <a href="stockOut_cat.php?id=<?php echo $row['id']; ?>" class="btn pastel-red text-dark ">Stock Out</a> 
                    </td>
                </tr>
            <?php

                }
            ?>
        </tbody>
    </table>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>