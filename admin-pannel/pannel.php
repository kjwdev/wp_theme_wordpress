<?php
if(is_admin()){
	wp_enqueue_script('uploader', get_template_directory_uri() .'/js/uploader.js');
}
add_action('admin_menu', 'my_pannel');

function my_pannel()
{
	add_menu_page('Kjw thème', 'Kjw thème', 'activate_plugins', 'my-pannel', 'render_pannel', null, 81);
	add_submenu_page('my-pannel','Réseaux sociaux', 'Réseaux Sociaux', 'activate_plugins', 'my-sub-pannel-01', 'render_pannel');
}

function render_pannel()
{
	wp_enqueue_media();

	if(isset($_POST['send_reseaux'])){
		if(!wp_verify_nonce($_POST['reseaux_noncename'], 'reseaux-pannel')){
			die('token non valide');
		}
		foreach($_POST[opt] as $id=>$value){
			if(empty($value)){
				delete_option($id);
			}else{
				update_option($id, $value);
			}
		}
		?>
		<div id="message" class="updated fade">
			<p>Options sauvegardées avec succès.</p>
		</div>
		<?php
	}
	?>
	<div class="wrap theme-options-page">
		<h2>Kjw thème</h2>
		<form action="" method="post">
			<div class="theme-options-group">
				<table cellspacing="0" class="widefat options-table">
					<thead>
						<tr>
							<th colspan="2">Logo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><label for="logoSite">Logo</label></th>
							<td>
								<input type="text" id="logoSite" name="opt[logoSite]" value="<?= get_option('logoSite', '')?>" size="65" />
								<a href="#" class="button" id="uploader">Choisir une image</a>
								<img src="<?= get_option('logoSite', '')?>" title="image select" width="250">
							</td>
						</tr>
					</tbody>
				</table>
				<table cellspacing="0" class="widefat options-table">
					<thead>
						<tr>
							<th colspan="2">Mes Réseaux Sociaux</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th scope="row"><label for="twitter">Twitter</label></th>
							<td><input type="text" id="twitter" name="opt[twitter]" value="<?= get_option('twitter', 'Saisir le nom de votre compte Twitter')?>" size="75" /></td>
						</tr>
						<tr>
							<th scope="row"><label for="facebook">Facebook</label></th>
							<td><input type="text" id="facebook" name="opt[facebook]" value="<?= get_option('facebook', 'Saisir le nom de votre compte Facebook')?>" size="75" /></td>
						</tr>
					</tbody>
				</table>
			</div>
			<input type="hidden" name="reseaux_noncename" value="<?= wp_create_nonce('reseaux-pannel');?>" />
			<p>
				<input type="submit" name="send_reseaux" class="button-primary autowidth" value="Sauvegarder" />
			</p>
		</form>
	</div>
	<?php
}