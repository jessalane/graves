<?php require_once('header.php'); 
    if (!isset($_SESSION)) { session_start(); } ?>
    </header>  
    <body>
        <div class="upload">
            <h2>Grave Upload Form</h2>
            <h3><?php echo display_errors($_SESSION['errors']); ?></h3>
                <form method="post" action="upload.php" enctype="multipart/form-data">
                    <p align="left"><label for="firstName">First Name</label><p>
                        <input type="text" name="firstName" id="firstName">
                    <p align="left"><label for="middleName">Middle Name</label><p>
                        <input type="text" name="middleName" id="middleName">
                    <p align="left"><label for="lastName">Last Name</label><p>
                        <input type="text" name="lastName" id="lastName">
                    <p align="left"><label for="birthDate">Birth Date</label><p>
                        <input type="date" name="birthDate" id="birthDate">
                    <p align="left"><label for="deathDate">Death Date</label><p>
                        <input type="date" name="deathDate" id="deathDate">
                    <p align="left"><label for="deathDate">Gravestone Image File</label><p>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    <p align="left"><label for="uploadKey">Upload Key</label><p>
                        <input type="text" name="uploadKey" id="uploadKey">
                        <input type="submit" value="Upload Grave" name="submit">
                </form><!-- end upload form -->
        </div><!-- end upload -->

    </body>
<?php include 'footer.php'; ?>