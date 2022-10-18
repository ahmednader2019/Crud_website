<?php
 require("../Sec_Project/php/component.php");
 require("../Sec_Project/php/operation.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <!-- CSS only -->
    <link rel ="stylesheet" href="styles.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 
    <script src="https://kit.fontawesome.com/5ecda93540.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
  <main> 
    <div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded"><i class="fa-solid fa-book"></i></i>Courses</h1>
    <div class="d-flex justify-content-center">
      <form action="" method="post" class="w-50">
      <div class="pt-2">
      <?php inputElement("<i class='fas fa-id-badge'></i>","ID" ,"course_id",setID());?>
      </div>
      <div class="pt-2">
      <?php inputElement("<i class='fas fa-book'></i>","Course Name" ,"course_name","");?>
      </div>
       <div class="row pt-2">
          <div class="col">
          <?php inputElement("<i class='fas fa-people-carry'></i>","lecturer Name" ,"author_name","");?>
          </div>
          <div class="col">
          <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price" ,"course_price","");?>
         </div>
       </div>
       <div class ="d-flexx justify-content-center">
        <?php buttonElement("btn-create","btn btn-success","<i class='fa-solid fa-plus'></i>","create","dat-toogle='tooltip' data-placement='bottom' title ='Create'");?>
        <?php buttonElement("btn-read","btn btn-primary","<i class='fa-solid fa-sync'></i>","read","dat-toogle='tooltip' data-placement='bottom' title ='Read'");?>
        <?php buttonElement("btn-update","btn btn-light border","<i class='fa-solid fa-pen-alt'></i>","update","dat-toogle='tooltip' data-placement='bottom' title ='Update'");?>
        <?php buttonElement("btn-delete","btn btn-danger","<i class='fa-solid fa-trash-alt'></i>","delete","dat-toogle='tooltip' data-placement='bottom' title ='Delete'");?>
        <?php deleteBtn(); ?>
      </div>
      </form>
    </div>
     <!-- Bootstrap table-->
     <div class="flex table-data justify-content-center">
      <table class = "table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Lecturer</th>
            <th>Course Price</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
            <?php
             if(isset($_POST['read']))
             {
             $result =  getData();
             if($result)
             {
              while($row = mysqli_fetch_assoc($result))
              {?>
              <tr>
                
                  <td data-id="<?php echo $row['ID'] ;?>"><?php echo $row['ID'] ;?></td>
                  <td data-id="<?php echo $row['ID'] ;?>"><?php echo $row['course_name'] ;?></td>
                  <td data-id="<?php echo $row['ID'] ;?>"><?php echo $row['author_name'] ;?></td>
                  <td data-id="<?php echo $row['ID'] ;?>"><?php echo '$'.$row['course_price'] ;?></td>
                  <td ><i class="fas fa-edit btnedit"data-id="<?php echo $row['ID'] ;?>" ></i></td>
        
              </tr>
            <?php
              }
            }
          }
          ?>
        </tbody>
      </table>
     </div>
  </div>
  </main>
   
     <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   <script src="../Sec_Project/php/main.js"></script>
   
  </body>
</html>