<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>

  <form action="<?=site_url('InsertForm'); ?>" method="POST">
    <div class="container">
      <h1>Registeration Form</h1>
      <hr>
      <label for="fname"><b>First Name:</b></label>
      <input type="text" placeholder="Enter First Name" name="fname" required>

      <label for="lname"><b>Last Name:</b></label>
      <input type="text" placeholder="Enter Last Name" name="lname" required>

      <label for="gender"><b>Gender:</b></label>
      <div class="radiobtn">
        <input type="radio" name="gender" value="male">Male
        <input type="radio" name="gender" value="female">Female
      </div>

      <br>
      <!-- <input type="text" p name="gender" required> -->

      <label for="contact"><b>Contact:</b></label>
      <input type="text" placeholder="Enter Contact Number" name="contact" required>

      <label for="country"><b>Country:</b></label>
      <select name="country">
        <Option>Select</Option>
        <Option>India</Option>
        <Option>America</Option>
        <Option>South Africa</Option>
        <Option>Newziland</Option>
      </select>

      <label for="state"><b>State:</b></label>
      <select name="state">
        <Option>Select</Option>
        <Option>Mp</Option>
        <Option>Gujrat</Option>
        <Option>Rajsthan</Option>
        <Option>UP</Option>
      </select>


      <label for="city"><b>City:</b></label>
      <select name="city">
        <Option>Select</Option>
        <Option>Indore</Option>
        <Option>Ujjain</Option>
        <Option>Dewas</Option>
        <Option>Bhopal</Option>
      </select>


      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      
      <label for="subject"><b>Choose Subject</b></label>
      <select name="subject[]" multiple size = 3>
        <option value="Maths">Maths</option>
        <option value="Science">Science</option>
        <option value="Physics">Physics</option>
        <option value="Chemistry">Chemistry</option>
      </select>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="password" required>

      <label for="skils"><b>Choose Skils</b></label><br>
      <input type="checkbox" name="skils[]" value="C"><label for="c">C</label>
      <input type="checkbox" name="skils[]" value="C++"><label for="c++">C++</label>
      <input type="checkbox" name="skils[]" value="Php"><label for="php">Php</label>
      <input type="checkbox" name="skils[]" value="Python"><label for="python">Python</label><br>

      <label for="address"><b>Address:</b></label>
      <textarea name="address" id="" cols="30" rows="10"></textarea>
      <input type="submit" name="regis_btn" value="Registration">

    </div>

  </form>
</body>
</html>