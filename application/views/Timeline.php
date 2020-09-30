<div id="App_TimelineArea" class="d-flex flex-row" style="width:100%; height: 100%">
	<div class="p-3" style="width: 100%; overflow: hidden; overflow-y: scroll;">
		<h4 class="mb-4">News & Announcement</h4>
		<!-- Write Timeline -->
		<div class="d-flex flex-column mb-4" style="width: 100%;">
			<h4 style="margin: 0; font-size: 12px; font-weight: bold;">Write a post</h4>
			<textarea id="TimelineCreate_Descriptionbox" class="form-control" style="width: 100%; height: 150px; resize: none;"></textarea>
			<!-- Upload Image Display -->
			<div id="TimelineCreate_ImageLoader" class="row mt-1 ml-0 mr-0 mb-0">
				<!-- <div id="TimelineCreate_ImageID" class="d-flex justify-content-end border rounded mr-1 mb-1" style="background: center no-repeat url('http://localhost/ewallet/storage/0.jpg'); background-size: 50px 50px; width: 50px; height: 50px;">
					<button onclick="new Timeline().TimelineCreate_DeleteButton()" class="material-icons form-control border-0 m-0 p-0 rounded-circle mt-1 mr-1 red" title="Delete Button" style="width: 18px; color: white; height: 18px; font-size: 12px; font-weight: bold">delete</button>
				</div> -->
			</div>
			<!-- End of Upload Image Display -->
			<div class="d-flex flex-row mt-1">
				<button onclick="new Timeline().Create_UploadButton()" class="material-icons form-control mr-1 d-flex align-items-center justify-content-center" style="background-color: white; width: 50px; height: 45px;">add</button>
				<button onclick="new Timeline().Create_SendButton()" id="TimelineCreate_SendButton" class="material-icons form-control mr-1 d-flex align-items-center justify-content-center" style="background-color: white; width: 50px; height: 45px;">send</button>
				<div style="width: 100%"></div>
				<input id="TimelineCreate_FileUpload" type="file" class="hide" multiple="multiple">
			</div>

			<div class="progress white p-0 rounded-0 mt-1">
				<div id="TimelineCreate_Progressbar" class="red" style="width: 0%; height: 1px;"></div>
			</div>
		</div>
		<!-- End of Write Timeline -->
		<!-- View Timeline -->
		<h4 class="mt-5">Timeline</h4>
		<div id="TimelineView_LoaderArea">

			<div class="d-flex flex-row border p-2 mb-1" style="width: 100%">
				<img src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
				<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
					<h4 style="margin: 0; font-size: 18px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>
					<h4 style="margin: 0; font-size: 12px;">Date and Time : 2020-01-01 00:00:00</h4>

					<div class="mt-3 mb-3">
						<span>Add some Text Here!</span>
					</div>

					<img src="http://localhost/Ewallet/avatar.png" width="100%">

					<div class="d-flex flex-row mt-1">	
						<a class="material-icons mr-4 d-flex align-items-center justify-content-center">comment</a>
						<a class="material-icons mr-1 d-flex align-items-center justify-content-center">edit</a>
						<div style="width: 100%"></div>
						<a class="material-icons mr-1 d-flex align-items-center justify-content-center red-text">delete</a>
					</div>
				</div>
			</div>

		</div>
		<!-- End of View Timeline -->
	</div>
	<div class="border-left" style="width: 300px;">
		
	</div>
</div>

<script type="text/javascript">
	var TimelineCreate_UploadForm = []

	function Timeline() {
		this.View_ItemLoad = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_ItemLoad?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						var DescriptionTemp = JSON.parse(data.TimelineDescription).Text.split("\n")
						var ImageTemp = JSON.parse(data.TimelineDescription).Image

						$("#TimelineView_ImageID"+ id).attr('src', 'http://localhost/Ewallet/avatar.png')
						$("#TimelineView_UsernameID"+ id).text("Zeke S. Redgrave [System Administrator]")
						$("#TimelineView_DateTimeID"+ id).text("Date and Time : "+ data.DateRegister +" "+ data.TimeRegister)

						DescriptionTemp.forEach(function(element, index) {
							if(DescriptionTemp[index] != "") $("#TimelineView_DescriptionID"+ id).append('<div style="word-break: break-all;">'+ DescriptionTemp[index] +'</div>')
							else $("#TimelineView_DescriptionID"+ id).append('<br />')
						})
						if(ImageTemp.length != 0) ImageTemp.forEach(function(element, index) {
							$("#TimelineView_LoaderID"+ id).append('<img src="'+ window.location.href.replace("/index.php/Access", "/storage/"+ ImageTemp[index]) +'" width="100%">')
						})
						
					}	
					else new Timeline().View_ItemLoad(id)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		new Timeline().View_ItemLoad(id)
				}
			})
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_DeleteButton?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) $("#TimelineView_ItemID"+ id).remove() 
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))
				}
			})
		}

		this.Create_UploadButton = function() {
			var TimelineCreate_FileUpload = $("#TimelineCreate_FileUpload")
			var TimelineCreate_Progressbar = $("#TimelineCreate_Progressbar")
			var TimelineCreate_ImageLoader = $("#TimelineCreate_ImageLoader")
			var TimelineCreate_SendButton = $("#TimelineCreate_SendButton")
			var UploadForm = new FormData()

			TimelineCreate_FileUpload.click().change(function(event) {
				if(TimelineCreate_FileUpload.prop("files").length != 0) {
					TimelineCreate_FileUpload.prop("files").forEach(function(element, index) {
						UploadForm.append('TimelineImage[]', TimelineCreate_FileUpload.prop("files")[index])
					})

					TimelineCreate_SendButton.addClass('hide')
					TimelineCreate_FileUpload.val('')

					$.ajax({
						url: window.location.href.replace("/Access", "")+ "/Timeline/Create_UploadButton", 
						method: 'POST',
						data: UploadForm,
						dataType: 'json',
						success: function(data) {
							if(!data.isError) {
								TimelineCreate_ImageLoader.html('')
								TimelineCreate_SendButton.removeClass('hide')
								TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', '0%')

								TimelineCreate_UploadForm = data.TimelineImage

								data.TimelineImage.forEach(function(element, index) {
									var HTML = `<div id="TimelineCreate_ImageID`+ index +`" class="d-flex justify-content-end border rounded mr-1 mb-1" style="background: center no-repeat url('http://localhost/ewallet/storage/`+ data.TimelineImage[index] +`'); background-size: 50px 50px; width: 50px; height: 50px;">
											<button onclick="new Timeline().TimelineCreate_DeleteButton(`+ index +`)" class="material-icons form-control border-0 m-0 p-0 rounded-circle mt-1 mr-1 red" title="Delete Button" style="width: 18px; color: white; height: 18px; font-size: 12px; font-weight: bold">delete</button>
										</div>`

									TimelineCreate_ImageLoader.append(HTML)
								})

								for(var key of UploadForm.keys()) UploadForm.delete(key)

								console.log(data)
							}
							else {
								alert(data.ErrorDisplay)

								TimelineCreate_SendButton.removeClass('hide')
								TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', '0%')

								for(var key of UploadForm.keys()) UploadForm.delete(key)
							}
						},
						error: function(ex) {
					 		console.log('Error: ' + JSON.stringify(ex, null, 2))

					 		TimelineCreate_SendButton.removeClass('hide')
						},
						beforeSend: function() {
							
						},
						xhr: function() {
							var xhr = new XMLHttpRequest()
					
							xhr.upload.addEventListener("progress", function(e){
								if(e.lengthComputable) {
									var current = e.loaded
									var total = e.total
									var progressBar = parseInt((current / total) * 100)

									console.log(progressBar)
					
									if(progressBar == 100) TimelineCreate_Progressbar.removeClass('red').addClass('green').css('width', '100%')
									else TimelineCreate_Progressbar.removeClass('green').addClass('red').css('width', progressBar+ '%') 
								}
							}, false)
					
							return xhr
						},
						contentType: false,
						cache: false,
						processData: false
					})
				}
				else {
					for(var key of UploadForm.keys()) UploadForm.delete(key)

					TimelineCreate_ImageLoader.html('')

					TimelineCreate_UploadForm = []
				}
			})
		}

		this.TimelineCreate_DeleteButton = function(i) {
			TimelineCreate_UploadForm[i] = ""

			$("#TimelineCreate_ImageID"+ i).remove()
		}

		this.Create_SendButton = function() {
			var TimelineCreate_Descriptionbox = $("#TimelineCreate_Descriptionbox")
			var TimelineCreate_SendButton = $("#TimelineCreate_SendButton")
			var TimelineCreate_ImageLoader = $("#TimelineCreate_ImageLoader")
			var TimelineView_LoaderArea = $("#TimelineView_LoaderArea")

			if(TimelineCreate_Descriptionbox.val() != "") {
				TimelineCreate_SendButton.addClass('hide')

				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Timeline/Create_SendButton", 
					method: 'POST',
					data: {
						Package: JSON.stringify({
								TimelineDescription: TimelineCreate_Descriptionbox.val(),
								TimelineImage: TimelineCreate_UploadForm
						})
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							var HTML = `
								<div onload="new Timeline().View_ItemLoad(`+ data.TimelineID +`)" id="TimelineView_ItemID`+ data.TimelineID +`" class="d-flex flex-row border p-2 mb-1" style="width: 100%">
									<img id="TimelineView_ImageID`+ data.TimelineID +`" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
										<h4 id="TimelineView_UsernameID`+ data.TimelineID +`" style="margin: 0; font-size: 18px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>
										<h4 id="TimelineView_DateTimeID`+ data.TimelineID +`" style="margin: 0; font-size: 12px;">Date and Time : 2020-01-01 00:00:00</h4>

										<div id="TimelineView_DescriptionID`+ data.TimelineID +`" class="mt-3 mb-3">
										</div>

										<div id="TimelineView_LoaderID`+ data.TimelineID +`">

										</div>

										<div class="d-flex flex-row mt-1">	
											<a class="material-icons mr-4 d-flex align-items-center justify-content-center">comment</a>
											<a class="material-icons mr-1 d-flex align-items-center justify-content-center">edit</a>
											<div style="width: 100%"></div>
											<a class="material-icons mr-1 d-flex align-items-center justify-content-center red-text">delete</a>
										</div>
									</div>
								</div>
							`

							TimelineCreate_SendButton.removeClass('hide')
							TimelineCreate_ImageLoader.html('')
							TimelineCreate_Descriptionbox.val('')
							TimelineView_LoaderArea.append(HTML).load(new Timeline().View_ItemLoad(data.TimelineID))

							TimelineCreate_UploadForm = []

							// $("#TimelineView_ItemID"+ data.TimelineID).load(new Timeline().View_ItemLoad(data.TimelineID))

							
						}
						else {
							alert(data.ErrorDisplay)

							TimelineCreate_SendButton.removeClass('hide')
						}
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))

				 		TimelineCreate_SendButton.removeClass('hide')
					}
				})
			}
			else alert("Error: Postbox is Empty!")
		}
	}
</script>