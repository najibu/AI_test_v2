<?php

/*
1. You can only add code between "Edit Part X" and "End Edit Part X"

2. You can edit 1.html as you wish but cannot change the current structure of elements OR add/remove data-id attributes

3. Create an AJAX call to send a request to index.php using Vue JS that will fire once index.php is run (Edit Part 2)

4. The AJAX call should reach "Edit Part 1" section of the script

5. Write any logic in "Edit Part 1" and "Edit Part 2" so the content of 1.html will be displayed corectly inside "main_template_contect" div

Note: You can only create one AJAX call.
Note: The content of 1.html to be displayed is marked inside the file. NOT all content should be taken.
Note: All html elements with matching data-id to $attr keys, should be injected (as content) with the keys value.
Example: <h2 data-id="title">Data Driven Marketing</h2>.

6. Run index.php and make sure it works :)
*/

if (isset($_POST['is_ajax']) && $_POST['is_ajax'] == 'yes') {
    $attr = [
        'title' => 'Data Driven Marketing',
        'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores cumque dicta
	                dignissimos dolorem dolores ducimus eveniet expedita libero magnam natus numquam officiis,
	                porro, quaerat quibusdam reprehenderit sint soluta, voluptate! Lorem ipsum dolor sit amet,
	                consectetur adipisicing elit. Alias asperiores cumque dicta
	                dignissimos dolorem dolores ducimus eveniet expedita libero magnam natus numquam officiis,
	                porro, quaerat quibusda.',
        'contact' => '<span class="address-info">6th Floor, One Canada Square,</span>
						<span class="address-info">Canary Wharf, London, E14 5AX</span>
						<span class="address-info">help@addintel.co.uk</span>
						<span class="address-info address-tel">Tel: 020 7537 6564</span>',
        'logo' => 'image/logo.png'
    ];

    //** Edit Part 1 **//
    $content = file_get_contents("1.html");

    echo json_encode(
        [
            "attr" => $attr,
            "content" => $content
        ]
    );
    //** End Edit Part 1 **//
} else {
    ?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>AI Test</title>
			<style>
				body{
					text-align: center;
				}

				#main_template_contect{
					border: 1px solid black;
					width: 58%;
					min-height: 500px;
					margin: 0 auto;
				}
			</style>
			<link rel="stylesheet" href="css/77.css" />
		</head>
		<body>
			<h1>AddIntel Dev Test</h1>

			<!-- Edit Part 2 -->
			<div id="main_template_contect">
				<my-template
					:title="title"
					:content="content"
					:contact="contact"
					:logo="logo"
				></my-template>
			</div>

			<script src="https://unpkg.com/vue"></script>
			<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
			<script src="/js/main.js"></script>

			<!-- End Edit Part 2 -->

			<h4>Good Luck!</h4>
		</body>
	</html>
	<?php
}
