<?php
function volunteer_form(){
	global $wpdb;

	$base           =   get_site_url();
	$this_page      =   $_SERVER['REQUEST_URI'];
	$page           =   $_POST['page'];

	if ( $page == NULL ) {
		echo '
			<form class="volunteer-form" method="post" action="' . $this_page .'">
                <div class="form-full">
                    <label for="location">Where do you want to volunteer?</label>
                    <select name="location" required>
                        <option value="">Please Select</option>
                        <option value="Chicago">Chicago</option>
                        <option value="San Francisco">San Francisco</option>
                    </select>
                </div>
				<div class="form-third">
                    <label for="first">First Name</label>
					<input type="text" name="first" id="first" value="" required>
				</div>
				<div class="form-third">
                    <label for="last">Last Name</label>
                    <input type="text" name="last" id="last" value="" required>
                </div>
				<div class="form-third">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" value="" placeholder="me@email.com" required>
                </div>
				<div class="form-full">
					<input type="hidden" value="1" name="page" />
					<input class="submit" type="submit" />
				</div>
			</form>
		';
	}elseif ( $page == 1 ) {

        $location  =   $_POST['location'];
        $first     =   $_POST['first'];
        $last      =   $_POST['last'];
        $email     =   $_POST['email'];

        $page_one_table = 'volunteers';
  
        $page_one_inputs =  array(
            'location' => $location,
            'first' => $first,
            'last' => $last,
            'email' => $email,
            'page' => $page
        );

        $insert_page_one  =   $wpdb->insert($page_one_table, $page_one_inputs);

        $form_id = $wpdd->insert_id;

        echo '  <p>Thank you ' . $first . '.</p>
                <p>We&rsquo;ll be in touch with you closer to the event.</p>
        ';
    }
} 
?>