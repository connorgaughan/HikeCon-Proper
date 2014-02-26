<?php
function sponsor_form(){
    global $wpdb;

    $base           =   get_site_url();
    $this_page      =   $_SERVER['REQUEST_URI'];
    $page           =   $_POST['page'];

    if ( $page == NULL ) {
        echo '
        <div class="content">
            <form class="volunteer-form" method="post" action="' . $this_page .'">
                <div class="form-full">
                    <label for="location">What city do you want to sponsor?</label>
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
                    <input type="text" name="email" id="email" value="" placeholder="me@email.com" required>
                </div>
                <div class="form-third">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" id="sponsor_phone" value="" required>
                </div>
                <div class="form-third">
                    <label for="company">Company Name</label>
                    <input type="text" name="company" id="company" value="" required>
                </div>
                <div class="form-third">
                    <label for="tier">Type of sponsorship</label>
                    <select name="tier" required>
                        <option value="">Please Select</option>
                        <option value="Monetary Sponsorship">Monetary Sponsorship</option>
                        <option value="In-kind Sponsorship">In-kind Sponsorship</option>
                    </select>
                </div>
                <div class="form-full">
                    <input type="hidden" value="1" name="page" />
                    <input class="submit" type="submit" />
                </div>
            </form>
        </div>

        <header>
            <h2>Current Sponsors</h2>
        </header>
        <div class="content current-sponsors">
            <div class="content">
                <ul class="tier-one">';
                query_posts(array( 'post_type' => 'sponsors'));  while (have_posts ()): the_post();
                $url = get_post_meta($post->ID, 'dbt_sponsors-link', true);
        echo '      <li><a href="' . $url . '">'; the_post_thumbnail(); 
        echo '      </a></li>';
                    endwhile;
        echo '  </ul>';
                wp_reset_query();
        echo '  
            </div>
        </div>
    ';
    }elseif($page == 1){
        $location  =   $_POST['location'];
        $first     =   $_POST['first'];
        $last      =   $_POST['last'];
        $email     =   $_POST['email'];
        $phone     =   $_POST['phone'];
        $company   =   $_POST['company'];
        $tier      =   $_POST['tier'];

        $page_two_table = 'sponsors';
  
        $page_two_inputs =  array(
            'location' => $location,
            'first' => $first,
            'last' => $last,
            'email' => $email,
            'phone' => $phone,
            'company' => $company,
            'tier' => $tier,
            'page' => $page
        );

        $insert_page_two  =   $wpdb->insert($page_two_table, $page_two_inputs);

        $form_id = $wpdd->insert_id;

        $header .= "MIME-Version: 1.0\n";
        $header .= "Content-Type: text/html; charset=utf-8\n";
        $headers .= "From:" . $email;

        $message  = "
        <p><b>Name:</b> $first $last</p>
        <p><b>City of interest:</b> $location</p>
        <p><b>Email Address:</b> $email</p>
        <p><b>Phone:</b> $phone</p>
        <p><b>Company:</b> $company</p>
        <p><b>Sponsorship level:</b> $tier</p>";

        $subject = "Hike Sponsor - $tier";

        $to = "laura.winn@hikecon.com";

        // send the email
        wp_mail($to, $subject, $message, $header);

        // send the user back to the form
        echo '
            <div class="content">
                <p>Thank you ' . $first . '.</p>
                <p>A member of Hike Con will be in touch shortly. Thank you for your interest.</p>
            </div>
        ';
    }
} 
?>