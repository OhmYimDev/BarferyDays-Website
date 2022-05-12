<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StockIn History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?version=2"></head>
</head>
<body>
    <div class="container">
    <a href="barf_cat.php" class="btn btn-color mt-4 fs-6">Back</a>
    <h1 class="mt-3 fs-3">StockIn History : Cat</h1>
    <hr>
    <table id="mytable" class="table table-success table-striped">
        <thead>
            <th>Category</th>
            <th>amount</th>
            <th>Date Time</th>
        </thead>

        <tbody>
            <?php
            
                include_once('functions.php');
                
                $fetchdata = new DB_con();
                $tbName = "stockin_history_cat";
                $sql = $fetchdata->fetchdataRevision($tbName);
                while($row = mysqli_fetch_array($sql)) {
            ?>
                <tr>
                    <td>Stock In : <?php echo $row['category']; ?> </td>
                    <td><?php echo $row['amount']; ?> </td>
                    <td><?php echo $row['date_time']; ?> </td>
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