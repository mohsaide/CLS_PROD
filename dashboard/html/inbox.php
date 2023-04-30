<?php
include 'page_start.php' ;
?>
    <link href="css/message.css" rel="stylesheet">

                <!-- Begin Page Content -->
                <div class="container-fluid  pb-4">
                 
                    <div class="container">
                        <div class="row clearfix pt-4" >
                            <div class="col-lg-12 pt-3"  style='background: linear-gradient(to bottom right, #19756D, #46B9A4);'>
                                <div class="card chat-app " style="height:85vh;">

                                    <!-- people list -->
                                    <div id="plist" class="people-list"  >


                                        <ul class="list-unstyled chat-list mt-2 mb-0 bg-light" id ='friendsList' style="height:78vh; overflow-y:scroll;">
  

                                        </ul>
                                        
                                    </div>


                                    <div class="chat_elements bg-light mt-4 me-5" >

                                    <div class="chat" >

                                    <div class="chat-header clearfix rounded-left"  style='background: linear-gradient(to bottom right, #19756D, #46B9A4);'>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a href="#">
                                                        <img id='chat_header_img' src="../../assets/img/logo.jpg" alt="avatar">
                                                    </a>
                                                    <div class="chat-about">
                                                        <h6 class="pt-3 text-light" id='chat_header_text'>CLS Team</h6>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 hidden-sm text-right">
                                                    <a href="javascript:void(0);" class="btn btn-primary "><i class="fa fa-cogs"></i></a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="chat-history" id="chat-history" style="height:58vh; overflow-y:scroll;" >
                                            <ul class="m-b-0" id='chat_messages'>

                                            <li class="clearfix">
                                            <div class="message-data text-right">
                                                <img src="../../assets/img/logo.jpg" alt="avatar">
                                            </div>
                                            <div class="message other-message float-right">Hi Buddy, How can help you?<br> <small> Now.</small></div>
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