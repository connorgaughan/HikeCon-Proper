<?php
function volunteer_form(){
    global $wpdb;

    $base           =   get_site_url();
    $this_page      =   $_SERVER['REQUEST_URI'];
    $page           =   $_POST['page'];

    if ( $page == NULL ) {
        echo '<header>';
        echo '<h1>'; the_title(); echo '</h1>';
        echo '</header><div class="content">';
        echo '
            <form class="volunteer-form" method="post" action="' . $this_page .'">
                <div class="form-full">
                    <label for="toDo">What would you like to do?</label>
                    <select name="toDo" required>
                        <option value="">Please Select</option>
                        <option value="volunteer">Volunteer for Hike</option>
                        <option value="sponsor">Become a Hike Sponor</option>
                    </select>
                </div>
                <div class="form-full">
                    <input type="hidden" value="1" name="page" />
                    <input class="submit" type="submit" />
                </div>
            </form>
        </div>';
    }elseif ( $page == 1 ) {
        $toDo = $_POST['toDo'];

        if( $toDo == 'volunteer' ){
            echo '<header>';
            echo '<h1>Volunteer for Hike</h1>';
            echo '</header><div class="content">';
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
                    <input type="hidden" value="2" name="page" />
                    <input class="submit" type="submit" />
                </div>
            </form>
        </div>';
        }elseif( $toDo == 'sponsor' ){
            echo '<header>';
            echo '<h1>Become a Hike Sponsor</h1>';
            echo '</header><div class="content">';
            echo '
            <form class="volunteer-form" method="post" action="' . $this_page .'">
                <div class="form-full">
                    <label for="location">Where city do you want to sponsor?</label>
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
                    <label for="tier">What type of sponsor are you looking to be?</label>
                    <select name="tier" required>
                        <option value="">Please Select</option>
                        <option value="Bronze">Bronze/Supporting &mdash; $500</option>
                        <option value="Gold">Gold &mdash; $2,500</option>
                        <option value="Platinum">Platinum &mdash; $5,000</option>
                        <option value="Diamond">Diamond &mdash; $10,000</option>
                    </select>
                </div>
                <div class="form-full">
                    <input type="hidden" value="3" name="page" />
                    <input class="submit" type="submit" />
                </div>
            </form>
        </div>';
        }
    }elseif($page == 2){
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

        echo '<header>';
        echo '<h1>'; the_title(); echo '</h1>';
        echo '</header><div class="content">';
        echo '  <p>Thank you ' . $first . '.</p>
                <p>We&rsquo;ll be in touch with you closer to the event.</p>
        </div>';

    }elseif($page == 3){
        $location  =   $_POST['location'];
        $first     =   $_POST['first'];
        $last      =   $_POST['last'];
        $email     =   $_POST['email'];
        $phone     =   $_POST['phone'];
        $company   =   $_POST['company'];
        $tier      =   $_POST['tier'];

        
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

        $to = "connorgaughan@gmail.com";

        // send the email
        wp_mail($to, $subject, $message, $header);

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

        // send the user back to the form
        echo '<header>';
        echo '<h1>'; the_title(); echo '</h1>';
        echo '</header><div class="content">';
        echo '  <p>Thank you ' . $first . '.</p>
                <p>We&rsquo;ll be in touch shortly.</p>
        </div>';
    }
} 
?>