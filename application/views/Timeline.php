<div id="App_TimelineArea" class="d-flex flex-row" style="width:100%; height: 100%">
	<div id="TimelineView_HomeArea" class="d-flex flex-row" style="width: 100%; height: 100%">
		<div class="p-3" style="width: 100%; overflow: hidden; overflow-y: scroll;">
			<h4 class="mb-4">News & Announcement</h4>
			<!-- Write Timeline -->
			<div class="d-flex flex-column mb-4" style="width: 100%;">
				<h4 style="margin: 0; font-size: 12px; font-weight: bold;">Write a post</h4>
				<textarea id="TimelineCreate_Descriptionbox" class="form-control" style="width: 100%; height: 150px; resize: none;"></textarea>
				<!-- Upload Image Display -->
				<div id="TimelineCreate_ImageLoader" class="row mt-1 ml-0 mr-0 mb-0"></div>
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
			<div id="TimelineView_LoaderArea"></div>
			<!-- End of View Timeline -->
		</div>
		<div class="border-left" style="width: 300px;">
			
		</div>
	</div>
	<!-- Post View Area -->
	<div id="TimelineView_PostArea" class="d-flex flex-row hide" style="width: 100%; height: 100%">
		<div class="d-flex flex-column" style="width: 100%; height: 100%">
			<div id="PostView_ImageLoader" class="" style="width: 100%; height: 100%; overflow-y: hidden;">
				<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>
			</div>
			<div class="d-flex flex-row border-top pt-1 pb-1" style="width: 100%;">
				<button onclick="new Post().View_BackButton()" class="material-icons form-control ml-1" style="width: 50px">first_page</button>
				<div class="d-flex justify-content-center" style="width: 100%;">
					<div class="d-flex flex-row">
						<button onclick="new Post().View_PreviewButton()" class="material-icons form-control mr-1" style="width: 50px">keyboard_arrow_left</button>
						<button onclick="new Post().View_ForwardButton()" class="material-icons form-control" style="width: 50px">keyboard_arrow_right</button>
					</div>
				</div>
			</div>
		</div>
		<div class="d-flex flex-column border-left" style="min-width: 500px; max-width: 350px; height: 100%">
			<div class="d-flex flex-row border-bottom p-2" style="width: 100%; overflow: hidden; overflow-y: scroll;">
				<img id="PostView_HostImage" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
				<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
					<h4 id="PostView_HostName" style="margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>
					<h4 id="PostView_DateTime" style="margin: 0; font-size: 12px;">Date and Time : 2020-01-01 00:00:00</h4>

					<div id="PostView_DescriptionLoader" class="mt-3 mb-3" style="font-size: 12px;">
						<span>Add some text here!</span>
					</div>
				</div>
			</div>
			<!-- Write Comment Area -->
			<div class="d-flex flex-row p-2 border-bottom" style="width: 100%">
				<img src="http://localhost/Ewallet/avatar.png" class="rounded-circle" width="50px" height="50px">
				<div class="d-flex flex-row ml-2" style="width: 100%">
					<textarea id="CommentCreate_Writebox" class="form-control border rounded pl-2 pr-2" placeholder="Any Comment?" style="width: 100%; height: 100px; resize: none;"></textarea>
					<button id="CommentCreate_SendButton" onclick="new Comment().Create_SendButton()" class="material-icons form-control ml-2" style="width: 50px">send</button>
				</div>
			</div>
			<!-- End of Write Comment Area -->
			<!-- Comment Loader Area -->
			<div id="PostView_CommentLoader" class="" style="width: 100%; height: 100%; min-height: 250px; overflow: hidden; overflow-y: scroll;">				<h4 class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Comment Yet!</h4>
			</div>
			<!-- End of Comment Loader Area -->
		</div>
	</div>
	<!-- End of Post View Area -->
</div>

<script type="text/javascript">
	var TimelineCreate_UploadForm = []
	var TimelineView_PagePrevious = 0
	var TimelineView_PageNext = 10

	var PostView_ImageCurrent = 0
	var PostView_ImageLast = 0

	$(document).ready(function() {
		var TimelineView_LoaderArea = $("#TimelineView_LoaderArea")

		$.ajax({
			url: window.location.href.replace("/Access", "/Timeline/View_PostLoad"), 
			method: 'POST',
			dataType: 'json',
			success: function(data) {
				if(!data.isError) {
					if(data.TimelineCount != 0) {
						TimelineView_LoaderArea.html('')

						for(var value of data.TimelineArray) TimelineView_LoaderArea.append(`
							<div onload="new Timeline().View_ItemLoad(`+ value +`)" id="TimelineView_ItemID`+ value +`" class="d-flex flex-row border p-2 mb-1" style="width: 100%">
								<img id="TimelineView_ImageID`+ value +`" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
								<div class="d-flex flex-column ml-4 mr-4" style="width: 100%">
									<h4 id="TimelineView_UsernameID`+ value +`" style="margin: 0; font-size: 18px; font-weight: bold;"></h4>
									<h4 id="TimelineView_DateTimeID`+ value +`" style="margin: 0; font-size: 12px;"></h4>

									<div id="TimelineView_DescriptionID`+ value +`" class="mt-3 mb-3"></div>
									<div id="TimelineView_LoaderID`+ value +`"></div>

									<div class="d-flex flex-row mt-1">	
										<a onclick="new Timeline().View_PostButton(`+ value +`)" class="material-icons mr-4 d-flex align-items-center justify-content-center">comment</a>
										<a class="material-icons mr-1 d-flex align-items-center justify-content-center">edit</a>
										<div style="width: 100%"></div>
										<a onclick="new Timeline().View_DeleteButton(`+ value +`)" class="material-icons mr-1 d-flex align-items-center justify-content-center red-text">delete</a>
									</div>
								</div>
							</div>
						`)
						for(var value of data.TimelineArray) new Timeline().View_ItemLoad(value)
					}
				}
				else alert(!data.ErrorDisplay)
			},
			error: function(ex) {
		 		console.log('Error: ' + JSON.stringify(ex, null, 2))
			}
		})
	})

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

						$("#TimelineView_ImageID"+ id).attr('src', 'http://localhost/Ewallet/avatar/'+ data.TimelineImage)
						$("#TimelineView_UsernameID"+ id).text(data.TimelineName)
						$("#TimelineView_DateTimeID"+ id).text("Date and Time : "+ data.DateRegister +" "+ data.TimeRegister)

						for(var splitter of JSON.parse(data.TimelineDescription).Text.split("\n")) {
							if(splitter != "") $("#TimelineView_DescriptionID"+ id).append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else $("#TimelineView_DescriptionID"+ id).append('<br />')
						}

						if(JSON.parse(data.TimelineDescription).Image.length != 0) for(var image of JSON.parse(data.TimelineDescription).Image) {
							$("#TimelineView_LoaderID"+ id).append('<img src="'+ window.location.href.replace("/index.php/Access", "/storage/"+ image) +'" width="100%">')
						}
						
					}	
					else new Timeline().View_ItemLoad(id)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		new Timeline().View_ItemLoad(id)
				}
			})
		}

		this.View_PostButton = function(id) {
			var TimelineView_PostArea = $("#TimelineView_PostArea")
			var TimelineView_HomeArea = $("#TimelineView_HomeArea")

			var PostView_ImageLoader = $("#PostView_ImageLoader")
			var PostView_HostName = $("#PostView_HostName")
			var PostView_HostImage = $("#PostView_HostImage")
			var PostView_DateTime = $("#PostView_DateTime")
			var PostView_DescriptionLoader = $("#PostView_DescriptionLoader")

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_PostButton?TimelineID=" +id, 
				method: 'POST',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						TimelineView_HomeArea.addClass('hide')
						TimelineView_PostArea.removeClass('hide')

						PostView_DescriptionLoader.html('')
						PostView_ImageLoader.html('')

						PostView_HostName.text(data.PostHostname)
						PostView_HostImage.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/" +data.PostHostimage)
						PostView_DateTime.text("Date and Time : "+ data.PostDT)

						for(var splitter of data.PostText.split("\n")) {
							if(splitter != "") PostView_DescriptionLoader.append('<div style="word-break: break-all;">'+ splitter +'</div>')
							else PostView_DescriptionLoader.append('<br />')
						}

						if(data.PostImage.length != 0) {
							data.PostImage.forEach(function(element, index) {
								PostView_ImageLoader.append('<div id="PostView_HostImageID' +index+ '" class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%"><img src="' +window.location.href.replace("/index.php/Access", "/storage/"+ data.PostImage[index])+ '" width="100%" /></div>')
							})

							PostView_ImageLast = data.PostImage.length
						}
						else PostView_ImageLoader.html('<h4 class="d-flex justify-content-center align-items-center" style="width: 100%; height: 100%;">No Image!</h4>')

						$("#CommentCreate_SendButton").attr('onclick', 'new Comment().Create_SendButton(' +data.PostID+ ')')

						new Post().View_CommentLoad(data.PostID)
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur!\n Please Try Again!")
				}
			})
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_DeleteButton?TimelineID="+id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						$("#TimelineView_ItemID"+ id).remove() 
						$("#StoreView_ItemID"+ id).remove() 
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur\nPlease Try Again!")
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
										<h4 id="TimelineView_UsernameID`+ data.TimelineID +`" style="margin: 0; font-size: 18px; font-weight: bold;"></h4>
										<h4 id="TimelineView_DateTimeID`+ data.TimelineID +`" style="margin: 0; font-size: 12px;"></h4>

										<div id="TimelineView_DescriptionID`+ data.TimelineID +`" class="mt-3 mb-3"></div>
										<div id="TimelineView_LoaderID`+ data.TimelineID +`"></div>

										<div class="d-flex flex-row mt-1">	
											<a onclick="new Timeline().View_PostButton(`+ data.TimelineID +`)" class="material-icons mr-4 d-flex align-items-center justify-content-center">comment</a>
											<a class="material-icons mr-1 d-flex align-items-center justify-content-center">edit</a>
											<div style="width: 100%"></div>
											<a onclick="new Timeline().View_DeleteButton(`+ data.TimelineID +`)" class="material-icons mr-1 d-flex align-items-center justify-content-center red-text">delete</a>
										</div>
									</div>
								</div>
							`

							TimelineCreate_SendButton.removeClass('hide')
							TimelineCreate_ImageLoader.html('')
							TimelineCreate_Descriptionbox.val('')
							TimelineView_LoaderArea.prepend(HTML).load(new Timeline().View_ItemLoad(data.TimelineID))

							TimelineCreate_UploadForm = []
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

	function Post() {
		this.View_CommentLoad = function(id) {
			var PostView_CommentLoader = $("#PostView_CommentLoader")

			PostView_CommentLoader.html('')

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Timeline/View_CommentLoad?TimelineID="+ id,
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError){
						if(data.CommentID.length != 0) {
							for(var x of data.CommentID) PostView_CommentLoader.append( `
								<div id="CommentView_ItemID` +x+ `" class="d-flex flex-row p-2 border-bottom" style="width: 100%;">
									<img id="CommentView_ImageID` +x+ `" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
										<h4 id="CommentView_NameID` +x+ `" style="margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>

										<div id="CommentView_LoaderID` +x+ `" class="mt-3 mb-3"></div>
										<div class="d-flex flex-row" style="width: 100%">
											<div style="width: 100%"></div>

											<a id="CommentView_MentionButtonID` +x+ `" onclick="new Comment().View_MentionButton(` +x+ `)" class="d-flex align-items-center" style="font-weight: bold">@</a>
											<a id="CommentView_DeleteButtonID` +x+ `" onclick="new Comment().View_DeleteButton(` +x+ `)" class="material-icons red-text ml-2">delete</a>
										</div>
									</div>
								</div>
							`)

							for(var x of data.CommentID) new Comment().View_ItemLoad(x)
						}
						else PostView_CommentLoader.append('<h4 class="d-flex align-items-center justify-content-center" style="width: 100%; height: 100%">No Comment Yet!</h4>')
					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		// new Post().View_CommentLoad(id)
				}
			})
		}

		this.View_BackButton = function() {
			$("#TimelineView_PostArea").addClass('hide')
			$("#TimelineView_HomeArea").removeClass('hide')
		}

		this.View_PreviewButton = function() {
			PostView_ImageCurrent -= 1 
			if(PostView_ImageCurrent == -1) PostView_ImageCurrent = PostView_ImageLast - 1
			

			$("#PostView_HostImageID"+ PostView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth",
				block: "start"
			})
		}

		this.View_ForwardButton = function() {
			PostView_ImageCurrent += 1
			if(PostView_ImageCurrent == PostView_ImageLast) PostView_ImageCurrent = 0

			$("#PostView_HostImageID"+ PostView_ImageCurrent)[0].scrollIntoView({
			    behavior: "smooth", // or "auto" or "instant"
				block: "start" // or "end"
			})
		}
	}

	function Comment() {
		this.View_ItemLoad = function(id) {
			var CommentView_NameID = $("#CommentView_NameID"+ id)
			var CommentView_ImageID = $("#CommentView_ImageID"+ id)
			var CommentView_MentionButtonID = $("#CommentView_MentionButtonID"+ id)
			var CommentView_DeleteButtonID = $("#CommentView_DeleteButtonID"+ id)

			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_ItemLoad?CommentID=" +id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) {
						for(var splitter of data.CommentText.split("\n")) {
							if(splitter != "") $("#CommentView_LoaderID"+ id).append('<div style="font-size: 12px; word-break: break-all;">'+ splitter +'</div>')
							else $("#CommentView_LoaderID"+ id).append('<br />')
						}

						CommentView_NameID.text(data.CommentName)
						CommentView_ImageID.attr('src', window.location.href.replace("/index.php/Access", "")+ "/avatar/"+ data.CommetImage)
						CommentView_MentionButtonID.attr('onclick', "new Comment().View_MentionButton('"+ data.CommentMention +"')")
						CommentView_DeleteButtonID.attr('onclick', 'new Comment().View_DeleteButton('+ data.CommentID +')')

					}
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		new Comment().View_ItemLoad(id)
				}
			})
		}

		this.View_MentionButton = function(id) {
			$("#CommentCreate_Writebox").append(id)
		}

		this.View_DeleteButton = function(id) {
			$.ajax({
				url: window.location.href.replace("/Access", "")+ "/Comment/View_DeleteButton?CommentID="+ id, 
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					if(!data.isError) $("#CommentView_ItemID"+ id).remove()
					else alert(data.ErrorDisplay)
				},
				error: function(ex) {
			 		console.log('Error: ' + JSON.stringify(ex, null, 2))

			 		alert("Error: Unexpected Error Occur\nPlease Try Again!")
				}
			})
		}

		this.Create_SendButton = function(id) {
			var CommentCreate_Writebox = $("#CommentCreate_Writebox")
			var PostView_CommentLoader = $("#PostView_CommentLoader")

			if(CommentCreate_Writebox.val() != "") {
				$.ajax({
					url: window.location.href.replace("/Access", "")+ "/Comment/Create_SendButton?TimelineID=" +id,
					method: 'POST',
					data: {
				 		CommentDescription:CommentCreate_Writebox.val()
					},
					dataType: 'json',
					success: function(data) {
						if(!data.isError) {
							if(data.isNew) PostView_CommentLoader.html('')

							var HTML = `
								<div id="CommentView_ItemID` +data.CommentID+ `" class="d-flex flex-row p-2 border-bottom" style="width: 100%;">
									<img id="CommentView_ImageID` +data.CommentID+ `" src="http://localhost/Ewallet/avatar.png" width="50px" height="50px">
									<div class="d-flex flex-column ml-3 mr-3" style="width: 100%">
										<h4 id="CommentView_NameID` +data.CommentID+ `" style="margin: 0; font-size: 14px; font-weight: bold;">Zeke S. Redgrave [System Administrator]</h4>

										<div id="CommentView_LoaderID` +data.CommentID+ `" class="mt-3 mb-3"></div>
										<div class="d-flex flex-row" style="width: 100%">
											<div style="width: 100%"></div>

											<a id="CommentView_MentionButtonID` +data.CommentID+ `" onclick="new Comment().View_MentionButton(` +data.CommentID+ `)" class="d-flex align-items-center" style="font-weight: bold">@</a>
											<a id="CommentView_DeleteButtonID` +data.CommentID+ `" onclick="new Comment().View_DeleteButton(` +data.CommentID+ `)" class="material-icons red-text ml-2">delete</a>
										</div>
									</div>
								</div>
							`
							PostView_CommentLoader.prepend(HTML)
							CommentCreate_Writebox.val('')

							new Comment().View_ItemLoad(data.CommentID)
						}
						else alert(data.ErrorDisplay)
					},
					error: function(ex) {
				 		console.log('Error: ' + JSON.stringify(ex, null, 2))
					}
				})
			}
			else alert("Error: Commentbox is empty!")
		}

		this.Create_ReplyButton = function(id) {

		}
	}
</script>