<?php

class m131206_150646_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophcopatientsatisfaction_satisfaction','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophcopatientsatisfaction_satisfaction_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophcopatientsatisfaction_satisfaction','deleted');
		$this->dropColumn('et_ophcopatientsatisfaction_satisfaction_version','deleted');
	}
}
