<div class="d-flex flex-column border-right p-1" style="height: 100%">
	<!-- Logo Area -->
	<!-- End of Logo Area -->
	<!-- Menu List Area -->
	<!-- <div style="height: 100%"></div> -->
	<?php 
		switch (strtoupper($AccountType)) {
			case "STUDENT":
				echo '<button id="App_HomeButton" class="material-icons form-control mb-1" title="Home">home</button>';
				echo '<button id="App_RecordsButton" class="material-icons form-control mb-1" title="Records">receipt_long</button>';
				break;
			case "CASHIER":
				echo '<button id="App_PaymentButton" class="material-icons form-control mb-1" title="Payment">receipt_long</button>';
				echo '<button id="App_BankButton" class="material-icons form-control mb-1" title="Payment">account_balance</button>';
				break;

			case "DEPARTMENT":
				echo '<button id="App_TimelineButton" class="material-icons form-control mb-1" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons form-control mb-1" title="Account">how_to_reg</button>';
				echo '<button id="App_PaymentButton" class="material-icons form-control mb-1" title="Payment">receipt_long</button>';
				break;

			case "ADMIN":
				echo '<button id="App_TimelineButton" class="material-icons form-control mb-1" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons form-control mb-1" title="Account">how_to_reg</button>';
				echo '<button id="App_PaymentButton" class="material-icons form-control mb-1" title="Payment">receipt_long</button>';
				break;
			
			default:
				// code...
				break;
		}
	?>
	<!-- End of Menu List Area -->
	<div style="height: 100%"></div>
	
	<button id="App_SettingButton" class="material-icons form-control" title="Logout">settings</button>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#App_HomeButton").click(function() {
			$("#App_HomeArea").removeClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Home")
		})
		$("#App_RecordsButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").removeClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Records")
		})
		$("#App_PaymentButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_PaymentArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Generate Store")
		})
		$("#App_TimelineButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_TimelineArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - News and Announcement")
		})
		$("#App_AccountButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_AccountArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Account")
		})
		$("#App_BankButton").click(function(event) {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Bank")
		})

		$("#App_SettingButton").click(function() {
			$("#App_SettingArea").removeClass('hide')
			$("#App").addClass('hide')
		})
	})
</script>