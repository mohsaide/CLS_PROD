<?php
include 'page_start.php' ;
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">



                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">My Workspace</h1>
                    </div>
                    <hr class="hr">

                    <!-- Content Row -->

                    <div class="row pb-5">

                        <!-- Pie Chart -->
                       
                     
                    <div class="col-xl-8 col-lg-7 row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="profile.php?UserId=<?php echo $_SESSION['UserId'] ?>" class="custom_link">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Profile</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-person-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="inbox.php" class="custom_link">
                            <div class="card border-left-primary  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Messages</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-chat-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="notifications.html" class="custom_link">
                            <div class="card border-left-primary  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Notifications</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-bell-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                 

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="friends.php" class="custom_link">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Friends</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-people-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                          <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Blogger</div>
                                      </div>
                                      <div class="col-auto">
                                        <i class="bi bi-newspaper fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </a>
                    </div>


                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-12 col-xl-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                          <div class="card border-left-primary shadow h-100 py-2">
                              <div class="card-body">
                                  <div class="row no-gutters align-items-center">
                                      <div class="col mr-2">
                                          <div class="h5 font-weight-bold text-primary text-uppercase mb-1">Advico</div>
                                      </div>
                                      <div class="col-auto">
                                        <i class="bi bi-robot fa-2x text-gray-300"></i>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          </a>
                      </div>

                        
                    </div>


                    <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile Strength</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">More</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"> </canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color:#2E59D9"></i> Strength
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Weakness
                                        </span>
                                    </div>
                                </div>
                            </div>
                    </div>

                    </div>


                    <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
                        <h1 class="h3 mb-0 text-gray-800">University</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm shadow-sm" style='background-color:#2C9FAF; color:white;'><i
                                class="fas fa-download fa-sm text-white-50"></i> My progress line</a>
                    </div>
                    <hr class="hr">

                    <!-- Content Row -->
                    <div class="row">

                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">Class</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-book-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">Calendar</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-event-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>


                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">ToDolist</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-card-checklist fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                 

                         <!-- Earnings (Monthly) Card Example -->
                         <div class="col-xl-3 col-md-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">Absences</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-clipboard-data-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>



                    </div>

                        <!-- Content Row -->
                        <div class="row">

                         <!-- Earnings (Monthly) Card Example -->

                          <div class="col-xl-3 col-md-6 mb-4 zoom" >
                            <a href="profile.html" class="custom_link">
                            <div class="card border-left-secondary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 font-weight-bold text-secondary text-uppercase mb-1">Motivation</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="bi bi-box2-heart-fill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                    
                                        </div>
                    


                </div>
                <!-- /.container-fluid -->

<?php
include 'page_end.php';
?>