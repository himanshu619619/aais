<?php

/**
 * @author OnTheGo Systems
 */
class WPML_ST_Privacy_Content_Factory implements IWPML_Backend_Action_Loader {

	/**
	 * @return IWPML_Action
	 */
	public function create() {
		return new WPML_ST_Privacy_Content();
	}
}