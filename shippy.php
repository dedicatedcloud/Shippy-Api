<?php
/**
 * Plugin Name: WooCommerce Postage Calculator
 * Description: Custom postage calculator for WooCommerce with multiple providers, services, and international rates.
 * Version: 1.9
 * Author: Your Name
 */

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

/**
 * Add Postage Calculator settings page under WooCommerce menu
 */
add_action('admin_menu', function () {
    add_submenu_page(
        'woocommerce', // Parent slug
        'Postage Calculator', // Page title
        'Postage Calculator', // Menu title
        'manage_woocommerce', // Capability
        'postage-calculator', // Menu slug
        'render_postage_calculator_settings' // Callback function
    );
});

/**
 * Render Postage Calculator settings page
 */
function render_postage_calculator_settings()
{
    if (!current_user_can('manage_woocommerce')) {
        return;
    }

    // Save settings
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['postage_calculator'])) {
        update_option('postage_calculator_settings', $_POST['postage_calculator']);
        echo '<div class="updated"><p>Settings saved successfully.</p></div>';
    }

    // Get current settings
    $settings = get_option('postage_calculator_settings', []);

    ?>
    <div class="wrap">
        <h1>Postage Calculator Settings</h1>
        <form method="post">
            <h2>General Settings</h2>
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row">Enable Postage Calculator</th>
                        <td>
                            <input type="checkbox" name="postage_calculator[enabled]" value="1"
                                   <?php checked($settings['enabled'] ?? '', '1'); ?>>
                        </td>
                    </tr>
                </tbody>
            </table>

            <h2>Royal Mail</h2>
       <h2>Royal Mail Standard</h2>
<table class="form-table">
    <tbody>
        <tr><th scope="row">Letter 100g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][letter_100g_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['letter_100g_fc'] ?? '1.65'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Letter 100g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][letter_100g_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['letter_100g_sc'] ?? '0.85'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 100g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_100g_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_100g_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 100g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_100g_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_100g_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 250g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_250g_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_250g_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 250g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_250g_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_250g_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 500g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_500g_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_500g_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 500g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_500g_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_500g_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 750g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_750g_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_750g_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 750g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][large_letter_750g_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['large_letter_750g_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][small_parcel_2kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['small_parcel_2kg_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][small_parcel_2kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['small_parcel_2kg_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 2kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_2kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_2kg_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 2kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_2kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_2kg_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 10kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_10kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_10kg_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 10kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_10kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_10kg_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 20kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_20kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_20kg_fc'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Medium Parcel 20kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][standard][medium_parcel_20kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['standard']['medium_parcel_20kg_sc'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
 
 
        <!-- Add more fields for remaining Standard rates -->
    </tbody>
</table>

<h2>Royal Mail Signed For</h2>
<table class="form-table">
    <tbody>
        <tr><label>Signed for First Class</label><td><input type="number" name="postage_calculator[royal_mail][signed_for][letter_100g_fc]" value="<?php echo esc_attr($settings['royal_mail']['signed_for']['letter_100g_fc'] ?? '3.35'); ?>" step="0.01" min="0"></td></tr>
        <tr><label>Signed for Second Class</label><td><input type="number" name="postage_calculator[royal_mail][signed_for][letter_100g_sc]" value="<?php echo esc_attr($settings['royal_mail']['signed_for']['letter_100g_sc'] ?? '2.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 100g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][signed_for][large_letter_100g_fc]" value="<?php echo esc_attr($settings['royal_mail']['signed_for']['large_letter_100g_fc'] ?? '4.20'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 100g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][signed_for][large_letter_100g_sc]" value="<?php echo esc_attr($settings['royal_mail']['signed_for']['large_letter_100g_sc'] ?? '3.25'); ?>" step="0.01" min="0"></td></tr>
        <!-- Add more fields for remaining Signed For rates -->
    </tbody>
</table>

<h2>Royal Mail Guaranteed by 1PM</h2>
<table class="form-table">
    <tbody>
        
        <tr><th scope="row">100g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_100g_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_100g_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">100g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_100g_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_100g_1000'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">100g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_100g_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_100g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">500g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_500g_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_500g_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">500g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_500g_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_500g_1000'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">500g</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_500g_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_500g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">1kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_1kg_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_1kg_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">1kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_1kg_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_1kg_1000'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">1kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_1kg_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_750g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">2kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_2kg_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_2kg_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">2kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_2kg_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_2kg_1000'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">2kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_2kg_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_750g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">10kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_10kg_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_10kg_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">10kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_10kg_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_10kg_1000'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">10kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_10kg_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_750g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">20kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_20kg_750]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_20kg_750'] ?? '2.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">20kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_20kg_1000]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_20kg_1000'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">20kg</th><td><input type="number" name="postage_calculator[royal_mail][guaranteed_by_1pm][guaranteed_by_1pm_20kg_2500]" value="<?php echo esc_attr($settings['royal_mail']['guaranteed_by_1pm']['guaranteed_by_1pm_750g_2500'] ?? '1.55'); ?>" step="0.01" min="0"></td></tr>

 
        <!-- Add more fields for remaining Standard rates -->
    </tbody>
</table>


<h2>Royal Mail Tracked®</h2>
<table class="form-table">
    <tbody>
        <tr><th scope="row">Large Letter 750g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked][large_letter_750g_fc]" value="<?php echo esc_attr($settings['royal_mail']['tracked']['large_letter_750g_fc'] ?? '3.50'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 750g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked][large_letter_750g_sc]" value="<?php echo esc_attr($settings['royal_mail']['tracked']['large_letter_750g_sc'] ?? '2.70'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked][small_parcel_2kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['tracked']['small_parcel_2kg_fc'] ?? '4.25'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked][small_parcel_2kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['tracked']['small_parcel_2kg_sc'] ?? '3.39'); ?>" step="0.01" min="0"></td></tr>
        <!-- Add more fields for remaining Tracked® rates -->
    </tbody>
</table>

<h2>Royal Mail Tracked® with Signature</h2>
<table class="form-table">
    <tbody>
        <tr><th scope="row">Large Letter 750g - First Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_signature][large_letter_750g_fc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_signature']['large_letter_750g_fc'] ?? '5.20'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Large Letter 750g - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_signature][large_letter_750g_sc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_signature']['large_letter_750g_sc'] ?? '4.40'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_signature][small_parcel_2kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_signature']['small_parcel_2kg_fc'] ?? '5.65'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_signature][small_parcel_2kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_signature']['small_parcel_2kg_sc'] ?? '4.79'); ?>" step="0.01" min="0"></td></tr>
        <!-- Add more fields for remaining Tracked® with Signature rates -->
    </tbody>
</table>

<h2>Royal Mail Tracked® with Age Verification</h2>
<table class="form-table">
    <tbody>
        <tr><th scope="row">Small Parcel 2kg - First Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_age][small_parcel_2kg_fc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_age']['small_parcel_2kg_fc'] ?? '7.13'); ?>" step="0.01" min="0"></td></tr>
        <tr><th scope="row">Small Parcel 2kg - Second Class</th><td><input type="number" name="postage_calculator[royal_mail][tracked_age][small_parcel_2kg_sc]" value="<?php echo esc_attr($settings['royal_mail']['tracked_age']['small_parcel_2kg_sc'] ?? '6.27'); ?>" step="0.01" min="0"></td></tr>
        <!-- Add more fields for remaining Tracked® with Age Verification rates -->
    </tbody>
</table>


            <p class="submit">
                <input type="submit" class="button-primary" value="Save Changes">
            </p>
        </form>
    </div>
    <?php
}

/**
 * Register the custom shipping method
 */
add_action('woocommerce_shipping_init', function () {
    class WC_Postage_Calculator_Method extends WC_Shipping_Method
    {
        public function __construct()
        {
            $this->id = 'postage_calculator';
            $this->method_title = __('Postage Calculator', 'woocommerce');
            $this->method_description = __('Custom postage calculator based on weight and destination.', 'woocommerce');
            $this->enabled = 'yes';
            $this->title = __('Shipping', 'woocommerce');
            $this->init();
        }

        public function init()
        {
            $this->init_form_fields();
            $this->init_settings();
            add_action('woocommerce_update_options_shipping_' . $this->id, [$this, 'process_admin_options']);
        }

        public function calculate_shipping($package = [])
        {
            $settings = get_option('postage_calculator_settings', []);
            if (empty($settings['enabled'])) {
                return;
            }

            $total_weight = WC()->cart->get_cart_contents_weight();
            $country = $package['destination']['country'];
            $rates = [];

            // Check if the shipping address is UK (domestic)
            if ($country === 'GB') {
                // Royal Mail
                if (!empty($settings['royal_mail']['enabled'])) {
                    if ($total_weight <= 0.1 && !empty($settings['royal_mail']['first_class_letter_0.1'])) {
                        $rates[] = [
                            'label' => 'Royal Mail First Class Letter',
                            'cost'  => $settings['royal_mail']['first_class_letter_0.1'],
                        ];
                    } elseif ($total_weight <= 0.1 && !empty($settings['royal_mail']['first_class_large_letter_0.1'])) {
                        $rates[] = [
                            'label' => 'Royal Mail First Class Large Letter',
                            'cost'  => $settings['royal_mail']['first_class_large_letter_0.1'],
                        ];
                    }
					
                }

                // DPD
                if (!empty($settings['dpd']['enabled'])) {
                    if ($total_weight <= 1 && !empty($settings['dpd']['express_0_1'])) {
                        $rates[] = [
                            'label' => 'DPD Express',
                            'cost'  => $settings['dpd']['express_0_1'],
                        ];
                    } elseif ($total_weight <= 2 && !empty($settings['dpd']['express_1_2'])) {
                        $rates[] = [
                            'label' => 'DPD Express',
                            'cost'  => $settings['dpd']['express_1_2'],
                        ];
                    }
                }
            }

            // International rates for other countries
            if ($country !== 'GB' && !empty($settings['international']['enabled'])) {
                if ($total_weight <= 1 && !empty($settings['international']['zone_1_0_1'])) {
                    $rates[] = [
                        'label' => 'International Zone 1 (0-1kg)',
                        'cost'  => $settings['international']['zone_1_0_1'],
                    ];
                } elseif ($total_weight <= 2 && !empty($settings['international']['zone_1_1_2'])) {
                    $rates[] = [
                        'label' => 'International Zone 1 (1-2kg)',
                        'cost'  => $settings['international']['zone_1_1_2'],
                    ];
                }
            }

            // Add valid rates to WooCommerce
            foreach ($rates as $rate) {
                $this->add_rate([
                    'id'    => sanitize_title($rate['label']),
                    'label' => $rate['label'],
                    'cost'  => $rate['cost'],
                ]);
            }
        }
    }
});

/**
 * Add the custom shipping method to WooCommerce
 */
add_filter('woocommerce_shipping_methods', function ($methods) {
    $methods['postage_calculator'] = 'WC_Postage_Calculator_Method';
    return $methods;
});
