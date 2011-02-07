<?php
/**
 * A simple ticket renderer which generates plain a plain PDF file containing
 * the registration tickets.
 *
 * @package silverstripe-eventmanagement-pdftickets
 */
class EventRegistrationPdfTicketGenerator implements EventRegistrationTicketGenerator {

	public static $template = 'EventPdfTicket';

	public function getGeneratorTitle() {
		return 'PDF Ticket Generator';
	}

	public function getTicketFilenameFor(EventRegistration $registration) {
		return "event-tickets-{$registration->TimeID}-{$registration->ID}.pdf";
	}

	public function getTicketMimeTypeFor(EventRegistration $registration) {
		return 'application/pdf';
	}

	public function generateTicketFileFor(EventRegistration $registration) {
		Requirements::clear();

		$viewer = new SSViewer(self::$template);
		$input  = $viewer->process($registration);
		$path   = singleton('PDFRenditionService')->render($input);

		Requirements::restore();
		return $path;
	}

}