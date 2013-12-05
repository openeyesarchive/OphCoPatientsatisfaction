<?php

class m131205_132920_table_versioning extends CDbMigration
{
	public function up()
	{
		$this->execute("
CREATE TABLE `et_ophcopatientsatisfaction_satisfaction_version` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` int(10) unsigned NOT NULL,
  `pleased_with_result` int(10) NOT NULL DEFAULT '1',
  `helped_daily_life` int(10) NOT NULL DEFAULT '1',
  `impression` text COLLATE utf8_bin,
  `complications` text COLLATE utf8_bin,
  `plan` text COLLATE utf8_bin,
  `charged` tinyint(1) unsigned NOT NULL,
  `discharged` tinyint(1) unsigned NOT NULL,
  `discharge_acknowledged` tinyint(1) unsigned NOT NULL,
  `chart_complete` tinyint(1) unsigned NOT NULL,
  `orbis_ophthalmologist_id` int(10) unsigned NOT NULL,
  `local_ophthalmologist_id` int(10) unsigned NOT NULL,
  `last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `last_modified_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT '1901-01-01 00:00:00',
  PRIMARY KEY (`id`),
  KEY `acv_et_ophcopatientsatisfaction_satisfaction_lmui_fk` (`last_modified_user_id`),
  KEY `acv_et_ophcopatientsatisfaction_satisfaction_cui_fk` (`created_user_id`),
  KEY `acv_et_ophcopatientsatisfaction_satisfaction_ev_fk` (`event_id`),
  KEY `acv_et_ophcopatientsatisfaction_satisfaction_ooi_fk` (`orbis_ophthalmologist_id`),
  KEY `acv_et_ophcopatientsatisfaction_satisfaction_loi_fk` (`local_ophthalmologist_id`),
  CONSTRAINT `acv_et_ophcopatientsatisfaction_satisfaction_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcopatientsatisfaction_satisfaction_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcopatientsatisfaction_satisfaction_ev_fk` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  CONSTRAINT `acv_et_ophcopatientsatisfaction_satisfaction_ooi_fk` FOREIGN KEY (`orbis_ophthalmologist_id`) REFERENCES `user` (`id`),
  CONSTRAINT `acv_et_ophcopatientsatisfaction_satisfaction_loi_fk` FOREIGN KEY (`local_ophthalmologist_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin
		");

		$this->alterColumn('et_ophcopatientsatisfaction_satisfaction_version','id','int(10) unsigned NOT NULL');
		$this->dropPrimaryKey('id','et_ophcopatientsatisfaction_satisfaction_version');

		$this->createIndex('et_ophcopatientsatisfaction_satisfaction_aid_fk','et_ophcopatientsatisfaction_satisfaction_version','id');
		$this->addForeignKey('et_ophcopatientsatisfaction_satisfaction_aid_fk','et_ophcopatientsatisfaction_satisfaction_version','id','et_ophcopatientsatisfaction_satisfaction','id');

		$this->addColumn('et_ophcopatientsatisfaction_satisfaction_version','version_date',"datetime not null default '1900-01-01 00:00:00'");

		$this->addColumn('et_ophcopatientsatisfaction_satisfaction_version','version_id','int(10) unsigned NOT NULL');
		$this->addPrimaryKey('version_id','et_ophcopatientsatisfaction_satisfaction_version','version_id');
		$this->alterColumn('et_ophcopatientsatisfaction_satisfaction_version','version_id','int(10) unsigned NOT NULL AUTO_INCREMENT');
	}

	public function down()
	{
		$this->dropTable('et_ophcopatientsatisfaction_satisfaction_version');
	}
}
