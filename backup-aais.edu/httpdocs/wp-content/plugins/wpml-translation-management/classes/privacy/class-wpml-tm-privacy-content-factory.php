<?php

/**
 * @author OnTheGo Systems
 */
class WPML_TM_Privacy_Content_Factory implements IWPML_Backend_Action_Loader {

	/**
	 * @return IWPML_Action
	 */
	public function create() {
		return new WPML_TM_Privacy_Content();
	}
}