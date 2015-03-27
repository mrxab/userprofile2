<?php
class up2FieldsUpdateProcessor extends modObjectUpdateProcessor {
	public $classKey = 'up2Fields';
	public $languageTopics = array('userprofile2');
	public $permission = 'up2setting_save';

	/** {@inheritDoc} */
	public function initialize() {
		if (!$this->modx->hasPermission($this->permission)) {
			return $this->modx->lexicon('access_denied');
		}

		return parent::initialize();
	}
	/** {@inheritDoc} */
	public function beforeSet() {
		if ($this->modx->getObject('up2Fields',array('name_out' => $this->getProperty('name_out'), 'id:!=' => $this->getProperty('id') ))) {
			$this->modx->error->addField('name_out', $this->modx->lexicon('vp_err_ae'));
		}

		return parent::beforeSet();
	}

}
return 'up2FieldsUpdateProcessor';