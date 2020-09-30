<div class="d-flex flex-column border-right p-1" style="height: 100%">
	<!-- Logo Area -->
	<!-- End of Logo Area -->
	<!-- Menu List Area -->
	<button id="App_HomeButton" class="material-icons form-control mb-1" title="Home">home</button>
	<button id="App_RecordsButton" class="material-icons form-control mb-1" title="Records">receipt_long</button>
	<div style="height: 100%"></div>
	<button id="App_PaymentButton" class="material-icons form-control mb-1" title="Payment">receipt_long</button>
	<button id="App_TimelineButton" class="material-icons form-control" title="News & Announcement">timeline</button>
	<!-- End of Menu List Area -->
	<div style="height: 100%"></div>
	<button class="material-icons form-control mb-1" title="Z. Redgrave ID#1234567890" style="background: center no-repeat url('http://localhost/Ewallet/avatar.png'); background-size: 80% auto; min-height: 40px;"></button>
	<button id="App_LogoutButton" class="material-icons form-control" title="Logout">logout</button>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#App_HomeButton").click(function() {
			$("#App_HomeArea").removeClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Home")
		})
		$("#App_RecordsButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").removeClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Records")
		})
		$("#App_PaymentButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_PaymentArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Generate Store")
		})
		$("#App_TimelineButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - News and Announcement")
		})

		$("#App_LogoutButton").click(function() {
			$("#root").load(window.location+ "/LoadView?Load=views&Name=login")
		})
	})
</script>