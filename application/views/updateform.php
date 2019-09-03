<?php ?>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>

<body>
  <form action="<?php echo site_url('/UpdateRecord/updateprocess/'.$regis[0]['id']);?>" method="POST">
  <input type="hidden" name="id" value="<?php echo  $regis[0]['id']; ?>">
    <div class="container">
      <h1>Update Form</h1>
      <hr>
      <label for="fname"><b>First Name:</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" value="<?php echo  $regis[0]['fname']; ?>" required>
      <label for="lname"><b>Last Name:</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" value="<?php echo $regis[0]['lname']; ?>" required>
      <label for="gender"><b>Gender:</b></label>
      <div class="radiobtn">
        <input type="radio" name="gender" value="male" <?php echo $regis[0]['gender'] == 'male' ? 'checked="checked"' : ''; ?>>Male
        <input type="radio" name="gender" value="female" <?php echo $regis[0]['gender'] == 'female' ? 'checked="checked"' : ''; ?>>Female
      </div>
      <br>
      <label for="contact"><b>Contact:</b></label>
      <input type="text" placeholder="Enter Contact Number" name="contact" value="<?php echo $regis[0]['contact'] ?>" required>
      <label for="country"><b>Country:</b></label>
      <?php
       $country = $regis[0]['country'];
       select_country($country);
      ?>
      <label for="state"><b>State:</b></label>
      <?php
      $state = $regis[0]['state'];
      select_state($state);
      ?>
      <label for="city"><b>City:</b></label>
      <?php
       $city = $regis[0]['city'];
       select_city($city);
      ?>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" value="<?php echo $regis[0]['email'] ?>" required>

      <label for="subject"><b>Choose Subject</b></label>
      <?php
      $arraysubject = explode(',', $regis[0]['subject']);
      select_subject($arraysubject);
      ?>

      <label for="skils"><b>Choose Skils</b></label><br>
      <?php
      $string_skils = explode(',', $regis[0]['skils']);
      select_skils($string_skils);
      ?><br>
      <label for="address"><b>Address:</b></label>
      <textarea name="address" id="" cols="30" rows="10"><?php echo $regis[0]['address'] ?></textarea>
      <input type="submit" name="update_btn" value="Update">
    </div>
  </form>
</body>

</html>