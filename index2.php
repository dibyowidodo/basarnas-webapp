<!DOCTYPE html>
<html>
<head>
	<title>Add Drown Victim</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Load the required CSS and JavaScript files for drag and drop file upload with preview -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
</head>
<body>
	<h1>Add Drown Victim</h1>
	<form action="add_drown_victim.php" method="POST" enctype="multipart/form-data">
		<table>
			<tr>
				<td>ID:</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr>
				<td>Date and Time:</td>
				<td><input type="datetime-local" name="datetime"></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Detected:</td>
				<td><input type="checkbox" name="detected"></td>
			</tr>
			<tr>
				<td>Image:</td>
				<td>
					<!-- Create a div for the drag and drop file upload area with preview -->
					<div class="dropzone" id="myDropzone"></div>
					<!-- Create a hidden input field to store the uploaded image file path -->
					<input type="hidden" name="image_path" id="image_path">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Add Victim"></td>
			</tr>
		</table>
	</form>

	<script type="text/javascript">
		// Configure the Dropzone.js options
		Dropzone.options.myDropzone = {
			url: "upload.php", // Set the URL for the image upload script
			acceptedFiles: "image/*", // Set the accepted file type to images only
			addRemoveLinks: true, // Add remove links to uploaded images
			maxFiles: 1, // Set the maximum number of files to upload to 1
			init: function() {
				// Set up the event listener for the "success" event, which is triggered when an image is successfully uploaded
				this.on("success", function(file, response) {
					// Store the uploaded image path in the hidden input field
					document.getElementById("image_path").value = response;
				});
			}
		};
	</script>
</body>
</html>
