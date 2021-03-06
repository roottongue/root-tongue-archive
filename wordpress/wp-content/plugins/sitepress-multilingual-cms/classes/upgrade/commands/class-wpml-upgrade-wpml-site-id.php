<?php

/**
 * Upgrades the former option to the new one.
 */
class WPML_Upgrade_WPML_Site_ID implements IWPML_Upgrade_Command {

	/**
	 * Runs the upgrade process.
	 *
	 * @return bool
	 */
	public function run() {
		if ( $this->old_option_exists() ) {
			$site_id = new WPML_Site_ID();

			$site_id->get_site_id( WPML_Site_ID::SITE_SCOPES_GLOBAL );

			return delete_option( WPML_Site_ID::SITE_ID_KEY );
		}

		return true;
	}

	/**
	 * Checks has the old option.
	 *
	 * @return bool
	 */
	protected function old_option_exists() {
		get_option( WPML_Site_ID::SITE_ID_KEY, null );
		$notoptions = wp_cache_get( 'notoptions', 'options' );

		return $notoptions && ( ! array_key_exists( WPML_Site_ID::SITE_ID_KEY, $notoptions ) );
	}

	/**
	 * Runs in admin pages.
	 *
	 * @return bool
	 */
	public function run_admin() {
		return $this->run();
	}

	/**
	 * Unused.
	 *
	 * @return null
	 */
	public function run_ajax() {
		return null;
	}

	/**
	 * Unused.
	 *
	 * @return null
	 */
	public function run_frontend() {
		return null;
	}

	/**
	 * Unused.
	 *
	 * @return null
	 */
	public function get_results() {
		return null;
	}
}
