<?php
/**
 * A simple ticket renderer which generates a plain PDF file containing the
 * registration tickets.
 *
 * @package silverstripe-eventpdftickets
 */
class EventRegistrationPdfTicketGenerator implements EventRegistrationTicketGenerator {

	public static $template  = 'EventPdfTicket';
	public static $cache_dir = 'event-pdf-tickets';

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
		$cacheDir  = TEMP_FOLDER . '/' . self::$cache_dir;
		$cacheName = $this->getTicketFilenameFor($registration);
		$cachePath = "$cacheDir/$cacheName";

		if (!is_dir($cacheDir)) {
			@mkdir($cacheDir);
		}

		if (!file_exists($cachePath)) {
			Requirements::clear();

			$viewer = new SSViewer(self::$template);
			$input  = $viewer->process($registration);

			$resultPath = singleton('PDFRenditionService')->render($input);
			rename($resultPath, $cachePath);

			Requirements::restore();
		}

		return $cachePath;
	}

}