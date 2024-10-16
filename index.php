<?php
include("config/config.php");

$config=new Config();

$fetch_stud_res=$config->fetch_all_record();

if(isset($_REQUEST['submit_btn'])){
    $name=$_REQUEST['name'];
    $age=$_REQUEST['age'];
    $course=$_REQUEST['course'];

    $fetch_stud_res=$config->fetch_all_record();
 
    $res=$config->insert($name,$age,$course);  
    
    if($res){
        //header("Location: dashboard.php");
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success !</strong> Record inserted successfully...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div></div>';

    }else{
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Faliare !</strong> Record insertion failed...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div></div>';
    }
}

if(isset($_REQUEST['btn_delete'])){
    $delete_id=$_REQUEST['delete_id'];
    $res=$config->delete_record($delete_id);
    if($res){
        //header("Location: dashboard.php");
        echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Record deleted successfully...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div></div>';

    }else{
        echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Faliare !</strong> Record delete failed...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div></div>';
    }
}

$fetched_single_student=null;
$edit_id=$_REQUEST['edit_id'];

if(isset($_REQUEST['btn_edit'])){
   


    $res=$config->fetch_single_student($edit_id);
    $fetched_single_student=mysqli_fetch_assoc($res);
}
if(isset($_REQUEST['update_btn'])){
    
    $name=$_REQUEST['name'];
    $age=$_REQUEST['age'];
    $course=$_REQUEST['course'];

    $fetch_stud_res=$config->fetch_all_record();
 
    $res=$config->update($name,$age,$course,$edit_id);  
    
    
if($res){
    //header("Location: dashboard.php");
    echo '<div class="container pt-5"><div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> Record Updated successfully...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div></div>';

}else{
    echo '<div class="container pt-5"><div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Faliare !</strong> Record update failed...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div></div>';
}}
?>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container pt-5">
    <div class="col col-4">
        <form action="" method="POST">

         Name :<input type="text" class="form-control" name="name" value="<?php if($fetched_single_student!=null){echo $fetched_single_student['name'];}?>"/><br>
         Age :<input type="number"class="form-control"  name="age" value="<?php if($fetched_single_student!=null){echo $fetched_single_student['age'];}?>"/><br>
        Course :<input type="text" class="form-control" name="course" value="<?php if($fetched_single_student!=null){echo $fetched_single_student['course'];}?>"/><br>
        <button name="<?php if($fetched_single_student!=null){echo 'update_btn';}else{echo 'submit_btn';}?>" class="btn <?php if($fetched_single_student!=null){echo 'btn-warning ';}else{echo 'btn-primary';}?>" >
            <?php if($fetched_single_student==null){?>
            Add Student
            <?php }else{ ?>
             Update Student 
             <?php }?>
        
        </button>

         </form>
    </div>
    <div class="col col-6">
       <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Course</th>
                    <th colspan=2>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php while($record=mysqli_fetch_assoc($fetch_stud_res) ){?>
                <tr>
                    <td><?php  echo $record['id']?></td>
                    <td><?php  echo $record['name']?></td>
                    <td><?php  echo $record['age']?></td>
                    <td><?php  echo $record['course']?></td>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="edit_id" value="<?php  echo $record['id']?>"/>
                    <button class="btn btn-warning" name="btn_edit">Edit</button>
                    </form></td>
                    <td>
                    <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?php  echo $record['id']?>"/>
                        <button class="btn btn-danger" name="btn_delete">Delete</button>
                    </form></td>
                </tr>
                <?php   } ?>
            </tbody>
       </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>