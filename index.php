<?php
$insert=false;
if(isset($_POST['Name'])){
$server = "localhost";
$username = "root";
$password = "qwerty";
$port = "3307";

$con = mysqli_connect($server, $username, $password, 'clubinfo', $port);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$Name = $_POST['Name'];
$UID = $_POST['UID'];
$Course = $_POST['Course'];
$Contact_Number = $_POST['Contact_Number'];
$Year = $_POST['Year'];
$Project_idea = $_POST['Project_idea'];
$Attended_events = isset($_POST['Attended_events']) ? 1 : 0;
$LinkedIn_url = $_POST['LinkedIn_url'];
$Email = $_POST['Email'];
$Prefered_domain = $_POST['Prefered_domain'];
$goals = $_POST['goals'];

$sql = "INSERT INTO `students` (
  `Sno`, 
  `Name`, 
  `UID`, 
  `Course`, 
  `Contact_Number`, 
  `Year`, 
  `Project_idea`, 
  `Attended_events`, 
  `LinkedIn_url`, 
  `Email`, 
  `Prefered_domain`, 
  `goals`, 
  `Date_Time`
) VALUES (
  NULL, 
  '$Name', 
  '$UID', 
  '$Course', 
  '$Contact_Number', 
  '$Year', 
  '$Project_idea', 
  '$Attended_events', 
  '$LinkedIn_url', 
  '$Email', 
  '$Prefered_domain', 
  '$goals', 
  current_timestamp()
)";


if($con->query($sql)==true){
   $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>





<!-- -------------------- -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>QWERTY Club Entry Form</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <h2>QWERTY Club Entry Form</h2>

      <div class="club-vision">
        <h2>
          🚀 Welcome to <span>QWERTY</span> — CSE Club of Chandigarh
          University
        </h2>
        <p>
          🌟 At <strong>QWERTY</strong>, we believe in learning by doing,
          building by sharing, and growing as a community.
        </p>
        <p>
          💡 Whether you're a coder, designer, speaker, or planner — there’s a
          place for you here!
        </p>
        <blockquote>
          "The best way to predict the future is to invent it." — Alan Kay
        </blockquote>
        <p class="join-line">✨ Join the tribe. Build. Lead. Inspire. ✨</p>
      </div>

      <div class="insert">
        <?php
        if($insert==true)
         echo"<h1>Thank you for submitting the form</h1>";
         ?>
      </div>

<form action="index.php" method="POST" novalidate>
  <fieldset>
    <legend>👤 Personal Information</legend>

    <label for="Name">Full Name</label>
    <input
      id="Name"
      name="Name"
      type="text"
      placeholder="Enter your full name"
      required
      pattern="[A-Za-z\s]{3,}"
      title="Only letters and spaces allowed"
      autofocus
      autocomplete="name"
    />

    <label for="UID">University ID</label>
    <input
      id="UID"
      name="UID"
      type="text"
      placeholder="Enter university ID"
      required
      minlength="5"
      maxlength="15"
    />

    <label for="Course">Course & Branch</label>
    <input
      id="Course"
      name="Course"
      type="text"
      placeholder="e.g. B.Tech CSE"
      required
      autocomplete="organization-title"
    />

    <label for="Contact_Number">Contact Number</label>
    <input
      id="Contact_Number"
      name="Contact_Number"
      type="tel"
      placeholder="10-digit number"
      pattern="[0-9]{10}"
      inputmode="numeric"
      title="Please enter a valid 10-digit number"
      required
      autocomplete="tel"
    />

    <label for="Year">Year of Study</label>
    <select id="Year" name="Year" required>
      <option value="" disabled selected>-- Select Year --</option>
      <option value="1">1st Year</option>
      <option value="2">2nd Year</option>
      <option value="3">3rd Year</option>
      <option value="4">4th Year</option>
    </select>

    <label for="Project_idea">
      If you could build any tech project, what would it be?
    </label>
    <textarea
      id="Project_idea"
      name="Project_idea"
      rows="3"
      placeholder="Let your imagination go wild!"
    ></textarea>
  </fieldset>

  <fieldset>
    <legend>🎯 Club Interests</legend>

    <div class="form-check">
      <label for="Attended_events" class="form-check-label">
        Have attended past Tech Abode events
      </label>
      <input
        type="checkbox"
        id="Attended_events"
        name="Attended_events"
        class="form-check-input"
      />
    </div>

    <label for="LinkedIn_url">LinkedIn Profile Link</label>
    <input
      id="LinkedIn_url"
      name="LinkedIn_url"
      type="url"
      placeholder="https://linkedin.com/in/yourprofile"
      autocomplete="url"
    />

    <label for="Email">Email Address</label>
    <input
      id="Email"
      name="Email"
      type="email"
      placeholder="example@college.edu"
      required
      autocomplete="email"
    />

    <label for="Prefered_domain">Preferred Work Domain</label>
    <select id="Prefered_domain" name="Prefered_domain" required>
      <option value="" disabled selected>-- Choose a work domain --</option>
      <option value="content">Content Writing & Documentation</option>
      <option value="design">Graphic Design & Branding</option>
      <option value="tech">Technical Development (Web/App)</option>
      <option value="event">Event Planning & Coordination</option>
      <option value="marketing">Marketing & Promotions</option>
      <option value="video-editing">Video Editing & Media</option>
      <option value="social-media">Social Media Management</option>
      <option value="photography">Photography & Coverage</option>
      <option value="public-speaking">Anchoring & Public Speaking</option>
      <option value="research">Research & Content Strategy</option>
    </select>

    <label for="goals">
      What is one personal goal you want to achieve by joining Tech Abode?
    </label>
    <input
      type="text"
      id="goals"
      name="goals"
      placeholder="e.g. Improve public speaking / Learn web dev / Lead an event..."
      required
    />
  </fieldset>

  <button type="submit">🚀 Submit</button>
</form>

    </div>
  </body>
</html>

