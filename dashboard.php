<?php
include("config/config.php");

$config=new Config();

$fetch_stud_res=$config->fetch_all_record();



?>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container pt-5">
    <div class="col col-6">
       <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>
                <?php while($record=mysqli_fetch_assoc($fetch_stud_res) ){?>
                <tr>
                    <td><?php  echo $record['id']?></td>
                    <td><?php  echo $record['']?></td>
                    <td><?php  echo $record['']?></td>
                    <td><?php  echo $record['']?></td>
                </tr>
                <?php   } ?>
            </tbody>
       </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>