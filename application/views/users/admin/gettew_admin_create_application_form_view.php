<div class="w3-container w3-center">
<br><br>
	<span class="w3-center w3-text-blue-grey
	w3-xlarge"> Create Application Form</span>
	<br>
<div class="w3-container">
	<?=form_open_multipart('advertiser_dashboard/cpa_form') ?>
	<?php
if(isset($_SESSION['action_status_report']))
{

	echo "<span class='w3-text-red'>".$_SESSION['action_status_report']."</span>";
}
	?>
	<div class="w3-text-red"><?=validation_errors() ?></div>
	
<div id="rowcontainers" class="w3-container">
	<div id="holdline">
			<div class="w3-cell-row">
				<div class="w3-third">
<span class="w3-tiny w3-label w3-margin">Field Type</span><br>

<select id="type1" class="w3-padding w3-margin" name="type[]" onclick="postSelectAction(this.value,'type1','field1','fieldselectitem1','fieldvalues1')">
	<option value="text">Text</option>
	<option value="password">Password</option>
	<option value="number">Number</option>
	<option value="dropdown">Dropdown</option>
	<option value="radio">Radio</option>
	<option value="checkbox">Checkbox</option>


</select>
		</div><div class="w3-third">

<span class="w3-tiny w3-label w3-margin">Field Name</span><br>

			<input id="field1" type="text" name="field_name[]" placeholder="Field Name E.G FIRST NAME" class="w3-padding w3-margin" />
</div><div class="w3-third">
<span  style="display: none;"   id='fieldvalues1' class="w3-tiny w3-label">Field Value(s)</span><br>


            <input style="display: none" id="fieldselectitem1" type="text" name="fieldselectitem[]" placeholder="Separated by comma E.G music,sport" class="w3-padding" />

</div>
</div>
</div>
</div>




			<br>
			<input id="handleMoreBtn" type="hidden" name="no_field" value="2">
	<input  type="button" onclick="handleMore()" name="2" class="w3-btn w3-round w3-teal w3-margin w3-small" value="Add Field +"/>	

		</div>

    <input type="submit" name="Submit" class="w3-button w3-teal w3-round" value="Next"/>
    </form>



<br>
<script type="text/javascript">

function handleMore(){
var handleMoreBtn = document.getElementById('handleMoreBtn');
var rowcontainers = document.getElementById('rowcontainers');
var row = document.getElementById('holdline');

var newrow = row.innerHTML;
newrow = newrow.replace(/1/g,handleMoreBtn.value);
rowcontainers.insertAdjacentHTML('beforeend',newrow);

handleMoreBtn.value= (Number(handleMoreBtn.value) + 1).toString();
}

	function postSelectAction(input_value,type_box_id,target_field,field_values,fieldvaluesdiv){
//change placeholder
var target_field = document.getElementById(target_field);
var field_values = document.getElementById(field_values);
var value_div = document.getElementById(fieldvaluesdiv);
switch(input_value){
	case 'text':
	target_field.setAttribute("placeholder","Field Name E.G FIRST NAME");
	 field_values.style.display ='none';
	value_div.style.display ='none';

	break;
	case 'password':
	target_field.setAttribute("placeholder","Field Name E.G Account Password");
	 field_values.style.display ='none';
		value_div.style.display ='none';


	break;
	case 'number':
		target_field.setAttribute("placeholder","Field Name E.G PHONE NUMBER");
		field_values.style.display ='none';
			value_div.style.display ='none';



    break;
    case 'dropdown':
		target_field.setAttribute("placeholder","Field Name E.G Category");
		//show select item of the field here
		field_values.style.display ='Block';
		value_div.style.display ='Block';


    break;
     case 'radio':
		target_field.setAttribute("placeholder","Field Name E.G Gender");
		//show select item of the field here
		field_values.style.display ='Block';
		value_div.style.display ='Block';


    break;

 case 'checkbox':
		target_field.setAttribute("placeholder","Field Name E.G Languages");
		//show select item of the field here
		field_values.style.display ='Block';
		value_div.style.display ='Block';

    break;
    default :
    			value_div.style.display ='none';

    	break;

}





	}
	function checkAccessType(access_value) {
     var pricebox = document.getElementById("pricebox");
if(access_value == "paid")
{
 pricebox.className = pricebox.className.replace("w3-hide", "");

	}else{
		 pricebox.className += " w3-hide";

	}
}
</script>

</div>
</div>
