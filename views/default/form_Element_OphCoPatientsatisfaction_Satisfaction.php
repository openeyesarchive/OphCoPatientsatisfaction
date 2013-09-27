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

	<?php echo $form->slider($element, 'pleased_with_result', array('min' => 1, 'max' => 5, 'step' => 1))?>
	<?php echo $form->slider($element, 'helped_daily_life', array('min' => 1, 'max' => 5, 'step' => 1))?>
	<?php echo $form->textArea($element, 'impression', array('rows' => 6, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'complications', array('rows' => 6, 'cols' => 80))?>
	<?php echo $form->textArea($element, 'plan', array('rows' => 6, 'cols' => 80))?>
	<?php echo $form->checkBox($element, 'charged')?>
	<?php echo $form->checkBox($element, 'discharged')?>
	<?php echo $form->checkBox($element, 'discharge_acknowledged')?>
	<?php echo $form->checkBox($element, 'chart_complete')?>
	<?php echo $form->dropDownList($element, 'orbis_ophthalmologist_id', CHtml::listData(User::model()->findAll(array('order'=> 'username asc')),'id','username'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'local_ophthalmologist_id', CHtml::listData(User::model()->findAll(array('order'=> 'username asc')),'id','username'),array('empty'=>'- Please select -'))?>
</div>
