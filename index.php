<?php 
	if (isset($_POST['map_submit'])) { 
		require_once ('include/regi.php');
	}
		$valid_cookie = false;
		if(isset($_COOKIE["MudmapLog"])) {
			require_once ('include/functions.php');
		}
?>
<!DOCTYPE html>
<!--[if IE 7]>                  <html xmlns="http://www.w3.org/1999/xhtml" class="ie7"><![endif]-->

<!--[if lte IE 8]>              <html xmlns="http://www.w3.org/1999/xhtml" class="ie8"><![endif]-->

<!--[if (gte IE 9)|!(IE)]><!--> <html xmlns="http://www.w3.org/1999/xhtml" class="not-ie">  <!--<![endif]-->
<head>
	<title>The Mud Map Project - 4WD Map of Australia</title>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/form-style.css"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="js/jquery-1.9.0.js"></script>
	<script src="js/form.js"></script>
	<script type="text/javascript" src="js/jquery.selectbox-0.2.js"></script>
</head>

<body>
<div id="inner"> <!-- Begin inner -->
 <div id="container"> <!-- Begin container -->
    <div class="grid">
    <div class="grid_1">
    <h1>Mud Map account features</h1>
    <div class="grid_3">
    <div class="b1">
    <h2>Download offline maps</h2>
    <p>Browse over 60,000 outdoor activity maps. Purchase<br /> and download for offline use with Mud Map apps.</p>
    </div>
    <div class="b2">
    <h2>Plan your trips</h2>
    <p>Explore awesome destination and plan your trip<br /> from any Mac or PC.</p>
    </div>
    <div class="b3">
    <h2>Replay your journey</h2>
    <p>View your tracks, pins and photos. Manage and <br />sync your data across all devices.</p>
    </div>
    <div class="b4">
    <h2>Share your adventures</h2>
    <p>Publish your trips and share with friends across all<br /> your social networks.</p>
    </div>
    </div>
    </div>
    <!-- End grid_1 -->
    
    <div class="grid_2">
    <h1>Sign up</h1>
    <div class="grid_4">
    <div class="section">
    
		<?php if (isset($_POST['map_submit'])) { ?>
			
			<?php require_once ('include/regi.php'); ?>
			
			<?php if ($err_msg != "") { ?>
				<div id="error">
					<ul>
						<?php echo $err_msg; ?>
					</ul>
				</div>
			<?php } ?>	
			
		<?php } ?>
		
		<?php if( !$success_dbEntry )  { ?>
			
			<?php if( !$valid_cookie )  { ?>
			
				<form method="post" id="customForm" action="">
					<p>
						<label class="only-IE" for="map_firstName">First Name</label>
						<input id="name" name="map_firstName" type="text" class="first_name" value="<?php echo $_POST['map_firstName']; ?>" placeholder="First Name" />
					</p>
					<p>
						<label class="only-IE" for="map_lastName">Last Name</label>
						<input id="lastname" name="map_lastName" type="text"  class="last_name" value="<?php echo $_POST['map_lastName']; ?>" placeholder="Last Name" /> 
					</p>
					<p>
						<label class="only-IE" for="map_email">Email ID</label>
						<input id="email" name="map_email" type="text" class="text" value="<?php echo $_POST['map_email']; ?>" placeholder="Email ID" />
						
					</p>
					<p>
						<label class="only-IE" for="map_confirmEmail">Confirm Email ID</label>
						<input id="confirm_email" name="map_confirmEmail" type="text" class="confirm_email" value="<?php echo $_POST['map_confirmEmail']; ?>" placeholder="Confirm Email ID" />
						
					</p>
					<p>
						<label class="only-IE" for="map_password">Password</label>
						<input id="pass1" name="map_password" type="password" class="Password" value="<?php echo $_POST['map_password']; ?>" placeholder="Password" />
					</p>
					
					<p>
						<label class="only-IE" for="map_country">Country</label>
						<select id="country_id" name="map_country" >
							  <option value="" selected="selected">Select Country</option>
							  <option value="United States">United States</option>
							  <option value="United Kingdom">United Kingdom</option>
							  <option value="Afghanistan">Afghanistan</option>
							  <option value="Albania">Albania</option>
							  <option value="Algeria">Algeria</option>
							  <option value="American Samoa">American Samoa</option>
							  <option value="Andorra">Andorra</option>
							  <option value="Angola">Angola</option>
							  <option value="Anguilla">Anguilla</option>
							  <option value="Antarctica">Antarctica</option>
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
							  <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
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
							  <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
							  <option value="Colombia">Colombia</option>
							  <option value="Comoros">Comoros</option>
							  <option value="Congo">Congo</option>
							  <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
							  <option value="Cook Islands">Cook Islands</option>
							  <option value="Costa Rica">Costa Rica</option>
							  <option value="Cote D'ivoire">Cote D'ivoire</option>
							  <option value="Croatia">Croatia</option>
							  <option value="Cuba">Cuba</option>
							  <option value="Cyprus">Cyprus</option>
							  <option value="Czech Republic">Czech Republic</option>
							  <option value="Denmark">Denmark</option>
							  <option value="Djibouti">Djibouti</option>
							  <option value="Dominica">Dominica</option>
							  <option value="Dominican Republic">Dominican Republic</option>
							  <option value="Ecuador">Ecuador</option>
							  <option value="Egypt">Egypt</option>
							  <option value="El Salvador">El Salvador</option>
							  <option value="Equatorial Guinea">Equatorial Guinea</option>
							  <option value="Eritrea">Eritrea</option>
							  <option value="Estonia">Estonia</option>
							  <option value="Ethiopia">Ethiopia</option>
							  <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
							  <option value="Faroe Islands">Faroe Islands</option>
							  <option value="Fiji">Fiji</option>
							  <option value="Finland">Finland</option>
							  <option value="France">France</option>
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
							  <option value="Guinea-bissau">Guinea-bissau</option>
							  <option value="Guyana">Guyana</option>
							  <option value="Haiti">Haiti</option>
							  <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
							  <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
							  <option value="Honduras">Honduras</option>
							  <option value="Hong Kong">Hong Kong</option>
							  <option value="Hungary">Hungary</option>
							  <option value="Iceland">Iceland</option>
							  <option value="India">India</option>
							  <option value="Indonesia">Indonesia</option>
							  <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
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
							  <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
							  <option value="Korea, Republic of">Korea, Republic of</option>
							  <option value="Kuwait">Kuwait</option>
							  <option value="Kyrgyzstan">Kyrgyzstan</option>
							  <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
							  <option value="Latvia">Latvia</option>
							  <option value="Lebanon">Lebanon</option>
							  <option value="Lesotho">Lesotho</option>
							  <option value="Liberia">Liberia</option>
							  <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
							  <option value="Liechtenstein">Liechtenstein</option>
							  <option value="Lithuania">Lithuania</option>
							  <option value="Luxembourg">Luxembourg</option>
							  <option value="Macao">Macao</option>
							  <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
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
							  <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
							  <option value="Moldova, Republic of">Moldova, Republic of</option>
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
							  <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
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
							  <option value="Russian Federation">Russian Federation</option>
							  <option value="Rwanda">Rwanda</option>
							  <option value="Saint Helena">Saint Helena</option>
							  <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
							  <option value="Saint Lucia">Saint Lucia</option>
							  <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
							  <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
							  <option value="Samoa">Samoa</option>
							  <option value="San Marino">San Marino</option>
							  <option value="Sao Tome and Principe">Sao Tome and Principe</option>
							  <option value="Saudi Arabia">Saudi Arabia</option>
							  <option value="Senegal">Senegal</option>
							  <option value="Serbia and Montenegro">Serbia and Montenegro</option>
							  <option value="Seychelles">Seychelles</option>
							  <option value="Sierra Leone">Sierra Leone</option>
							  <option value="Singapore">Singapore</option>
							  <option value="Slovakia">Slovakia</option>
							  <option value="Slovenia">Slovenia</option>
							  <option value="Solomon Islands">Solomon Islands</option>
							  <option value="Somalia">Somalia</option>
							  <option value="South Africa">South Africa</option>
							  <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
							  <option value="Spain">Spain</option>
							  <option value="Sri Lanka">Sri Lanka</option>
							  <option value="Sudan">Sudan</option>
							  <option value="Suriname">Suriname</option>
							  <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
							  <option value="Swaziland">Swaziland</option>
							  <option value="Sweden">Sweden</option>
							  <option value="Switzerland">Switzerland</option>
							  <option value="Syrian Arab Republic">Syrian Arab Republic</option>
							  <option value="Taiwan, Province of China">Taiwan, Province of China</option>
							  <option value="Tajikistan">Tajikistan</option>
							  <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
							  <option value="Thailand">Thailand</option>
							  <option value="Timor-leste">Timor-leste</option>
							  <option value="Togo">Togo</option>
							  <option value="Tokelau">Tokelau</option>
							  <option value="Tonga">Tonga</option>
							  <option value="Trinidad and Tobago">Trinidad and Tobago</option>
							  <option value="Tunisia">Tunisia</option>
							  <option value="Turkey">Turkey</option>
							  <option value="Turkmenistan">Turkmenistan</option>
							  <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
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
							  <option value="Viet Nam">Viet Nam</option>
							  <option value="Virgin Islands, British">Virgin Islands, British</option>
							  <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
							  <option value="Wallis and Futuna">Wallis and Futuna</option>
							  <option value="Western Sahara">Western Sahara</option>
							  <option value="Yemen">Yemen</option>
							  <option value="Zambia">Zambia</option>
							  <option value="Zimbabwe">Zimbabwe</option>
						</select>
					</p>
					
					<p  class="p1"> By clicking sign up, you agree to<br /><a href="##">Terms of service</a> and <a href="##">privacy policy</a></p>
				  
					  <script type="text/javascript">
						$('#area').restrictLength($('#maxlength'));
					</script>
					<p>
						<input id="send" name="map_submit" type="submit" value="Send" />
					</p>
				</form>
		
			<?php } else { ?>
			
				<div id="error" class="valid">
					<ul>
						<li><strong><em>Congratulations</em> <?php echo $firstName_cookie . " " . $lastName_cookie; ?></strong> You are logged in.</li>
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</div>
				
			<?php }  ?>
		<?php }  ?>
		
    </div>
    </div>
    </div>
    <!-- End grid_2 -->
    </div>
  
 </div> <!-- End of container -->

</div> <!-- End inner -->
<script type="text/javascript">
		$(function () {
			$("#country_id").selectbox();
		});
		</script>
</body>
</html>
