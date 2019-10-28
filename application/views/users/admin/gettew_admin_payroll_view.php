<div class="w3-container w3-center">


  <br>
  <hr>
  <span class="w3-text-theme w3-xlarge w3-center">Manage Payroll</span><br>
  <hr>


     <h5 class="w3-label">Year/Month Reports</h5>

         <select class="w3-center w3-padding-top w3-padding-bottom
         w3-margin-bottom w3-margin-top w3-light-grey" name="year">
             
             <?php
             
        for($i = '20'.date('y');$i >= 2000 ;$i--)
        {
            
        echo  '<option value="'.$i.'">'.$i.'</option>'; 
        }
             
             ?>
             
         </select>



         <select class="w3-center w3-padding-top w3-padding-bottom
         w3-margin-bottom w3-margin-top w3-light-grey" name="month">
             
             <?php
             
       $arr = array('All of the selected Year',"January","February","March","April","May","June","July","August","September","October","November","December");
        for($i = 0;$i < count($arr);$i++)
        {
            
        echo  '<option value="'.$arr[$i].'">'.$arr[$i].'</option>'; 
        }
          
             ?>
             
         </select>


<hr>
         <h5 class="w3-label">Payroll Settings</h5>

    


</div>