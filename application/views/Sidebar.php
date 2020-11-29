<div class="d-flex flex-column p-1" style="background: #1e2124; height: 100%">
	<!-- Logo Area -->
	<!-- End of Logo Area -->
	<!-- Menu List Area -->
	<!-- <div style="height: 100%"></div> -->
	<!-- <button id="App_HomeButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #4caf50; min-width: 50px; max-width: 50px; height: 50px;" title="Home">home</button> -->
	<?php 
		switch (strtoupper($AccountType)) {
			case "STUDENT":
				echo '<button id="App_HomeButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; max-width: 50px; min-height: 50px; max-height: 50px;" title="Home">home</button>';
				echo '<button id="App_RecordsButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Records">receipt_long</button>';
				break;
			case "CASHIER":
				echo '<button id="App_PaymentButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Payment">receipt_long</button>';
				echo '<button id="App_BankButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Transaction & Bank">account_balance</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Account">how_to_reg</button>';
				break;

			case "DEPARTMENT":
				echo '<button id="App_TimelineButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Account">how_to_reg</button>';
				echo '<button id="App_PaymentButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Payment">receipt_long</button>';
				break;

			case "ADMIN":
				echo '<button id="App_TimelineButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Account">how_to_reg</button>';
				echo '<button id="App_PaymentButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Payment">receipt_long</button>';
				break;
			
			default:
				// code...
				break;
		}
	?>
	<!-- End of Menu List Area -->
	<div style="height: 100%"></div>
	
	<button id="App_SettingButton" class="material-icons border-0 rounded" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Logout">settings</button>
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