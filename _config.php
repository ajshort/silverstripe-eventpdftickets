<?php
/**
 * @package silverstripe-eventpdftickets
 */

if (!class_exists('PDFRenditionService')) {
	throw new Exception('The Event PDF Ticket module requires the PDF renditions module');
}