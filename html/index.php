<?php
require_once('header.php');

// Get all graves
$allGraves = find_graves();
$graves = [];

// while ($grave = mysqli_fetch_assoc($allGraves)) {
//     $graves[] = $grave;
// }


?>
<div id="openUpload" class="uploadDialog">
    <div><a href="#close" title="close" class="close">X</a>
        </header>
        <!-- ======== hero ======== -->
        <section id="hero"><!-- begin hero -->
            <h1>Welcome to the Grave Site</h1>
            <div class="search"><!-- begin search -->
                <form action="upload.php"><!-- begin form -->
                    <input type="search" name="ancestor_search" placeholder="Find your Ancestor">
                </form><!-- end form -->
            </div><!-- end search -->
        </section><!-- end hero -->

        <!-- ======== display graves ======== -->
        <center>
            <section id="graves"><!-- begin graves ID -->
                <table><!-- begin graves table -->
                    <?php foreach ($graves as $grave): ?><!-- begin graves foreach -->
                        <tr>
                            <td><img src="../uploads/<?php echo $grave['PhotoName']; ?>"></td>
                            <td>
                                <?php
                                echo $grave['firstName'] . " ";
                                echo $grave['middleName'] . " ";
                                echo $grave['lastName'];
                                ?>
                            </td>
                            <td><?php echo $grave['birthDate']; ?></td>
                            <td>
                                <?php echo $grave['deathDate']; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?><!-- end graves foreach -->
                </table><!-- end graves table -->
            </section><!-- end graves ID -->
        </center>

        <!-- ======== upload ======== -->
        <a href="uploadForm.php">
            <h2>add a grave</h2>
        </a>




        <?php include 'footer.php'; ?>