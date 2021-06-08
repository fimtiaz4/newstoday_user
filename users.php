 <?php 

    include "inc/header.php" ;
    include "inc/menubar.php" ;
 ?>
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">All Users Information</h4>
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->

<div class="container-fluid">



    <?php 

    $do= isset($_GET['do']) ? $_GET['do'] : 'manage' ;

    // Manage all user
    if($do=='manage'){
        ?>
        <div class="row justify-content-center" >
            <div class="col-lg-12 col-md-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">All Categories List</h3>
                <ul class="mt-3">
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Thumbnail</th>
                                            <th class="border-top-0">Names</th>
                                            <th class="border-top-0">Gender</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Adress</th>
                                            <th class="border-top-0">Phone</th>
                                            <th class="border-top-0">DOB</th>
                                            <!-- <th class="border-top-0">Biodata</th>
                                            <th class="border-top-0">Education</th> -->
                                            <th class="border-top-0">Role</th>
                                            <th class="border-top-0">Staus</th>
                                            <th class="border-top-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $query = "SELECT * FROM user";
                                        $all_users = mysqli_query($db,$query);
                                        $count = 0;

                                        while($row = mysqli_fetch_assoc($all_users)){
                                            $u_id         = $row['u_id'];
                                            $u_name       = $row['u_name'];
                                            $u_image      = $row['u_iamge'];
                                            $u_email      = $row['u_email'];
                                            $u_password   = $row['u_password'];
                                            $u_adress     = $row['u_adress'];
                                            $u_phone      = $row['u_phone'];
                                            $u_dob        = $row['u_dob'];
                                            $u_gender     = $row['u_gender'];
                                            $u_bio        = $row['u_bio'];
                                            $u_education  = $row['u_education'];
                                            $u_role       = $row['u_role'];
                                            $u_status     = $row['u_status'];
                                            $count++;

                                            ?>

                                            <tr>
                                             <td><?php echo $count; ?></td>
                                             <td><img src="image/user/<?php echo $u_image;  ?>" width=80></td>
                                             <td><?php echo $u_name; ?></td>
                                             <td><?php echo $u_gender; ?></td>
                                             <td><?php echo $u_email; ?></td>
                                             <td><?php echo $u_adress; ?></td>
                                             <td><?php echo $u_phone; ?></td>
                                             <td><?php echo $u_dob; ?></td>
                                             <td>
                                               <?php 

                                               if($u_role == 0){
                                                echo "<span class='badge bg-success'>Subscriber</span>";
                                               }
                                               if($u_role == 1){
                                                echo "<span class='badge bg-warning'>Editor</span>";
                                               }
                                               if($u_role == 2){
                                                echo "<span class='badge bg-info'>Admin</span>";
                                               }

                                                ?>


                                            </td>
                                             <td>
                                                <?php 

                                               if($u_status == 1){
                                                echo "<span class='badge bg-success'>Active</span>";
                                               }

                                               if($u_status == 0){
                                                echo "<span class='badge bg-danger'>Inactive</span>";
                                               }

                                               ?>
                                              </td>
                                                 <td>
                                                    <a href="" data-toggle="tooltip" data-placement="top" title="Profile">
                                                        <i class="fas fa-eye text-warning "></i>
                                                    </a>
                                                    <a href="users.php?do=edit&edit_id=<?php echo $u_id; ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" data-toggle="tooltip" data-placement="top" data-bs-toggle="modal" data-bs-target="#delete<?php echo $u_id; ?>" title="Delete" >
                                                        <i class="fas fa-trash-alt text-danger "></i>
                                                    </a>
                                                 </td>
                                             </tr>



                                             <!-- modal -->

 

                                            <div class="modal fade" id="delete<?php echo $u_id; ?>" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content modal-filled bg-warning">
                                                        <div class="modal-body p-4">
                                                            <div class="text-center text-danger">
                                                                <i data-feather="x-octagon" class="fill-white feather-lg"></i>
                                                                <h2 class="mt-2">Are you sure?</h2>
                                                                <a type="button" class="btn btn-light my-2"
                                                                    data-bs-dismiss="modal">Cancel</a>

                                                                <a href="users.php?do=delete&delete_id=<?php echo $u_id; ?>" type="button" class="btn btn-light my-2 bg-danger text-light">Confirm</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </ul>
            </div>
        </div>
        </div>
        <?php
    }

    // Add new user 
    if($do=='add'){
        ?>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Add New User</h3>
                    <ul class="mt-3">
                       <form method="POST" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">User Name*</label>
                                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="userName" name="user_name" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">User Email*</label>
                                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="user_mail">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPassword" class="form-label">Password*</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" name="user_password" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPhone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="exampleInputPhone" name="user_phone">
                                  </div>
                                  <div class="mb-3"> 
                                    <label for="exampleInputAddress" class="form-label">Adress</label>
                                    <input type="text" class="form-control" id="exampleInputAddress" name="user_address">
                                  </div>
                                  <div class="mb-3">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <div class="col-6">
                                        <input class="form-control" type="date" value="0000-00-00" id="example-date-input" name="user_dob">
                                    </div>
                                  </div>

                              </div>
                              <div class="col-md-6">

                                <div class="mb-3">
                                    <label for="exampleSelect1">Select Your Gender</label>
                                    <select class="form-control" id="exampleSelect1" name="user_gender">
                                      <option>Select Gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>
                                      <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputBiodata" class="form-label">Biodata</label>
                                    <textarea rows="3" class="form-control" id="exampleInputBiodata" name="user_biodata"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEducation" class="form-label">Education</label>
                                    <textarea rows="3" class="form-control" id="exampleInputEducation" name="user_edu"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Profile Picture</label>
                                    <input type="file"  class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
                                    <br>
                                    <small id="fileHelp" class="form-text text-muted">Don't upload a photo more than 1MB file size. Also try to upload jpg, png, jpeg format. </small>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleSelect1">User Role</label>
                                    <select class="form-control" id="exampleSelect1" name="user_role">
                                      <option>Select Role</option>
                                      <option value="2">Admin</option>
                                      <option value="1">Editor</option>
                                      <option value="0">Subscriber</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleSelect1">User Status</label>
                                    <select class="form-control" id="exampleSelect1" name="user_status">
                                      <option>Select Status</option>
                                      <option value="1">Active</option>
                                      <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary" name="user_submit">Add New User</button>
                              </div>
                          </div>
                        </form>


                        <!-- add new user -->
                        <?php 

                        if(isset($_POST['user_submit'])){

                            $user_name      = $_POST['user_name'];
                            $user_mail      = $_POST['user_mail'];
                            $user_password  = $_POST['user_password'];
                            $user_phone     = $_POST['user_phone'];
                            $user_address   = $_POST['user_address'];
                            $user_dob       = $_POST['user_dob'];
                            $user_gender    = $_POST['user_gender'];
                            $user_biodata   = $_POST['user_biodata'];
                            $user_edu       = $_POST['user_edu'];
                            $user_role      = $_POST['user_role'];
                            $user_status    = $_POST['user_status'];
                            $image_name     = $_FILES['image']['name'];
                            $tmp_name     = $_FILES['image']['tmp_name'];

                            

                            if(empty($user_name)|| empty($user_mail) || empty($user_password) || empty($image_name)){
                                echo "<span class='alert bg-danger'> please fill up all the required files </span>";
                            }else{


                                // splite file 
                            $split = explode('.', $_FILES['image']['name']);
                            // take hte last part or extention
                            $extn = strtolower(end($split));

                            // check file type 
                            $extention = array('jpeg', 'jpg', 'png');




                            if(in_array($extn, $extention) === true){

                                $random = rand();
                                $updated_name = $random.$image_name;

                                move_uploaded_file($tmp_name, 'image/user/'.$updated_name);

                                $encript_pass = sha1($user_password);

                                $sql =   "INSERT INTO user (u_name, u_iamge, u_email, u_password, u_adress, u_phone, u_dob, u_gender,  u_bio, u_education, u_role, u_status   ) VALUES ('$user_name', '$updated_name', '$user_mail', '$user_password', '$user_address', '$user_phone', '$user_dob', '$user_gender', '$user_biodata', '$user_edu' , '$user_role ', $user_status     ) ";
                                $add_user = mysqli_query($db,$sql);



                                if($add_user){
                                header('Location: users.php');
                               }else{
                                echo "New User insert error!";
                               }

                                 
                                } else{
                                    echo " File type is not an image. " ;
                                }

                                }


                            }
                            
                         ?>
                         

                    </ul>
                </div>
            </div>
        </div>
        <?php
    }

    // Edit user 
    if($do=='edit'){

         if(isset($_GET['edit_id'])){
            $user_id = $_GET['edit_id'];
            // read all information about the user 
            $user_sql = "SELECT * FROM user WHERE u_id = '$user_id'";
            $edit_user = mysqli_query($db, $user_sql);
            while($row = mysqli_fetch_assoc($edit_user)){
                $u_name       = $row['u_name'];
                $u_image      = $row['u_iamge'];
                $u_email      = $row['u_email'];
                $u_password   = $row['u_password'];
                $u_adress     = $row['u_adress'];
                $u_phone      = $row['u_phone'];
                $u_dob        = $row['u_dob'];
                $u_gender     = $row['u_gender'];
                $u_bio        = $row['u_bio'];
                $u_education  = $row['u_education'];
                $u_role       = $row['u_role'];
                $u_status     = $row['u_status'];

         }

         ?> 
         

        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title">Edit Existing User</h3>
                    <ul class="mt-3">
                       <form action="users.php?do=update" method="POST" enctype="multipart/form-data">
                          <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-3">
                                    <label for="exampleInputName" class="form-label">User Name*</label>
                                    <input type="text" class="form-control" id="exampleInputName" aria-describedby="userName" name="user_name" value="<?php echo $u_name; ?>" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputEmail" class="form-label">User Email*</label>
                                    <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="user_mail" value="<?php echo $u_email; ?>">
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPassword" class="form-label">Password*</label>
                                    <input type="password" class="form-control" id="exampleInputPassword" name="user_password" >
                                  </div>
                                  <div class="mb-3">
                                    <label for="exampleInputPhone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="exampleInputPhone" name="user_phone"value="<?php echo $u_phone; ?>">
                                  </div>
                                  <div class="mb-3"> 
                                    <label for="exampleInputAddress" class="form-label">Adress</label>
                                    <input type="text" class="form-control" id="exampleInputAddress" name="user_address"value="<?php echo $u_adress; ?>">
                                  </div>
                                  <div class="mb-3">
                                    <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                    <div class="col-6">
                                        <input class="form-control" type="date"  id="example-date-input" name="user_dob"value="<?php echo $u_dob; ?>">
                                    </div>
                                  </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="exampleSelect1">Select Your Gender</label>
                                        <select class="form-control" id="exampleSelect1" name="user_gender">
                                          <option>Select Gender</option>
                                          <option value="Male" <?php if($u_gender == 'Male') echo "selected"; ?>>Male</option>
                                          <option value="Female"<?php if($u_gender == 'Female') echo "selected"; ?>>Female</option>
                                          <option value="Other"<?php if($u_gender == 'Other') echo "selected"; ?>>Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputBiodata" class="form-label">Biodata</label>
                                        <textarea rows="3" class="form-control" id="exampleInputBiodata" name="user_biodata" value="<?php echo $u_bio; ?>"><?php echo $u_bio; ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEducation" class="form-label">Education</label>
                                        <textarea rows="3" class="form-control" id="exampleInputEducation" name="user_edu" value="<?php echo $u_education; ?>" ><?php echo $u_education; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <img src="image/user/<?php echo $u_image; ?>" width= "120px">
                                        <br>
                                        <br>

                                        <label for="exampleInputFile">Profile Picture</label>
                                        <input type="file"  class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp" name="image">
                                        <br>
                                        <small id="fileHelp" class="form-text text-muted">Don't upload a photo more than 1MB file size. Also try to upload jpg, png, jpeg format. </small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSelect1">User Role</label>
                                        <select class="form-control" id="exampleSelect1" name="user_role" >
                                          <option>Select Role</option>
                                          <option value="2" <?php if($u_role == 2) echo "selected"; ?> >Admin</option>
                                          <option value="1" <?php if($u_role == 1) echo "selected"; ?>>Editor</option>
                                          <option value="0" <?php if($u_role == 0) echo "selected"; ?>>Subscriber</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleSelect1">User Status</label>
                                        <select class="form-control" id="exampleSelect1" name="user_status" >
                                          <option>Select Status</option>
                                          <option value="1" <?php if($u_status == 1) echo "selected"?>>Active</option>
                                          <option value="0" <?php if($u_status == 0) echo "selected"?>>Inactive</option>
                                        </select>
                                    </div>

                                    <input type="hidden" name="upadateUserId" value="<?php echo $user_id;?>">
                                    <input type="submit" class="btn btn-primary" value="Update User Info">
                                    
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>

        <?php

         



    }
}

    // Update User
    if($do=='update'){
        if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
            $user_id      = $_POST['upadateUserId'];
            $user_name      = $_POST['user_name'];
            $user_mail      = $_POST['user_mail'];
            $user_password  = $_POST['user_password'];
            $user_phone     = $_POST['user_phone'];
            $user_address   = $_POST['user_address'];
            $user_dob       = $_POST['user_dob'];
            $user_gender    = $_POST['user_gender'];
            $user_biodata   = $_POST['user_biodata'];
            $user_edu       = $_POST['user_edu'];
            $user_role      = $_POST['user_role'];
            $user_status    = $_POST['user_status'];
            $image_name     = $_FILES['image']['name'];
            $tmp_name       = $_FILES['image']['tmp_name'];


            // uodate work

            // img, passowrd none is updated 

            if(empty($user_password) && empty($image_name)){
                

                $updateSql=  "UPDATE user SET u_name= '$user_name', u_email= '$user_mail', u_adress='$user_address', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio= '$user_biodata', u_education= '$user_edu', u_role='$user_role', u_status='$user_status' WHERE u_id= '$user_id' ";

                echo $updateSql;

                $update_result= mysqli_query($db,$updateSql);

                if($update_result) {
                    header('Location: users.php');
                }else{
                    echo "User Update ERROR!";
                }


            }

            // img updated but password not updated 

            else if(empty($user_password) && !empty($image_name)){

                $split = explode('.', $_FILES['image']['name']);
                // take hte last part or extention
                $extn = strtolower(end($split));

                // check file type 
                $extention = array('jpeg', 'jpg', 'png');

                if(in_array($extn, $extention) === true){

                 $random = rand();

                 $updated_name = $random.$image_name;

                 move_uploaded_file($tmp_name, 'image/user/'.$updated_name);

                 $image_name = "SELECT u_iamge from user WHERE u_id='$user_id'";
                 $result2 = mysqli_query($db,$image_name);

                 while($row = mysqli_fetch_assoc($result2)){
                    $img_name = $row['u_iamge'];
                  }
                  // delete the file from project folder 
                 unlink('image/user/'.$img_name);


                 $sql =  "UPDATE user SET u_name= '$user_name',  u_iamge= '$updated_name',  u_email= '$user_mail', u_adress='$user_address', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio= '$user_biodata', u_education= '$user_edu', u_role='$user_role', u_status='$user_status' WHERE u_id= '$user_id' "  ;

                 $updateUser = mysqli_query($db,$sql);


                 if($updateUser){
                    header('Location: users.php');
                   }else{
                    echo "New User insert error!";
                   }

                     
                    } else{
                        echo " File type is not an image. " ;
                    }
                
            }

            // password upadated but image not updated 

            else if(!empty($user_password) && empty($image_name)){
                $encript_pass = sha1($user_password);
                $sql =  "UPDATE user SET u_name= '$user_name',  u_email= '$user_mail', u_password='$encript_pass', u_adress='$user_address', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio= '$user_biodata', u_education= '$user_edu', u_role='$user_role', u_status='$user_status' WHERE u_id= '$user_id' "  ;

                 $updateUser = mysqli_query($db,$sql);


                 if($updateUser){
                    header('Location: users.php');
                   }else{
                    echo "New User Update error!";
                   }

                     
                   
                
            }


            // both updated 
            else{
                $split = explode('.', $_FILES['image']['name']);
                // take hte last part or extention
                $extn = strtolower(end($split));

                // check file type 
                $extention = array('jpeg', 'jpg', 'png');

                if(in_array($extn, $extention) === true){

                 $random = rand();

                 $updated_name = $random.$image_name;

                 move_uploaded_file($tmp_name, 'image/user/'.$updated_name);

                 $encript_pass = sha1($user_password);

                 $image_name = "SELECT u_iamge from user WHERE u_id='$user_id'";
                 $result2 = mysqli_query($db,$image_name);

                 while($row = mysqli_fetch_assoc($result2)){
                    $img_name = $row['u_iamge'];
                  }
                  // delete the file from project folder 
                 unlink('image/user/'.$img_name);


                 $sql7 =  "UPDATE user SET u_name= '$user_name',  u_iamge= '$updated_name',  u_email= '$user_mail', u_password='$encript_pass', u_adress='$user_address', u_phone='$user_phone', u_dob='$user_dob', u_gender='$user_gender', u_bio= '$user_biodata', u_education= '$user_edu', u_role='$user_role', u_status='$user_status' WHERE u_id= '$user_id' "  ;

                 $updateUser7 = mysqli_query($db,$sql7);


                 if($updateUser7){
                    header('Location: users.php');
                   }else{
                    echo "New User Update error!";
                   }

                     
                    } 





            }



            
        }
    }

    // Delete User
    if($do=='delete'){

        if(isset($_GET['delete_id'])){
         
          $d_id = $_GET['delete_id'];



          // find the file name 
          $image_name = "SELECT u_iamge from user WHERE u_id='$d_id'";
          $result2 = mysqli_query($db,$image_name);

          while($row = mysqli_fetch_assoc($result2)){
            $img_name = $row['u_iamge'];
          }
          // delete the file from project folder 
          unlink('image/user/'.$img_name);

          // delete


         $table = 'user';
         $p_key = 'u_id';
         $url = 'users.php';
         delete($table, $p_key, $url, $d_id);



        }
    } 


     ?>
 
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<?php include "inc/footer.php"; ?>
