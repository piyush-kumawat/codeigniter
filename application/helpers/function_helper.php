<?php 
 function select_country($country){
 $selection = array('India', 'America', 'South Africa', 'Newziland');
 echo '<select name="country">
               <option value="0">Please Select Option</option>';

 foreach ($selection as $selection) {
   $selected = ($country == $selection) ? "selected" : "";
   echo '<option ' . $selected . ' value="' . $selection . '">' . $selection . '</option>';
 }

 echo '</select>';
 }

 function select_state($state)
{
  $selection = array('Mp', 'Gujrat', 'Rajsthan', 'UP');
  echo '<select name="state">
            <option value="0">Please Select Option</option>';

  foreach ($selection as $selection) {
    $selected = ($state == $selection) ? "selected" : "";
    echo '<option ' . $selected . ' value="' . $selection . '">' . $selection . '</option>';
  }

  echo '</select>';
}

function select_city($city)
{
  $selection = array('Indore', 'Ujjain', 'Dewas', 'Bhopal');
  echo '<select name="city">
          <option value="0">Please Select Option</option>';

  foreach ($selection as $selection) {
    $selected = ($city == $selection) ? "selected" : "";
    echo '<option ' . $selected . ' value="' . $selection . '">' . $selection . '</option>';
  }

  echo '</select>';
}

function select_subject($arraysubject)
{
  $selection = array('Maths', 'Science', 'Physics', 'Chemistry', 'English');
  echo '<select name="subject[]" multiple>';
  foreach ($selection as $arr) {
    if (in_array($arr, $arraysubject)) {
      echo '<option selected value="' . $arr . '">' . $arr . '</option>';
    } else {
      echo '<option value="' . $arr . '">' . $arr . '</option>';
    }
  }

  echo '</select>';
}

function select_skils($string_skils)
{
  $selection = array('C', 'C++', 'Php', 'Python', 'ASP');
          echo '<label></label>';
          foreach ($selection as $arr) {
            if (in_array($arr, $string_skils)) {
              echo '<input type="checkbox" checked name="skils[]" value = "'.$arr.'">';
              echo '<label>'.$arr.'</label>';   
            } else {
              echo '<input type="checkbox" name="skils[]" value = "'.$arr.'">';
              echo '<label>'.$arr.'</label>';  
            }
          }
        
          echo '</select>';
}
