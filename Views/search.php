<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../public/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>CreditorWatch SEO Engine</title>
</head>
<body>
	<img class="logo" src="../public/images/CW_Logo.jpg">

	<div>
		<input required="required" type="text" class="search_bar" name="query" placeholder="Write your search keywords here separated by commas...">
        <br/>
        <input required="required" type="text" class="search_bar" name="url_to_find" placeholder="Write the url you want to filter...">
        <br/><br/><br/>
        <label>Choose the provider</label>
		<input type="radio" name="provider" value="google" checked required>Google
		<input type="radio" name="provider" value="yahoo">Yahoo!<br>
        <br><br>
		<button value="Search!" class="input-button">Search!</button>
        <p hidden class="error">You need to type the query and select a provider</p>
        <div hidden class="loading style-2"><div class="loading-wheel"></div></div>
    </div>

	<div class="results">

    </div>

</body>

<script>
    $( document ).ready(function() {
        $('.input-button').on('click', function() {
            var query = $("input[name='query']").val();
            var url = $("input[name='url_to_find']").val();
            var origin = $("input[name='provider']:checked").val();

            //Check validity of values (not empty)
            if (query == '' || origin == null || url == '') {
                $(".error").show();
                return false;
            }

            $(".error").hide();
            $(".loading").show();

            var searchUrl = "/searchResults?query=" + query + "&origin=" + origin + "&url=" + url
            $.ajax({
                url: searchUrl,
                success: function(result){
                    $(".error").hide();
                    $(".loading").hide();
                    $('.results').html("");
                    $.each( result, function( key, links ) {
                        $('.results').append("<div>")
                        $('.results').append("<h2>Results for " + key + ": " + links.length + "</h2>");
                        $.each( links, function( index, link ) {
                            $('.results').append("<h3><a href='" + link.link + "'>" + link.title +" </a> </h3>");
                        });
                        $('.results').append("</div>");
                    });
                }
            });
        })

        $(".loading").hide();
        return false;
    });
</script>
</html>
