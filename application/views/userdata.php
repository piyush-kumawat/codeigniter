 <script>
   function render(id) {
     window.location.assign("<?php echo base_url(); ?>index.php/UpdateRecord/?id=" + id);
   }

   function del_session() {
     window.location.assign("<?php echo base_url(); ?>index.php/Login/logout");
   }
 </script>
 <style>
   .logoutbtn {
     background: cornsilk;
     width: 117px;
     text-align: center;
     float: right;
   }
 </style>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
 <button class="logoutbtn" onclick="del_session();">Logout</button>
 <table style="width:100%">
   <tr>
     <td>First Name:</td>
     <td><?php echo $regis['fname']; ?></td>
   </tr>
   <tr>
     <td>Last Name:</td>
     <td><?php echo $regis['lname']; ?></td>
   </tr>
   <tr>
     <td>Email:</td>
     <td><?php echo $regis['email']; ?></td>
   </tr>
   <tr>
     <td>Contact:</td>
     <td><?php echo $regis['contact']; ?></td>
   </tr>
   <tr>
     <td>Country:</td>
     <td><?php echo $regis['country']; ?></td>
   </tr>
   <tr>
     <td>State:</td>
     <td><?php echo $regis['state']; ?></td>
   </tr>
   <tr>
     <td>City:</td>
     <td><?php echo $regis['city']; ?></td>
   </tr>
   <tr>
     <td>Gender:</td>
     <td><?php echo $regis['gender']; ?></td>
   </tr>
   <tr>
     <td>Address:</td>
     <td><?php echo $regis['address']; ?></td>
   </tr>
   <tr>
     <td>Subject:</td>
     <td><?php echo $regis['subject']; ?></td>
   </tr>
   <tr>
     <td>Id:</td>
     <td><?php echo $regis['id']; ?></td>
   </tr>
   <tr>

     <td> <button onclick="render(<?php echo $regis['id']; ?>);">Edit</button></td>
   </tr>

 </table>