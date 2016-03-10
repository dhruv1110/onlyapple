<?php session_start();
if(!isset($_SESSION['id']))
{
	header('Location: http://localhost/onlyapple/login/');
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>Settings - AppleChain</title>
<?php
include 'core/meta.php';
?>
<link rel="stylesheet" type="text/css" href="core/css/style.css" />
<link href="slider/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="slider/js-image-slider.js" type="text/javascript"></script>
<script src="core/js/common.js" type="text/javascript"></script>
<script type="text/javascript"></script>


</head>

<body>
	
	<?php
	include 'core/header.php';
	include 'core/db.php';
	$uid = $_SESSION['id'];
	
	$con = mysql_connect($db_host,$db_user,$db_pwd);
	mysql_select_db($db_name,$con);
	
	if(isset($_POST['id']))
	{
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$city  =$_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];
		$pincode = $_POST['pincode'];
		$mobile = $_POST['mobile'];
		$sid = $_POST['id'];
		mysql_query("UPDATE profile SET first_name='$firstname' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET last_name='$lastname' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET email='$email' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET address='$address' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET city='$city' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET state='$state' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET country='$country' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET pincode='$pincode' WHERE user_id='$sid'");
		mysql_query("UPDATE profile SET mobile='$mobile' WHERE user_id='$sid'");
	}
	
	
	
	
	
	$query = mysql_query("SELECT * FROM profile WHERE user_id='$uid'");
	echo mysql_error();
	while($row = mysql_fetch_array($query))
	{
		$firstname = $row['first_name'];
		$lastname = $row['last_name'];
		$email = $row['email'];
		$address = $row['address'];
		$city = $row['city'];
		$state = $row['state'];
		$country = $row['country'];
		$mobile = $row['mobile'];
		$pincode = $row['pincode'];
	}
	mysql_close();
	
	include 'core/footer.php';
	?>
<div class="center_container">
  <center>
      <h1>Update your profile</h1>
      <h5>Please enter your details in form below</h5>
  </center>
  <br />
  <form class="form-horizontal" role="form" method="post" action="#" id="regForm">
	  <div class="form-group">
        <label for="firstname" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name" style="width: 49%;display: inline;">
          <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name" style="width: 49%;display: inline; margin-left:10px;">
        </div>
      </div>
      <div class="form-group">
        <label for="email" class="col-lg-2 control-label">Email</label>
        <div class="col-lg-10">
          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="Address" class="col-lg-2 control-label">Address</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="address" name="address" placeholder="Address">
        </div>
      </div>
      <div class="form-group">
        <label for="city" class="col-lg-2 control-label">City</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="city" name="city" placeholder="City">
        </div>
      </div>
      <div class="form-group">
        <label for="state" class="col-lg-2 control-label">State</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="state" name="state" placeholder="State">
        </div>
      </div>
      <div class="form-group">
        <label for="country" class="col-lg-2 control-label">Country</label>
        <div class="col-lg-10">
          <select id="country" name="country" class="form-control">
            <option value="Afghanistan">Afghanistan</option>
            <option value="Albania">Albania</option>
            <option value="Algeria">Algeria</option>
            <option value="American Samoa">American Samoa</option>
            <option value="Andorra">Andorra</option>
            <option value="Angola">Angola</option>
            <option value="Anguilla">Anguilla</option>
            <option value="Antartica">Antarctica</option>
            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
            <option value="Argentina">Argentina</option>
            <option value="Armenia">Armenia</option>
            <option value="Aruba">Aruba</option>
            <option value="Australia">Australia</option>
            <option value="Austria">Austria</option>
            <option value="Azerbaijan">Azerbaijan</option>
            <option value="Bahamas">Bahamas</option>
            <option value="Bahrain">Bahrain</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Barbados">Barbados</option>
            <option value="Belarus">Belarus</option>
            <option value="Belgium">Belgium</option>
            <option value="Belize">Belize</option>
            <option value="Benin">Benin</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Bolivia">Bolivia</option>
            <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
            <option value="Botswana">Botswana</option>
            <option value="Bouvet Island">Bouvet Island</option>
            <option value="Brazil">Brazil</option>
            <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
            <option value="Brunei Darussalam">Brunei Darussalam</option>
            <option value="Bulgaria">Bulgaria</option>
            <option value="Burkina Faso">Burkina Faso</option>
            <option value="Burundi">Burundi</option>
            <option value="Cambodia">Cambodia</option>
            <option value="Cameroon">Cameroon</option>
            <option value="Canada">Canada</option>
            <option value="Cape Verde">Cape Verde</option>
            <option value="Cayman Islands">Cayman Islands</option>
            <option value="Central African Republic">Central African Republic</option>
            <option value="Chad">Chad</option>
            <option value="Chile">Chile</option>
            <option value="China">China</option>
            <option value="Christmas Island">Christmas Island</option>
            <option value="Cocos Islands">Cocos (Keeling) Islands</option>
            <option value="Colombia">Colombia</option>
            <option value="Comoros">Comoros</option>
            <option value="Congo">Congo</option>
            <option value="Congo">Congo, the Democratic Republic of the</option>
            <option value="Cook Islands">Cook Islands</option>
            <option value="Costa Rica">Costa Rica</option>
            <option value="Cota D'Ivoire">Cote d'Ivoire</option>
            <option value="Croatia">Croatia (Hrvatska)</option>
            <option value="Cuba">Cuba</option>
            <option value="Cyprus">Cyprus</option>
            <option value="Czech Republic">Czech Republic</option>
            <option value="Denmark">Denmark</option>
            <option value="Djibouti">Djibouti</option>
            <option value="Dominica">Dominica</option>
            <option value="Dominican Republic">Dominican Republic</option>
            <option value="East Timor">East Timor</option>
            <option value="Ecuador">Ecuador</option>
            <option value="Egypt">Egypt</option>
            <option value="El Salvador">El Salvador</option>
            <option value="Equatorial Guinea">Equatorial Guinea</option>
            <option value="Eritrea">Eritrea</option>
            <option value="Estonia">Estonia</option>
            <option value="Ethiopia">Ethiopia</option>
            <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
            <option value="Faroe Islands">Faroe Islands</option>
            <option value="Fiji">Fiji</option>
            <option value="Finland">Finland</option>
            <option value="France">France</option>
            <option value="France Metropolitan">France, Metropolitan</option>
            <option value="French Guiana">French Guiana</option>
            <option value="French Polynesia">French Polynesia</option>
            <option value="French Southern Territories">French Southern Territories</option>
            <option value="Gabon">Gabon</option>
            <option value="Gambia">Gambia</option>
            <option value="Georgia">Georgia</option>
            <option value="Germany">Germany</option>
            <option value="Ghana">Ghana</option>
            <option value="Gibraltar">Gibraltar</option>
            <option value="Greece">Greece</option>
            <option value="Greenland">Greenland</option>
            <option value="Grenada">Grenada</option>
            <option value="Guadeloupe">Guadeloupe</option>
            <option value="Guam">Guam</option>
            <option value="Guatemala">Guatemala</option>
            <option value="Guinea">Guinea</option>
            <option value="Guinea-Bissau">Guinea-Bissau</option>
            <option value="Guyana">Guyana</option>
            <option value="Haiti">Haiti</option>
            <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
            <option value="Holy See">Holy See (Vatican City State)</option>
            <option value="Honduras">Honduras</option>
            <option value="Hong Kong">Hong Kong</option>
            <option value="Hungary">Hungary</option>
            <option value="Iceland">Iceland</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Iran">Iran (Islamic Republic of)</option>
            <option value="Iraq">Iraq</option>
            <option value="Ireland">Ireland</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Jamaica">Jamaica</option>
            <option value="Japan">Japan</option>
            <option value="Jordan">Jordan</option>
            <option value="Kazakhstan">Kazakhstan</option>
            <option value="Kenya">Kenya</option>
            <option value="Kiribati">Kiribati</option>
            <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
            <option value="Korea">Korea, Republic of</option>
            <option value="Kuwait">Kuwait</option>
            <option value="Kyrgyzstan">Kyrgyzstan</option>
            <option value="Lao">Lao People's Democratic Republic</option>
            <option value="Latvia">Latvia</option>
            <option value="Lebanon" selected>Lebanon</option>
            <option value="Lesotho">Lesotho</option>
            <option value="Liberia">Liberia</option>
            <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
            <option value="Liechtenstein">Liechtenstein</option>
            <option value="Lithuania">Lithuania</option>
            <option value="Luxembourg">Luxembourg</option>
            <option value="Macau">Macau</option>
            <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
            <option value="Madagascar">Madagascar</option>
            <option value="Malawi">Malawi</option>
            <option value="Malaysia">Malaysia</option>
            <option value="Maldives">Maldives</option>
            <option value="Mali">Mali</option>
            <option value="Malta">Malta</option>
            <option value="Marshall Islands">Marshall Islands</option>
            <option value="Martinique">Martinique</option>
            <option value="Mauritania">Mauritania</option>
            <option value="Mauritius">Mauritius</option>
            <option value="Mayotte">Mayotte</option>
            <option value="Mexico">Mexico</option>
            <option value="Micronesia">Micronesia, Federated States of</option>
            <option value="Moldova">Moldova, Republic of</option>
            <option value="Monaco">Monaco</option>
            <option value="Mongolia">Mongolia</option>
            <option value="Montserrat">Montserrat</option>
            <option value="Morocco">Morocco</option>
            <option value="Mozambique">Mozambique</option>
            <option value="Myanmar">Myanmar</option>
            <option value="Namibia">Namibia</option>
            <option value="Nauru">Nauru</option>
            <option value="Nepal">Nepal</option>
            <option value="Netherlands">Netherlands</option>
            <option value="Netherlands Antilles">Netherlands Antilles</option>
            <option value="New Caledonia">New Caledonia</option>
            <option value="New Zealand">New Zealand</option>
            <option value="Nicaragua">Nicaragua</option>
            <option value="Niger">Niger</option>
            <option value="Nigeria">Nigeria</option>
            <option value="Niue">Niue</option>
            <option value="Norfolk Island">Norfolk Island</option>
            <option value="Northern Mariana Islands">Northern Mariana Islands</option>
            <option value="Norway">Norway</option>
            <option value="Oman">Oman</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Palau">Palau</option>
            <option value="Panama">Panama</option>
            <option value="Papua New Guinea">Papua New Guinea</option>
            <option value="Paraguay">Paraguay</option>
            <option value="Peru">Peru</option>
            <option value="Philippines">Philippines</option>
            <option value="Pitcairn">Pitcairn</option>
            <option value="Poland">Poland</option>
            <option value="Portugal">Portugal</option>
            <option value="Puerto Rico">Puerto Rico</option>
            <option value="Qatar">Qatar</option>
            <option value="Reunion">Reunion</option>
            <option value="Romania">Romania</option>
            <option value="Russia">Russian Federation</option>
            <option value="Rwanda">Rwanda</option>
            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
            <option value="Saint LUCIA">Saint LUCIA</option>
            <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
            <option value="Samoa">Samoa</option>
            <option value="San Marino">San Marino</option>
            <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
            <option value="Saudi Arabia">Saudi Arabia</option>
            <option value="Senegal">Senegal</option>
            <option value="Seychelles">Seychelles</option>
            <option value="Sierra">Sierra Leone</option>
            <option value="Singapore">Singapore</option>
            <option value="Slovakia">Slovakia (Slovak Republic)</option>
            <option value="Slovenia">Slovenia</option>
            <option value="Solomon Islands">Solomon Islands</option>
            <option value="Somalia">Somalia</option>
            <option value="South Africa">South Africa</option>
            <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
            <option value="Span">Spain</option>
            <option value="SriLanka">Sri Lanka</option>
            <option value="St. Helena">St. Helena</option>
            <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
            <option value="Sudan">Sudan</option>
            <option value="Suriname">Suriname</option>
            <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
            <option value="Swaziland">Swaziland</option>
            <option value="Sweden">Sweden</option>
            <option value="Switzerland">Switzerland</option>
            <option value="Syria">Syrian Arab Republic</option>
            <option value="Taiwan">Taiwan, Province of China</option>
            <option value="Tajikistan">Tajikistan</option>
            <option value="Tanzania">Tanzania, United Republic of</option>
            <option value="Thailand">Thailand</option>
            <option value="Togo">Togo</option>
            <option value="Tokelau">Tokelau</option>
            <option value="Tonga">Tonga</option>
            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
            <option value="Tunisia">Tunisia</option>
            <option value="Turkey">Turkey</option>
            <option value="Turkmenistan">Turkmenistan</option>
            <option value="Turks and Caicos">Turks and Caicos Islands</option>
            <option value="Tuvalu">Tuvalu</option>
            <option value="Uganda">Uganda</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
            <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
            <option value="Uruguay">Uruguay</option>
            <option value="Uzbekistan">Uzbekistan</option>
            <option value="Vanuatu">Vanuatu</option>
            <option value="Venezuela">Venezuela</option>
            <option value="Vietnam">Viet Nam</option>
            <option value="Virgin Islands (British)">Virgin Islands (British)</option>
            <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
            <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
            <option value="Western Sahara">Western Sahara</option>
            <option value="Yemen">Yemen</option>
            <option value="Yugoslavia">Yugoslavia</option>
            <option value="Zambia">Zambia</option>
            <option value="Zimbabwe">Zimbabwe</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="pincode" class="col-lg-2 control-label">Pincode</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Pincode">
        </div>
      </div>
      <div class="form-group">
        <label for="mobile" class="col-lg-2 control-label">Mobile no</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile no">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
          <button type="submit" class="btn btn-default">Save</button>
        </div>
      </div>
      <input type="hidden" name="id" id="id" value="" />
    </form>
</div>
    
    
    
    
    
  
    <script type="text/javascript">
	function update()
	{
		$("#firstname").val('<?php echo $firstname; ?>');
		$("#lastname").val('<?php echo $lastname; ?>');
		$("#email").val('<?php echo $email; ?>');
		$("#address").val('<?php echo $address; ?>');
		$("#city").val('<?php echo $city; ?>');
		$("#state").val('<?php echo $state; ?>');
		$("#country").val('<?php echo $country; ?>');
		$("#mobile").val('<?php echo $mobile; ?>');
		$("#pincode").val('<?php echo $pincode; ?>');
		$("#id").val('<?php echo $uid; ?>');
	}
	update();
    </script>  
    
    
    
</body>
</html>




