<?php
  $this->load->view('includes/header')
?>

    <!-- page content starts -->
    <div class="page-content">
      <div class="header"> Welcome
        <?php echo $this->session->userdata('user_name'); ?> as <?php echo $this->session->userdata('role'); ?>
      </div>
      <div class="header">Today Tasks</div>
      <!-- contnet categories starts -->
      <div class="content-categories">
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-1" />
          <label class="category" for="opt-1">All</label>
        </div>
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-2" checked />
          <label class="category" for="opt-2">Important</label>
        </div>
        <div class="label-wrapper">
          <input class="nav-item" name="nav" type="radio" id="opt-3" />
          <label class="category" for="opt-3">Notes</label>
        </div>
        <!-- <div class="label-wrapper">
            <input class="nav-item" name="nav" type="radio" id="opt-4" />
            <label class="category" for="opt-4">Links</label>
          </div>-->
      </div>
      <!--  -->
      <!-- contemt categories ends -->
      <!-- tasks wrapper starts -->
      <div class="tasks-wrapper">
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-1" checked />
          <label for="item-1">
            <span class="label-text">Swap and Sub Lists</span>
          </label>
          <span class="tag approved">Approved</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-2" checked />
          <label for="item-2">
            <span class="label-text">Create a Employee Schedule</span>
          </label>
          <span class="tag progress">In Progress</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-3" />
          <label for="item-3">
            <span class="label-text">List of Employees</span>
          </label>
          <span class="tag review">In Review</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-4" />
          <label for="item-4">
            <span class="label-text">Create a Agenda for meetings</span>
          </label>
          <span class="tag progress">In Progress</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-5" />
          <label for="item-5">
            <span class="label-text">Approving Work Stations</span>
          </label>
          <span class="tag approved">Approved</span>
        </div>
        <!--<div class="task">
            <input class="task-item" name="task" type="checkbox" id="item-6" />
            <label for="item-6">
              <span class="label-text">Interactive Design</span>
            </label>
            <span class="tag review">In Review</span>
          </div>-->
        <div class="header upcoming">Upcoming Tasks</div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-7" />
          <label for="item-7">
            <span class="label-text">Create item Lists</span>
          </label>
          <span class="tag waiting">Waiting</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-8" />
          <label for="item-8">
            <span class="label-text"> Updating Meal Plans </span>
          </label>
          <span class="tag waiting">Waiting</span>
        </div>
        <div class="task">
          <input class="task-item" name="task" type="checkbox" id="item-9" />
          <label for="item-9">
            <span class="label-text"> Interacting with Employees</span>
          </label>
          <span class="tag waiting">Waiting</span>
        </div>
        <!--  <div class="task">
            <input class="task-item" name="task" type="checkbox" id="item-10" />
            <label for="item-10">
              <span class="label-text">Create a Dashboard Design</span>
            </label>
            <span class="tag waiting">Waiting</span>
          </div>-->
      </div>
      <!-- tasks wrapper ends -->
    </div>
    <!--  -->
    <!-- page content ends -->

    <!-- right bar starts -->
    <div class="right-bar">
      <div class="top-part">
        <img class="feather feather-users" src="<? echo base_url('assets/') ?>svg/users.svg" alt="" />
        <img class="feather feather-users" src="<? echo base_url('assets/') ?>svg/settings.svg" alt="" />

        <div class="settings"></div>
      </div>
      <div class="header">Schedule</div>
      <div class="right-content">
        <div class="task-box yellow">
          <div class="description-task">
            <div class="time">09:00 - 11:00 AM</div>
            <div class="task-name">Employees Review</div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img1.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img2.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img3.jpg" alt="member-3" />
            <img src="<? echo base_url('assets/') ?>images/img4.jpg" alt="member-4" />
          </div>
        </div>
        <div class="task-box blue">
          <div class="description-task">
            <div class="time">12:00 - 12:30 PM</div>
            <div class="task-name">Managers Meeting</div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img5.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img6.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img7.jpg" alt="member-3" />
          </div>
        </div>
        <div class="task-box red">
          <div class="description-task">
            <div class="time">01:00 - 02:00 PM</div>
            <div class="task-name"> Team Meeting </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img1.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img2.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img3.jpg" alt="member-3" />
            <img src="<? echo base_url('assets/') ?>images/img4.jpg" alt="member-4" />
          </div>
        </div>
        <div class="task-box green">
          <div class="description-task">
            <div class="time">05:00 - 06:30 PM</div>
            <div class="task-name"> Discussions </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img5.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img6.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img7.jpg" alt="member-3" />
            <img src="<? echo base_url('assets/') ?>images/img8.jpg" alt="member-4" />
            <img src="<? echo base_url('assets/') ?>images/img9.jpg" alt="member-5" />
          </div>
        </div>
        <div class="task-box blue">
          <div class="description-task">
            <div class="time">07:00 - 08:00 PM</div>
            <div class="task-name"> Release Events </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img5.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img6.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img7.jpg" alt="member-3" />
            <img src="<? echo base_url('assets/') ?>images/img8.jpg" alt="member-4" />
            <img src="<? echo base_url('assets/') ?>images/img9.jpg" alt="member-5" />
          </div>
        </div>
        <div class="task-box yellow">
          <div class="description-task">
            <div class="time">8:00 - 9:00 PM</div>
            <div class="task-name">Training Session</div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="<? echo base_url('assets/') ?>images/img1.jpg" alt="member" />
            <img src="<? echo base_url('assets/') ?>images/img2.jpg" alt="member-2" />
            <img src="<? echo base_url('assets/') ?>images/img3.jpg" alt="member-3" />
            <img src="<? echo base_url('assets/') ?>images/img4.jpg" alt="member-4" />
          </div>
        </div>
      </div>
    </div>
    <!-- right bar ends -->
    
<?php
  $this->load->view('includes/footer')
?>