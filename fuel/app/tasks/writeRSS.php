
<?php

class writeRSS extends matchedArticle {

    private $articleDir = "/Users/mark/Sites/nntp";


function processArticle($headers) {

	$fileName = $articleDir + "/" + $headers['Message-ID'];

}

}

?>