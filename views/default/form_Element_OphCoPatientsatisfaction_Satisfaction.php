<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id?>"
	data-element-type-class="<?php echo $element->elementType->class_name?>"
	data-element-type-name="<?php echo $element->elementType->name?>"
	data-element-display-order="<?php echo $element->elementType->display_order?>">
	<h4 class="elementTypeName"><?php echo $element->elementType->name; ?></h4>

	<div class="eventDetail">
		<div class="label"></div>
		<div class="data" style="font-size: 15px;">
			How pleased are you with your eye surgery result?<br/>
			(1 = Very unsatisfied, 5 = Very satisfied)
		</div>
	</div>

	<?php echo $form->slider($element, 'pleased_with_result', array('min' => 1, 'max' => 5, 'step' => 1,'nolabel'=>true))?>

	<div class="eventDetail">
		<div class="label"></div>
		<div class="data" style="font-size: 15px;">
			Has your surgery helped you in your daily life?
		</div>
	</div>

	<?php echo $form->slider($element, 'helped_daily_life', array('min' => 1, 'max' => 5, 'step' => 1,'nolabel'=>true))?>
	<?php echo $form->textArea($element, 'impression', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'complications', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'plan', array('rows' => 4, 'cols' => 80))?>
	<?php echo $form->checkBox($element, 'charged', array('text-align'=>'right'))?>
	<?php echo $form->checkBox($element, 'discharged', array('text-align'=>'right'))?>
	<?php echo $form->checkBox($element, 'discharge_acknowledged', array('text-align'=>'right'))?>
	<?php echo $form->checkBox($element, 'chart_complete', array('text-align'=>'right'))?>
	<?php echo $form->dropDownList($element, 'orbis_ophthalmologist_id', CHtml::listData(User::model()->activeOrPk($element->orbis_ophthalmologist_id)->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'local_ophthalmologist_id', CHtml::listData(User::model()->activeOrPk($element->local_ophthalmologist_id)->findAll(array('order'=> 'first_name asc, last_name asc')),'id','fullName'),array('empty'=>'- Please select -'))?>
</div>
