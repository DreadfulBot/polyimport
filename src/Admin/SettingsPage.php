<?php

namespace Riskyworks\Polyimport\Admin;

class SettingsPage
{
	public function __construct()
	{
		add_action('admin_menu', [$this, 'add_admin_menu']);
	}

	public function add_admin_menu(): void
	{
		add_options_page(
			__('Polyimport', 'polyimport'),
			__('Polyimport', 'polyimport'),
			'polyimport',
			'pi',
			[$this, 'render_settings_page']
		);
	}

	public function render_settings_page(): void
	{
?>
		<div class="wrap">
			<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
				<input type="hidden" name="action" value="pi_set_product_language" />
				<button type='submit' class="button button-primary" id="link-products-to-languages">Link products to languages</button>
			</form>
		</div>
<?php
	}
}
