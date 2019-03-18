        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt=""><?php echo($user_check); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"> Profile</a></li> -->
                    <li>
                      <a href="billing.php">
                        <span>Billing</span>
                      </a>
                    </li>
                    <!-- <li><a href="javascript:;">Email Notification</a></li> -->
                    <li><a href="controller/dologout.php"><i class="fas fa-sign-out-alt pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="far fa-bell"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">              
                    <li>
                      <a>
                        <span class="image"><img src="images/user.png" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo ($user_check); ?></span>
                        </span>
                        <span class="message">
                          <h6><b>message 1</b></h6>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                      <a data-target=".bs-example-modal-sm1" data-toggle="modal" >
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>