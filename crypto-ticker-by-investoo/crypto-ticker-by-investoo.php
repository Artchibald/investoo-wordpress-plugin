<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              archibaldbutler.com
 * @since             1.0.0
 * @package           Crypto_Ticker_By_Investoo
 *
 * @wordpress-plugin
 * Plugin Name:       crypto-ticker-by-investoo
 * Plugin URI:        crypto-ticker-by-investoo
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            investoo
 * Author URI:        archibaldbutler.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       crypto-ticker-by-investoo
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CRYPTO_TICKER_BY_INVESTOO_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-crypto-ticker-by-investoo-activator.php
 */
function activate_crypto_ticker_by_investoo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crypto-ticker-by-investoo-activator.php';
	Crypto_Ticker_By_Investoo_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-crypto-ticker-by-investoo-deactivator.php
 */
function deactivate_crypto_ticker_by_investoo() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-crypto-ticker-by-investoo-deactivator.php';
	Crypto_Ticker_By_Investoo_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_crypto_ticker_by_investoo' );
register_deactivation_hook( __FILE__, 'deactivate_crypto_ticker_by_investoo' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-crypto-ticker-by-investoo.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_crypto_ticker_by_investoo() {

	$plugin = new Crypto_Ticker_By_Investoo();
	$plugin->run();

}
run_crypto_ticker_by_investoo();



// RUN WIDGET

// The widget class
class Crypto_Ticker_By_Investoo_Widget extends WP_Widget {

	// Main constructor
// Main constructor
public function __construct() {
	parent::__construct(
		'my_custom_widget',
		__( 'My Custom Widget', 'text_domain' ),
		array(
			'customize_selective_refresh' => true,
		)
	);
}
// The widget form (for the backend )
public function form( $instance ) {

	// Set widget defaults
	$defaults = array(
		'title'    => '',
		'text'     => '',
        'textarea' => '',
		'actualcryptowidget' => '',
		'checkbox' => '',
		'select'   => '',
	);
	
	// Parse current settings with defaults
	extract( wp_parse_args( ( array ) $instance, $defaults ) ); ?>

	<?php // Widget Title ?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Widget Title', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
	</p>

	<?php // Text Field ?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php _e( 'Text:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
	</p>

	<?php // Textarea Field ?>
	<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>"><?php _e( 'Textarea:', 'text_domain' ); ?></label>
		<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'textarea' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'textarea' ) ); ?>"><?php echo wp_kses_post( $textarea ); ?></textarea>
	</p>




	<?php // actualcryptowidget Field ?>
    <p>Crypto widget will appear here if you tick the box below<br />
		<input id="<?php echo esc_attr( $this->get_field_id( 'actualcryptowidget' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actualcryptowidget' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $actualcryptowidget ); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id( 'actualcryptowidget' ) ); ?>"><?php _e( 'Tick this to make the widget appear', 'text_domain' ); ?></label>
	</p>




	<?php // Checkbox ?>
	<p>
		<input id="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'checkbox' ) ); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?> />
		<label for="<?php echo esc_attr( $this->get_field_id( 'checkbox' ) ); ?>"><?php _e( 'Checkbox', 'text_domain' ); ?></label>
	</p>

	<?php // Dropdown ?>
	<p>
		<label for="<?php echo $this->get_field_id( 'select' ); ?>"><?php _e( 'Select', 'text_domain' ); ?></label>
		<select name="<?php echo $this->get_field_name( 'select' ); ?>" id="<?php echo $this->get_field_id( 'select' ); ?>" class="widefat">
		<?php
		// Your options array
		$options = array(
			''        => __( 'Select', 'text_domain' ),
			'option_1' => __( 'Option 1', 'text_domain' ),
			'option_2' => __( 'Option 2', 'text_domain' ),
			'option_3' => __( 'Option 3', 'text_domain' ),
		);

		// Loop through options and add each one to the select dropdown
		foreach ( $options as $key => $name ) {
			echo '<option value="' . esc_attr( $key ) . '" id="' . esc_attr( $key ) . '" '. selected( $select, $key, false ) . '>'. $name . '</option>';

		} ?>
		</select>
	</p>

<?php }

	// Update widget settings
// Update widget settings
public function update( $new_instance, $old_instance ) {
	$instance = $old_instance;
	$instance['title']    = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
	$instance['text']     = isset( $new_instance['text'] ) ? wp_strip_all_tags( $new_instance['text'] ) : '';
    $instance['textarea'] = isset( $new_instance['textarea'] ) ? wp_kses_post( $new_instance['textarea'] ) : '';
	$instance['actualcryptowidget'] = isset( $new_instance['actualcryptowidget'] ) ? wp_kses_post( $new_instance['actualcryptowidget'] ) : '';
	$instance['checkbox'] = isset( $new_instance['checkbox'] ) ? 1 : false;
	$instance['select']   = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';
	return $instance;
}

// Display the widget
public function widget( $args, $instance ) {

	extract( $args );

	// Check the widget options
	$title    = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
	$text     = isset( $instance['text'] ) ? $instance['text'] : '';
    $textarea = isset( $instance['textarea'] ) ?$instance['textarea'] : '';
	$actualcryptowidget = isset( $instance['actualcryptowidget'] ) ?$instance['actualcryptowidget'] : '';
	$select   = isset( $instance['select'] ) ? $instance['select'] : '';
	$checkbox = ! empty( $instance['checkbox'] ) ? $instance['checkbox'] : false;

	// WordPress core before_widget hook (always include )
	echo $before_widget;

   // Display the widget
   echo '<div class="widget-text wp_widget_plugin_box">';

		// Display widget title if defined
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		// Display text field
		if ( $text ) {
			echo '<p>' . $text . '</p>';
		}

		// Display textarea field
		if ( $textarea ) {
			echo '<p>' . $textarea . '</p>';
		}

		// Display custom API code field
		if ( $actualcryptowidget ) {
          
              
                ?>
                <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}


@import url("https://fonts.googleapis.com/css?family=Source+Sans+Pro");

body {
  font-family: "Source Sans Pro", sans-serif;
  font-size: 1.25em;
}

.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  grid-column-gap: 1em;
  grid-row-gap: 2em;
  max-width: 1040px;
  margin: 0 auto;
  padding: 0 1em;
}

.ps {
  grid-column: 1 / span 2;
  text-align: center;
}

.is-error {
  color: red;
}

p {
  margin: 0;
}

p + p {
  margin-top: 0.25em;
}

</style>

<h1>Archibald Butler Test</h1>
<ul>
<li>Spent exactly 2 hours</li>
<li>installed Wordpress locally</li>
<li>Grabbed a default widget template plugin</li>
<li>Split mp php file to include the long custom html string and javascript in my widget</li>
<li>Added some javascript tabs (USD and EURO) with crypto tables in them</li>
<li>Had a refresh on APIs and got the CSS TRICKS - Chris Coyer Github API working in my first table cell</li>
<li>Signed up to Coin Market Cap Developer APIS website to get TOKEN</li>
<li>Ran out of time!</li>
</ul> 
<h2>Tabs</h2>
<p>Click on the buttons inside the tabbed menu to see some Crypto Prices:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'USD')">USD</button>
  <button class="tablinks" onclick="openCity(event, 'EURO')">EURO</button>

</div>

<div id="USD" class="tabcontent">
  <h3>USD</h3>
  <table>
  <tr>
    <th>Crypto</th>
    <th>Price</th>

  </tr>
  <tr>
    <td>BITCOIN</td>
    <td class="fetch-repo">???</td>
  </tr>

  <tr>
    <td>ETHEREUM</td>
    <td>???</td>
  </tr>

</table>
</div>

<div id="EURO" class="tabcontent">
  <h3>EURO</h3>
  <table>
  <tr>
    <th>Crypto</th>
    <th>Price</th>

  </tr>
  <tr>
    <td>BITCOIN</td>
    <td>???</td>
  </tr>

  <tr>
    <td>ETHEREUM</td>
    <td>???</td>
  </tr>

</table>
</div>


<script>
//TABBED CONTENT JS
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// GRAB API
/* global fetch */
function zlFetch (url, options = undefined) {
  return fetch(url, optionsHandler(options))
    .then(handleResponse)
}

function optionsHandler (options) {
  let def = {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
  }

  if (!options) return def

  let r = Object.assign({}, def, options)
  if (objectHasKey(options, 'token')) {
    delete r.token
    r.headers.Authorization = 'Bearer ' + options.token
  }

  delete r.body
  if (options.body) {
    if (!objectIsEmpty(options.body)) {
      r.body = JSON.stringify(options.body)
    }
  }

  return r
}

const handlers = {
  JSONResponseHandler (response) {
    return response.json()
    .then(json => {
      if (response.ok) {
        return json
      } else {
        return Promise.reject(Object.assign({}, json, {
          statusText: response.statusText, 
          status: response.status
        }))
      }
    })
  },
  textResponseHandler (response) {
    return response.text()
    .then(text => {
      if (response.ok) {
        return json
      } else {
        return Promise.reject({
          statusText: response.statusText,
          status: response.status,
          err: text
        })
      }
    })
  }
}

function handleResponse (response) {
  let contentType = response.headers.get('content-type')
  if (contentType.includes('application/json')) {
    return handlers.JSONResponseHandler(response)
  } else if (contentType.includes('text/html')) {
    return handlers.textResponseHandler(response)
  } else {
    throw new Error(`Sorry, content-type ${contentType} not supported`)
  }
}

function objectIsEmpty (obj) {
  return (Object.getOwnPropertyNames(obj).length === 0)
}

function objectHasKey (o, prop) {
  return o.hasOwnProperty(prop)
}










// Fetch Chris's repo
let fetchRepoDiv = document.querySelector('.fetch-repo')
zlFetch('https://api.github.com/users/chriscoyier/repos')
  .then(data => listRepos(fetchRepoDiv, data))
  .catch(error => {
    writeError(fetchRepoDiv, error)
  })

// Fetch nonexistent repo
let nonexistentDiv = document.querySelector('.fetch-non-existent-repo')
zlFetch('https://api.github.com/users/chrissycoyier/repos')
  .then(data => listRepos(nonexistentDiv, data))
  .catch(error =>  writeError(nonexistentDiv, error))


// List Repos
function listRepos (listDiv, repos) {
  console.log(repos)
  let ul = document.createElement('ul')
  repos.forEach(repo => {
    let li = document.createElement('li')
    li.innerHTML = `<a href=${repo.url}>${repo.name}</a>`
    ul.append(li)
  })
  console.log(ul)
  listDiv.append(ul)
}

// Writes Errors
function writeError (errorDiv, error) {
  let errorMessage = document.createElement('div')
  errorMessage.classList.add('is-error')
  errorMessage.innerHTML = 
    `<div> status: ${error.status}</div>
     <div> statusText: ${error.statusText} </div>
     <div> message: ${error.message} </div>`
  errorDiv.append(errorMessage)
}

</script>



            <?php






		}


		// Display select field
		if ( $select ) {
			echo '<p>' . $select . '</p>';
		}

		// Display something if checkbox is true
		if ( $checkbox ) {
			echo '<p>Something awesome</p>';
		}

	echo '</div>';

	// WordPress core after_widget hook (always include )
	echo $after_widget;

}

}

// Register the widget
function register_Crypto_Ticker_By_Investoo_Widget() {
	register_widget( 'Crypto_Ticker_By_Investoo_Widget' );
}
add_action( 'widgets_init', 'register_Crypto_Ticker_By_Investoo_Widget' );