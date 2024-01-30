<?php 
/* Template Name: Example Template */
get_header();

?>

 

<script>
// function exportPDF1() {
		// var formData = $("#myForm").serialize();
		// jQuery.ajax({
		 // url: "https://projs.ifdemo.com/p15/dev_test2/wp-content/themes/hello-elementor/export.php",
		 // type : "POST",
		 // data:{formData: formData}
		// }).done(function(filename,data) {
			// if(filename != "") {
				// downloadUrl= "https://projs.ifdemo.com/p15/rejuvenlicious/wp-content/uploads/pdfExport/"+filename;
				//download(downloadUrl, filename);

			// }
		// });
	// }
	
jQuery(document).ready(function() {
    // Attach a submit event handler to the form
    jQuery("#visa-general-form").submit(function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Serialize the form data
        var formData = jQuery(this).serialize();
		console.log(formData);

        // Define the AJAX request
        jQuery.ajax({
            type: "POST", // or "GET" depending on your needs
            url: "http://localhost/wordpress_1/wp-content/themes/ahello-elementor/export.php", // Specify the URL for the AJAX request
            data: formData,
            success: function(response) {
                // Handle the successful response here (e.g., display a success message)
                console.log("AJAX request succeeded: " + response);
            },
            error: function(xhr, status, error) {
                // Handle errors here (e.g., display an error message)
                console.error("AJAX request failed: " + error);
            }
        });
    });
});
</script>



<form id="visa-general-form" class="visa-form form-outline" novalidate="" >
	<div class="flex-row">
		<div class="col-12">
			<label>
				<span>Date</span>
				<input type="text" class="form-control" id="general_sf_date" name="sf_date" placeholder="mm/dd/yyyy" autocomplete="off">
				<p class="help-block">Date format: mm/dd/yyyy</p>
				<div class="message-error alert alert-error"></div>
			</label>
		</div>
		<div class="col-12">
			<label>
				<span>Attention to</span>
				<input type="text" class="form-control" id="general_sf_name" name="sf_name" placeholder="Full name" autocomplete="off">
				<div class="message-error alert alert-error"></div>
			</label>
		</div>
		<div class="col-12">
			<label>
				<span>Date of Birth</span>
				<input type="text" class="form-control" id="general_sf_datebirth" name="sf_datebirth" placeholder="mm/dd/yyyy" autocomplete="off">
				<p class="help-block">Date format: mm/dd/yyyy</p>
				<div class="message-error alert alert-error"></div>
			</label>
		</div>
		<div class="col-12">
			<label>
				<span>Passport number</span>
				<input type="text" class="form-control" id="general_sf_passport" name="sf_passport" placeholder="" autocomplete="off">
				<div class="message-error alert alert-error"></div>
			</label>
		</div>
		
		<div class="col-12">
			<button type="submit" class="button">Create PDF</button>
			<button type="reset" class="button button-outline">Reset</button>
			<div class="submit-error message-error alert alert-error"></div>
		</div>
	</div>
</form>
<button type="submit" class="button" onclick="exportPDF1()">Create PDF</button>
<button type="reset" class="button button-outline">Reset</button><div class="submit-error message-error alert alert-error"></div></div></div></form></section></div>

<?php 

 get_footer();
?>