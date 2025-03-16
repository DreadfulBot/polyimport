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
			__('PI Admin View', 'polyimport'),
			__('Polyimport', 'polyimport'),
			'manage_options',
			'pi',
			[$this, 'render_settings_page']
		);
	}

	public function render_settings_page(): void
	{
?>
		<div class="wrap">
			<h1>Polyimport</h1>

			<table>
				<tbody>
					<tr>
						<td>
							<h2>Link products to languages</h2>
						</td>
						<td>
							<form method="post" action="<?php echo admin_url('admin-post.php'); ?>">
								<input type="hidden" name="action" value="pi_set_product_language" />
								<input type="hidden" name="callback_url" value="<?= esc_url(menu_page_url('pi', false)) ?>" />
								<button type='submit' class="button button-primary" id="link-products-to-languages">Link products to languages</button>
							</form>
						</td>

					</tr>
				</tbody>

			</table>
		</div>
<?php
	}
}
