<nav id="sidebar">
    <div class="sidebar-header">
        <div style="margin-left: auto; margin-right: auto; width: fit-content;">
            <img src="images/admin.png" alt="Admin Profile">
        </div>
        <div style="margin-left: auto; margin-right: auto; width: fit-content;">
            <h1>ADMIN</h1>
        </div>
    </div>
    <ul class="components">
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'home.php') {echo 'active';} ?>">
            <a href="home.php"><i class="fa-solid fa-house-chimney"></i>Dashboard</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'users_information.php') {echo 'active';} ?>">
            <a href="users_information.php"><i class="fa-solid fa-users"></i>Users Information</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'lifestyle_posts.php') {echo 'active';} ?>">
            <a href="lifestyle_posts.php"><i class="fa-solid fa-rectangle-list"></i>Lifestyle Posts</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'daily_activity.php') {echo 'active';} ?>">
            <a href="daily_activity.php"><i class="fa-regular fa-calendar-days"></i>Daily Activity</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'food_journal.php') {echo 'active';} ?>">
            <a href="food_journal.php"><i class="fa-solid fa-utensils"></i>Food Journal</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'sleep_schedule.php') {echo 'active';} ?>">
            <a href="sleep_schedule.php"><i class="fa-solid fa-bed"></i>Sleep Schedule</a>
        </li>
        <li class="<?php if (basename($_SERVER['PHP_SELF']) === 'step_tracker.php') {echo 'active';} ?>">
            <a href="step_tracker.php"><i class="fa-solid fa-shoe-prints"></i>Step Tracker</a>
        </li>
        <li>
            <a id="maintenance-link"><i class="fa-solid fa-screwdriver-wrench"></i>Maintenance</a>
            <ul id="maintenance-sublist">
                <li class="<?php if  (basename($_SERVER['PHP_SELF']) == 'health_conditions.php'){echo 'active'; } ?>">
                    <a href="health_conditions.php">Health Conditions</a>
                </li>
                <li class="<?php if  (basename($_SERVER['PHP_SELF']) == 'activities.php'){echo 'active'; } ?>">
                    <a href="activities.php">List of Activities</a>
                </li>
                <li class="<?php if  (basename($_SERVER['PHP_SELF']) == 'foods.php'){echo 'active'; } ?>">
                    <a href="foods.php">List of Foods</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
        </li>
    </ul>
</nav>

<script>
    var maintenanceLink = document.getElementById("maintenance-link");
    var maintenanceSublist = document.getElementById("maintenance-sublist");
    
    maintenanceLink.addEventListener("click", function() {
        maintenanceSublist.classList.toggle("show");
    });
</script>