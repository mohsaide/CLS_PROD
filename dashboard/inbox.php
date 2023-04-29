<?php
include 'page_start.php' ;
?>
    <link href="css/message.css" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                 
                    <div class="container" >
                        <div class="row clearfix" >
                            <div class="col-lg-12">
                                <div class="card chat-app " style="height:85vh; background: linear-gradient(to bottom right, #19756D, #46B9A4);">

                                    <!-- people list -->
                                    <div id="plist" class="people-list" style='background: linear-gradient(to bottom right, #19756D, #46B9A4);' >


                                        <ul class="list-unstyled chat-list mt-2 mb-0" id ='friendsList' style="height:78vh; overflow-y:scroll; background-color:#E8F1F3;">
  

                                        </ul>
                                    </div>


                                    <div class="chat_elements" style='background-color:#E8F1F3;'>

                                    <div class="chat" >

                                    <div class="chat-header clearfix">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                                        <img src="../../assets/img/logo.jpg" alt="avatar">
                                                    </a>
                                                    <div class="chat-about">
                                                        <h6 class="pt-3">CLS Team</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 hidden-sm text-right">
                                                    <a href="javascript:void(0);" class="btn btn-primary "><i class="fa fa-cogs"></i></a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="chat-history" style="height:60vh; overflow-y:scroll;" >
                                            <ul class="m-b-0">

                                                <li class="clearfix">
                                                    <div class="message-data text-right">
                                                        <span class="message-data-time">
                                            <?php 
                                            date_default_timezone_set('Asia/Gaza');
                                            echo date('Y-m-d H:i');
                                            ?>
                                                </span>
                                   <img src="../../assets/img/logo.jpg" alt="avatar">
                                                    </div>
                                                    <div class="message other-message float-right"> Hi <?php 
                                    try {
                                    include '../assets/php/connection.php';
                                    $query= "select first_name from user where id = '".$_SESSION['UserId']."' ;" ;
                                    $result = mysqli_query($conn, $query);
                                    $data = mysqli_fetch_assoc($result);
                                    echo $data['first_name']; 
                                       
                                    } catch (\Throwable $th) {
                                       
                                        echo 'User';
                                    }
                                    ?>, how are you? How can we help you today? </div>
                                                </li>

                            
                                            </ul>


                                        </div>


                                        
                                    <form class="chat-message clearfix">
                                            <div class="input-group mb-0">
                                                <div class="input-group-prepend">
                                                <button class="input-group-text btn btn-primary"> <i class="bi bi-send-fill"></i> </button>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Enter text here...">                                    
                                            </div>
                                        </form>
                                        
                                    </div>
                                

                                    </div>




                                </div>
                            </div>
                        </div>
                        </div>
                
                </div>

                <!-- End Page Content -->
                </div>
            
                </div>
                <!-- /.container-fluid -->

                <script defer  src='js/inbox.js'></script>
            

<?php
include 'page_end.php';
?>