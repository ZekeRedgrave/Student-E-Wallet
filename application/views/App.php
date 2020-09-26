<div id="App" class="position-fixed hide" style="top: 0px; bottom: 0px; left: 0px; right: 0px; width: 100%; height: 100%">
	<div class="d-flex flex-row" style="width: 100%; height: 100%">
		<!-- Sidebar -->
		<div id="App_SidebarArea"></div>
		<!-- End of Sidebar -->
		<!-- Container Area -->
		<div id="App_ContainerArea" style="width: 100%; height: 100%"></div>
		<!-- End of Container Area -->
	</div>
</div>

<div id="App_StartingArea" class="position-fixed" style="top: 0px; bottom: 0px; left: 0px; right: 0px">
	<div class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">
		<div class="border-0" style="width: 350px">
			<div class="progress form-control hide" style="background-color: white; width: 100%; height: 25px;">
			 	<div id="App_Progressbar" class="progress-bar" style="width:70%;"></div>
			</div>
			<h4 id="App_ProgressbarText" class="mt-2 ml-2" style="font-weight: bold;">
				Loading
			</h4>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$("title").text("E-Student Wallet Access - Loading....")

		$("#App_SidebarArea").load(window.location + "/LoadView?Load=views&Name=sidebar", function() {
			var DownloadBlob = ["dashboard", "records", "admin"]

			for (var i = 0; i < DownloadBlob.length; i++) {
				$.get(window.location +"/LoadView?Load=views&Name="+ DownloadBlob[i], function(data) {
					$("#App_ContainerArea").append(data)
				})
			}

			$("#App_ContainerArea").load(AppLoader())
		})
	})

	function AppLoader() {
		$(document).ready(function() {
			$("#App_StartingArea").addClass('hide')
			$("#App").removeClass('hide')
		})
	}

</script>