<?php
include "config/config.php";
session_start();

if (!isset($_SESSION['user'])) {
	session_destroy();
  header("location: signup.php");
  die();
}
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: signup.php");
  die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ShiftMate</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <div class="task-manager">
    <!-- left bar starts -->
    <div class="left-bar">
      <div class="upper-part">
        <div class="actions">
          <!--<div class="circle"></div> -->
          <!-- <div class="circle-2"></div> -->
        </div>
      </div>

      <!-- left content starts -->
      <div class="left-content">
        <ul class="action-list">
          <li class="item">
            <img class="feather feather-inbox" src="svg/inbox.svg" alt="" />
            <span>Inbox</span>
          </li>
          <!--<li class="item">
              <img class="feather feather-profile" src="C:\Users\S549475\OneDrive - nwmissouri.edu\Documents\bearcatplanners\svg" alt="" />
              <span>Profile</span>
            </li>-->
          <li class="item">
            <img class="feather feather-star" src="svg/star.svg" alt="" />
            <span> Today</span>
          </li>
          <li class="item">
            <img class="feather feather-calendar" src="svg/calender.svg" alt="" />
            <span>Upcoming</span>
          </li>
          <li class="item">
            <img class="feather feather-hash" src="svg/hash.svg" alt="" />
            <span>Important</span>
          </li>
          <li class="item">
            <img class="feather feather-users" src="svg/users.svg" alt="" />
            <span>Meetings</span>
          </li>

        </ul>

        <ul class="category-list">
          <li class="item">
            <img class="feather feather-users" src="svg/profile.svg" alt="" />
            <!--<span>My Profile</span>-->
            <a href="profile.php">My Profile</a>

          </li>
          <?php if($_SESSION['user']["role"]=="Employee"){?>

            <li class="item">
            <img class="feather feather-users" src="svg/Sv.jpg" alt="" />
            <!--<span>My Profile</span>-->
            <a href="ViewSchedule.html">View Schedule</a>
            <li class="item">
            <img class="feather feather-users" src="svg/doc.jpg" alt="" />
            <!--<span>My Profile</span>-->
            <a href="Employee/Documents.html">Documents</a>
          <li class="item">
            <img class="feather feather-users" src="svg/profile.svg" alt="" />
            <!--<span>My Profile</span>-->
            <a href="Helppage.html">Help</a>            
            <?php }?>

          </li>
          <?php if($_SESSION['user']["role"]=="Admin"){?>
            <li class="item">
            <img class="feather feather-trending-up" src="svg/edit.svg" alt="" />
            <!--<span>Edit</span>-->
            <a href="Create/Dashboard.html"
             >Create</a>

          </li>
          <li class="item">
            <img class="feather feather-trending-up" src="svg/update.svg" alt="" />
            <!--<span>Edit</span>-->
            <a href="Update/Dashboard.html"
             >Update</a>

          </li>
                
          <li class="item">
            <img class="feather feather-trending-up" src="svg/delete.svg" alt="" />
            <!--<span>Edit</span>-->
            <a href="Delete page/Dashboard.html"
             >Delete</a>

          </li>
          
    <?php }?>
          <li class="item">
            <img class="feather feather-zap" src="svg/logout.svg" alt="" />
            <!--<span>Delete</span>-->
            <a href="Dashboard.php?logout='1'" >Logout</a>

          </li>
        </ul>
      </div>
      <!-- left content ends -->
    </div>
    <!--  -->
    <!-- left bar ends -->

    <!-- page content starts -->
    <div class="page-content">
      <div class="header"> Welcome
        <?php
        print($_SESSION['user']["first_name"]); ?> as
        <?php
        print($_SESSION['user']["role"]); ?>
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
        <img class="feather feather-users" src="svg/users.svg" alt="" />
        <img class="feather feather-users" src="svg/settings.svg" alt="" />

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
            <img src="images/img1.jpg" alt="member" />
            <img src="images/img2.jpg" alt="member-2" />
            <img src="images/img3.jpg" alt="member-3" />
            <img src="images/img4.jpg" alt="member-4" />
          </div>
        </div>
        <div class="task-box blue">
          <div class="description-task">
            <div class="time">12:00 - 12:30 PM</div>
            <div class="task-name">Managers Meeting</div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="images/img5.jpg" alt="member" />
            <img src="images/img6.jpg" alt="member-2" />
            <img src="images/img7.jpg" alt="member-3" />
          </div>
        </div>
        <div class="task-box red">
          <div class="description-task">
            <div class="time">01:00 - 02:00 PM</div>
            <div class="task-name"> Team Meeting </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="images/img1.jpg" alt="member" />
            <img src="images/img2.jpg" alt="member-2" />
            <img src="images/img3.jpg" alt="member-3" />
            <img src="images/img4.jpg" alt="member-4" />
          </div>
        </div>
        <div class="task-box green">
          <div class="description-task">
            <div class="time">05:00 - 06:30 PM</div>
            <div class="task-name"> Discussions </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="images/img5.jpg" alt="member" />
            <img src="images/img6.jpg" alt="member-2" />
            <img src="images/img7.jpg" alt="member-3" />
            <img src="images/img8.jpg" alt="member-4" />
            <img src="images/img9.jpg" alt="member-5" />
          </div>
        </div>
        <div class="task-box blue">
          <div class="description-task">
            <div class="time">07:00 - 08:00 PM</div>
            <div class="task-name"> Release Events </div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="images/img5.jpg" alt="member" />
            <img src="images/img6.jpg" alt="member-2" />
            <img src="images/img7.jpg" alt="member-3" />
            <img src="images/img8.jpg" alt="member-4" />
            <img src="images/img9.jpg" alt="member-5" />
          </div>
        </div>
        <div class="task-box yellow">
          <div class="description-task">
            <div class="time">8:00 - 9:00 PM</div>
            <div class="task-name">Training Session</div>
          </div>
          <div class="more-button"></div>
          <div class="members">
            <img src="images/img1.jpg" alt="member" />
            <img src="images/img2.jpg" alt="member-2" />
            <img src="images/img3.jpg" alt="member-3" />
            <img src="images/img4.jpg" alt="member-4" />
          </div>
        </div>
      </div>
    </div>
    <!-- right bar ends -->
  </div>
</body>

</html>