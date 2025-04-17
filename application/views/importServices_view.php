<!-- jQuery CDN (Fixed integrity hash) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>

<!-- Font Awesome for icons (optional) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<script>
$(document).ready(function () {
    $.ajax({
        url: '<?= base_url("importServices") ?>', // CodeIgniter base_url
        type: "GET",
        dataType: "json", // change to "html" if you're expecting HTML
        success: function(response) {
            console.log(response);
            // handle your response here
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
});
</script>
