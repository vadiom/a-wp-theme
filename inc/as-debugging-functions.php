<?php
add_filter('show_admin_bar', '__return_false');     // Hide admin bar from frontend



// Activate WordPress Maintenance Mode
// add_action('get_header', 'wp_maintenance_mode');
function wp_maintenance_mode()
{
	if (!current_user_can('edit_themes') || !is_user_logged_in()) {
		wp_die('<h1>Under Maintenance</h1><br />Website under planned maintenance. Please check back later.');
	}
}

// Function to print array value along with array holding var name
function as_debug($arr)
{
	if (isset($_REQUEST['dev']) && (1 == $_REQUEST['dev'])) :
		echo 'Debugging info -';
		foreach ($GLOBALS as $var_name => $value) {
			if ($value === $arr) {
				echo '---------------------</br>';
				echo 'Var Name => <b>' . $var_name . '</b></br>';
				echo '---------------------</br>';
				echo '<pre>';
				print_r($arr);
				echo '</pre>';
				echo '---------------------</br>';
			}
		}
	endif;
}

function show_file_path()
{
	if (isset($_REQUEST['dev']) && (1 == $_REQUEST['dev'])) :

		if (isset($_REQUEST['show_file_path']) && (1 == $_REQUEST['show_file_path'])) :
			$debug_backtrack = debug_backtrace();
			$file_path = $debug_backtrack[0]['file'];

			echo '<br />---------------------- <br />';
			echo '<b>File Path -</b> ' . $file_path;
			echo '<br />----------------------<br />';
		endif;
	endif;
}
