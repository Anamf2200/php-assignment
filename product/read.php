<?php
include(__DIR__ . "/../basic/startlink.php");
include(__DIR__ . "/../basic/config.php");?>


<div class="container">
    <div class="row">
        <?php

$show= $conn->prepare('SELECT * FROM `product`');
$show->execute();
$data=$show->fetchAll();
if(count($data)>0){

    ?>

<div class="col-12">
    <table class="table table-striped table-success table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th>Actions</th>
            <th>Actions</th>
        </tr>
        <?php
$num=1;
        foreach($data as $row){
            ?>
            <tr>
                <td><?php echo $num?></td>
                <td><?php echo $row['Name']?></td>
                <td><?php echo $row['Description']?></td>
                <td><?php echo $row ['Price']?></td>
                <td>
                    <img src="./uploads/<?php echo $row ['Image']?>" alt=""></td>
                    <td><a class="btn btn-primary" href="./update.php?update=<?php echo $row['Id']?>">Update</td>
                     <td><a class="btn btn-primary" href="./delete.php?delete=<?php echo $row['Id']?>">Delete</td>
            

            </tr>
            
            <?php
            $num++;
        }
}

?>
</table>
</div>
    </div>
</div>


<?php

include (__DIR__ . "/../basic/endlinks.php");

?>