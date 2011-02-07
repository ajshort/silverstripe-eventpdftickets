<html>
	<head>
		<% base_tag %>
		<% require css(eventmanagement-pdftickets/css/EventPdfTicket.css) %>
	</head>
	<body>
		<% control Tickets %>
			<div class="ticket">
				<div class="ticket-header">
					<h2>$Title for $Top.EventTitle</h2>
					<p class="datetime">$Top.Time.Summary</p>
				</div>
				<dl>
					<dt>Name:</dt>
					<dd>$Top.Name ($Top.Email)</dd>
					<dt>Type:</dt>
					<dd>$Title</dd>
					<dt>Quantity:</dt>
					<dd>$Quantity</dd>
					<dt>Order Info:</dt>
					<dd>Registration #$Top.ID, Ordered at $Top.Created.Nice</dd>
				</dl>
			</div>
		<% end_control %>
	</body>
</html>