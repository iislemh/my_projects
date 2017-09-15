<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" type="image/ico" href="img/favicon.gif" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title> titre </title>
    </head>
    <body>
        
        <form action="uploader.php" enctype="multipart/form-data" method="post">
            <p class="indent">
                <label for="filmName">Film Name:</label>
                <input type="text" name="filmName" id="filmName" value="">
            </p>
            <p class="indent">
                <label for="filmCert">Certificate:</label>
                <select name="filmCert">
        <?php
            while ($rowCerts = $resultFilmCerts->fetch_assoc()) {
                echo "<option value=\"{$rowCerts['filmCertificate']}\">";
                echo $rowCerts['filmCertificate'];
                echo "</option>";
            }
        ?>
                </select>
            </p>
            <p class="indent">
                <label for="filmImage">Film Image</label>
                <input type="file" name="filmImage" required>
            </p>
            <p class="indent">
                <label for="filmDescription">Film Description</label>
                <textarea name="filmDescription" id="filmDescription" cols="45" rows="5"></textarea>
            </p>
            <p class="indent">
                <label for="filmPrice">Film Price</label>
                <input type="text" name="filmPrice" id="filmPrice" value="">
            </p>
            <p>
                <span class="indent">Star Rating:</span>
                <label for="filmReview_1">1</label>
                <input type="radio" name="filmReview" value="1" id="filmReview_1">
          
                <label for="filmReview_2">2</label>
                <input type="radio" name="filmReview" value="2" id="filmReview_2">
          
                <label for="filmReview_3">3</label>
                <input type="radio" name="filmReview" value="3" id="filmReview_3">
          
                <label for="filmReview_4">4</label>
                <input type="radio" name="filmReview" value="4" id="filmReview_4">
          
                <label for="filmReview_5">5</label>
                <input type="radio" name="filmReview" value="5" id="filmReview_5" checked>
            </p>
            <p>
                <input type="submit" name="button" id="button" value="Insert">
            </p>
        </form>
    </body>
</html>