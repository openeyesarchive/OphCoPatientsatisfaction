<?php 
class m130927_124343_event_type_OphCoPatientsatisfaction extends CDbMigration
{
	public function up()
	{
		if (!$this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoPatientsatisfaction'))->queryRow()) {
			$group = $this->dbConnection->createCommand()->select('id')->from('event_group')->where('name=:name',array(':name'=>'Communication events'))->queryRow();
			$this->insert('event_type', array('class_name' => 'OphCoPatientsatisfaction', 'name' => 'Patient satisfaction','event_group_id' => $group['id']));
		}

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoPatientsatisfaction'))->queryRow();

		if (!$this->dbConnection->createCommand()->select('id')->from('element_type')->where('name=:name and event_type_id=:eventTypeId', array(':name'=>'Satisfaction',':eventTypeId'=>$event_type['id']))->queryRow()) {
			$this->insert('element_type', array('name' => 'Satisfaction','class_name' => 'Element_OphCoPatientsatisfaction_Satisfaction', 'event_type_id' => $event_type['id'], 'display_order' => 1));
		}

		$element_type = $this->dbConnection->createCommand()->select('id')->from('element_type')->where('event_type_id=:eventTypeId and name=:name', array(':eventTypeId'=>$event_type['id'],':name'=>'Satisfaction'))->queryRow();

		$this->createTable('et_ophcopatientsatisfaction_satisfaction', array(
				'id' => 'int(10) unsigned NOT NULL AUTO_INCREMENT',
				'event_id' => 'int(10) unsigned NOT NULL',
				'pleased_with_result' => 'int(10) NOT NULL DEFAULT 1',
				'helped_daily_life' => 'int(10) NOT NULL DEFAULT 1',
				'impression' => 'text DEFAULT \'\'',
				'complications' => 'text DEFAULT \'\'',
				'plan' => 'text DEFAULT \'\'',
				'charged' => 'tinyint(1) unsigned NOT NULL',
				'discharged' => 'tinyint(1) unsigned NOT NULL',
				'discharge_acknowledged' => 'tinyint(1) unsigned NOT NULL',
				'chart_complete' => 'tinyint(1) unsigned NOT NULL',
				'orbis_ophthalmologist_id' => 'int(10) unsigned NOT NULL',
				'local_ophthalmologist_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT 1',
				'created_date' => 'datetime NOT NULL DEFAULT \'1901-01-01 00:00:00\'',
				'PRIMARY KEY (`id`)',
				'KEY `et_ophcopatientsatisfaction_satisfaction_lmui_fk` (`last_modified_user_id`)',
				'KEY `et_ophcopatientsatisfaction_satisfaction_cui_fk` (`created_user_id`)',
				'KEY `et_ophcopatientsatisfaction_satisfaction_ev_fk` (`event_id`)',
				'KEY `et_ophcopatientsatisfaction_satisfaction_ooi_fk` (`orbis_ophthalmologist_id`)',
				'KEY `et_ophcopatientsatisfaction_satisfaction_loi_fk` (`local_ophthalmologist_id`)',
				'CONSTRAINT `et_ophcopatientsatisfaction_satisfaction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcopatientsatisfaction_satisfaction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcopatientsatisfaction_satisfaction_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`)',
				'CONSTRAINT `et_ophcopatientsatisfaction_satisfaction_ooi_fk` FOREIGN KEY (`orbis_ophthalmologist_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophcopatientsatisfaction_satisfaction_loi_fk` FOREIGN KEY (`local_ophthalmologist_id`) REFERENCES `user` (`id`)',
			), 'ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
	}

	public function down()
	{
		$this->dropTable('et_ophcopatientsatisfaction_satisfaction');

		$event_type = $this->dbConnection->createCommand()->select('id')->from('event_type')->where('class_name=:class_name', array(':class_name'=>'OphCoPatientsatisfaction'))->queryRow();

		foreach ($this->dbConnection->createCommand()->select('id')->from('event')->where('event_type_id=:event_type_id', array(':event_type_id'=>$event_type['id']))->queryAll() as $row) {
			$this->delete('audit', 'event_id='.$row['id']);
			$this->delete('event', 'id='.$row['id']);
		}

		$this->delete('element_type', 'event_type_id='.$event_type['id']);
		$this->delete('event_type', 'id='.$event_type['id']);
	}
}
