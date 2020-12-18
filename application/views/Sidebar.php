<div class="d-flex flex-column p-1 companyBackground shadow" style="height: 100%">
	<!-- Logo Area -->
	<!-- End of Logo Area -->
	<!-- Menu List Area -->
	<!-- <div style="height: 100%"></div> -->
	<!-- <button id="App_HomeButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #4caf50; min-width: 50px; max-width: 50px; height: 50px;" title="Home">home</button> -->
	<?php 
		switch (strtoupper($AccountType)) {
			case "STUDENT":
				echo '<button id="App_HomeButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; max-width: 50px; min-height: 50px; max-height: 50px;" title="Home">home</button>';
				echo '<button id="App_RecordsButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Transaction Records">receipt_long</button>';
				break;
			case "CASHIER":
				echo '<button id="App_PaymentButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Payment / Store">receipt_long</button>';
				echo '<button id="App_BankButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Transaction Records & Bank">account_balance</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Student Account">account_circle</button>';
				break;

			case "DEPARTMENT":
				echo '<button id="App_PaymentButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Payment / Store">receipt_long</button>';
				echo '<button id="App_BankButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Transaction Records & Bank">account_balance</button>';
				echo '<button id="App_TimelineButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Student Account">account_circle</button>';
				break;

			case "ADMIN":
				echo '<button id="App_TimelineButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="News & Announcement">timeline</button>';
				echo '<button id="App_AccountButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Student Account">account_circle</button>';
				echo '<button id="App_EmployeeButton" class="material-icons border-0 rounded mb-1" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Employee Account">supervised_user_circle</button>';
				break;
			
			default:
				// code...
				break;
		}
	?>
	<div class="ml-2 mr-2" style="border: 1px solid #ffffff;"></div>
	<!-- End of Menu List Area -->
	<div style="min-height: 100px; height: 100%;"></div>

	<div class="mb-1 ml-2 mr-2" style="border: 1px solid #ffffff;"></div>
	<div class="companyBackground" style="width: 100%">
		<button id="App_SettingButton" class="material-icons border-0 rounded" style="background: #36393e; color: #2ad444; min-width: 50px; min-height: 50px; max-height: 50px;" title="Settings">settings</button>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('[title]').tooltip()
		
		$("#App_HomeButton").click(function() {
			$("#App_HomeArea").removeClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Home")
		})
		$("#App_RecordsButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").removeClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Transaction Records")
		})
		$("#App_PaymentButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_PaymentArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Create Payments")
		})
		$("#App_TimelineButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_TimelineArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - News and Announcement")
		})
		$("#App_AccountButton").click(function() {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_AccountArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Student Account")
		})
		$("#App_BankButton").click(function(event) {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_EmployeeArea").addClass('hide')
			$("#App_BankArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Bank")
		})
		$("#App_EmployeeButton").click(function(event) {
			$("#App_HomeArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_PaymentArea").addClass('hide')
			$("#App_TimelineArea").addClass('hide')
			$("#App_AccountArea").addClass('hide')
			$("#App_BankArea").addClass('hide')
			$("#App_EmployeeArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Employee Account")
		})

		$("#App_SettingButton").click(function() {
			$("#App_SettingArea").removeClass('hide')
			$("#App").addClass('hide')
		})
	})
</script>