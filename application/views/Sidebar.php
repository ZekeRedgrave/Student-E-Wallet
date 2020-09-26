<div class="d-flex flex-column border-right p-1" style="height: 100%">
	<!-- Logo Area -->
	<!-- End of Logo Area -->
	<!-- Menu List Area -->
	<button id="App_HomeButton" class="material-icons form-control mb-1" title="Home">home</button>
	<button id="App_RecordsButton" class="material-icons form-control mb-1" title="Records">receipt_long</button>
	<button id="App_AdminButton" class="material-icons form-control" title="Admin">admin_panel_settings</button>
	<!-- End of Menu List Area -->
	<div style="height: 100%"></div>
	<button class="material-icons form-control mb-1" title="Z. Redgrave ID#1234567890" style="background: center no-repeat url('http://localhost/Ewallet/avatar.png'); background-size: 80% auto; min-height: 40px;"></button>
	<button id="App_LogoutButton" class="material-icons form-control" title="Logout">logout</button>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("#App_HomeButton").click(function() {
			$("#App_DashboardArea").removeClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_AdminArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Home")
		})
		$("#App_RecordsButton").click(function() {
			$("#App_DashboardArea").addClass('hide')
			$("#App_RecordsArea").removeClass('hide')
			$("#App_AdminArea").addClass('hide')

			$("title").text("E-Student Wallet Access - Records")
		})
		$("#App_AdminButton").click(function() {
			$("#App_DashboardArea").addClass('hide')
			$("#App_RecordsArea").addClass('hide')
			$("#App_AdminArea").removeClass('hide')

			$("title").text("E-Student Wallet Access - Admin")
		})

		$("#App_LogoutButton").click(function() {
			$("#root").load(window.location+ "/LoadView?Load=views&Name=login")
		})
	})
</script>