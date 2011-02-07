<?php
/**
 * @package silverstripe-eventmanagement-pdftickets
 */

if (!class_exists('PDFRenditionService')) {
	throw new Exception('The Event Management PDF Ticket Generator requires the PDF renditions module');
}