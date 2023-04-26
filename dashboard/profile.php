<?php
include 'page_start.php' ;
?>

 

<div class="container-fluid">
                 <link href="css/profile.css" rel="stylesheet"> 
                 <div class="container rounded bg-primary mt-5 mb-5">
                     <div class="row">

                         <!-- image + email  -->
                         <form class="col-lg-6 border-right">

                             <div class="d-flex flex-column align-items-center p-3 py-5">

                                 
                                 
                                    <div id='profileImg' class="rounded-circle" style='width:150px; height:150px; background-image:url("../assets/img/user/<?php 
                                    try {
                                    include '../assets/php/connection.php';
                                    $query= "select image from user where id = '".$_SESSION['UserId']."' ;" ;
                                    $result = mysqli_query($conn, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['image']; 
                                       
                                    } catch (\Throwable $th) {
                                       
                                        echo 'default.png';
                                    }
                                    ?>");   background-size: cover; background-position: center; background-repeat: no-repeat;'>
                                    
                                    <div class ='h-100 w-100 rounded-circle' id='imgCover'>
                                        <a class="mt-5 text-center btn btn-primary profile-button" style='margin-left:55px;' data-toggle="modal" data-target="#chg_prf_img" ><i class="bi bi-pencil"></i></a>
                                    </div>

                                  </div>


                                 <span class="font-weight-bold text-primary"> 

                                    <?php 
                                    try {
                                    include '../assets/php/connection.php';
                                    $query= "select concat (first_name , ' ' , last_name) as fullname from user where id = '".$_SESSION['UserId']."' ;" ;
                                    $result = mysqli_query($conn, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['fullname']; 
                                       
                                    } catch (\Throwable $th) {
                                       
                                        echo 'Unkown User';
                                    }
                                    ?>

                                </span><span class="text-black-50">
                                <?php 
                                    try {
                                    include '../assets/php/connection.php';
                                    $query= "select email from user where id = '".$_SESSION['UserId']."' ;" ;
                                    $result = mysqli_query($conn, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['email']; 
                                       
                                    } catch (\Throwable $th) {
                                       
                                        echo 'anonymise@clsonline.org';
                                    }
                                    ?>
                                </span><span> </span>

                                 <div class="row mt-3">
                                     <div class="col-md-6 mt-3"><label class="labels">Name</label><input type="text" class="form-control"  value="Mohammad"></div>
                                     <div class="col-md-6 mt-3"><label class="labels">Surname</label><input type="text" class="form-control" value="Saide" ></div>
                                     <div class="col-md-12 mt-3"><label class="labels">Mobile Number</label><input type="text" class="form-control"  value="056 880 5065"></div>
                                     <div class="col-md-12 mt-3"><label class="labels mt-2">Date of birth</label><input type="date" class="form-control"  value="2001-05-23"></div>
                                     <div class="col-md-12 mt-3">
                                     <label for="address">Country</label>
                                         <select name="country" class="form-control" id="country" >
                                             <option selected disabled hidden> <span id="cur_country">Palestine</span></option>
                                             <option value="palestine">Palestine</option>
                                             <option value="lebnon">Lebnon</option>
                                             <option value="egypt">Egypt</option>
                                             <option value="jordan">Jordan</option>
                                             <option value="iraq">Iraq</option>
 
                                         </select>
                                    </div>
                                 </div>
                                 

                                 <div class="mt-4 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                        
                             </div>
                                
                           
                        


                         </form>


                         <div class="col-lg-6 border-right">

                         <div class="p-3 py-5">
                                 <div class="d-flex justify-content-between align-items-center mb-3">
                                     <h4 class="text-right text-primary">My experience</h4>
                                 </div>
                                 
                                 <ul class="list-group list-group-flush">
                                     <li class="list-group-item"> <i class="bi bi-check-lg text-lg" style="color: coral;"></i> Study CS at NNU</li>
                                     <li class="list-group-item"> <i class="bi bi-check-lg text-lg" style="color: coral;"></i> Finish Clean code book.</li>
                                     <li class="list-group-item"> <i class="bi bi-check-lg text-lg" style="color: coral;"></i> Finish web 1 course.</li>
                                   </ul> 


                            </div>
                              </div>

                     </div>
                 </div>
                 </div>
                 </div>
         
             </div>

                          <!-- profile img change Modal-->
                          <div class="modal fade" id="chg_prf_img" tabindex="-1" role="dialog" 
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Let's update it.</h5>
                                            <button class="close" type="button" data-dismiss="modal" onclick="Myclear2(event)"  aria-label="Close">
                                                <span aria-hidden="true" >×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <from id='UploadImg'>
                                            <div class="form-group">
                                                <div class="square-input">
                                                <input type="file" class="form-control-file" id="file-input">
                                            </div>
                                            </div>
                                            </from>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" onclick="Myclear2(event)" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-primary" href="../assets/html/h_login.php">Change</a>
                                        </div>
                                    </div>
                                </div>
                            </div>              
                <script src='js/profile.js'></script>

<?php
include 'page_end.php' ;
?>