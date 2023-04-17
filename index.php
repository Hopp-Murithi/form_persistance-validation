<?php
$name = '';
$password = '';
$gender = '';
$languages = [];
$color = '';
$comments = '';
$tc = '';


if (isset($_POST['submit'])) {
    // echo htmlspecialchars($_POST['searchTerm'], ENT_QUOTES); //prevent cross-site scripting
    $ok = true;

    if (!isset($_POST['name']) || ($_POST['name']) === '') {
        $ok = false;
    } else {
        $name = $_POST['name'];
    }
    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $ok = false;
    } else {
        $password = $_POST['password'];
    }
    if (!isset($_POST['gender']) || $_POST['gender'] === '') {
        $ok = false;
    } else {
        $gender = $_POST['gender'];
    }
    if (!isset($_POST['languages']) || count($_POST['languages']) === 0 || !is_array($_POST['languages'])) {
        $ok = false;
    } else {
        $languages = $_POST['languages'];
    }
    if (!isset($_POST['color']) || $_POST['color'] === '') {
        $ok = false;
    } else {
        $color = $_POST['color'];
    }
    if (!isset($_POST['comments']) || $_POST['comments'] === '') {
        $ok = false;
    } else {
        $comments = $_POST['comments'];
    }
    if (!isset($_POST['tc']) || $_POST['tc'] === '') {
        $ok = false;
    } else {
        $tc = $_POST['tc'];
    }
    if ($ok) {
        printf(
            'Username:%s
        <br>Password:%s
        <br>Gender:%s
        <br>Color:%s
        <br>Language(s):%s
        <br>Comments:%s
        <br>T&C:%s',
            htmlspecialchars($name, ENT_QUOTES),
            htmlspecialchars($password, ENT_QUOTES),
            htmlspecialchars($gender, ENT_QUOTES),
            htmlspecialchars($color, ENT_QUOTES),
            htmlspecialchars(implode(' ', $languages), ENT_QUOTES),
            htmlspecialchars($comments, ENT_QUOTES),
            htmlspecialchars($tc, ENT_QUOTES)
        );
    }
}
?>
<form method='post'>
    <!-- prefills previous text data if it was submitted and unaccepted -->
    Username: <input type="text" name="name" value="<?php
                                                    echo htmlspecialchars($name, ENT_QUOTES);
                                                    ?>">
    <br>
    Password: <input type="password" name="password">
    <br>
    <!-- prefills selected radio button if it was submitted and unaccepted -->
    Gender:
    <input type="radio" name="gender" value="f" <?php
                                                if ($gender === 'f') {
                                                    echo ' checked';
                                                }
                                                ?>> Female
    <input type="radio" name="gender" value="m" <?php
                                                if ($gender === 'm') {
                                                    echo ' checked';
                                                }
                                                ?>> Male
    <input type="radio" name="gender" value="o" <?php
                                                if ($gender === 'o') {
                                                    echo ' checked';
                                                }
                                                ?>> Other<br>
    <!-- prefills selected single item  if it was submitted and unaccepted -->
    Favourite color:
    <select name="color">
        <option value="">Please select</option>
        <option value="#f00" <?php
                                if ($color === '#f00') {
                                    echo ' selected';
                                }
                                ?>>Red</option>
        <option value="#0f0" <?php
                                if ($color === '#0f0') {
                                    echo ' selected';
                                }
                                ?>>Green</option>
        <option value="#00f" <?php
                                if ($color === '#00f') {
                                    echo ' selected';
                                }
                                ?>>Blue</option>
    </select><br>
    <!-- prefills selected multiple list if it was submitted and unaccepted -->
    Languages spoken:
    <select name="languages[]" multiple size="3">
        <option value="en" <?php
                            if (in_array('en', $languages)) {
                                echo ' selected';
                            }
                            ?>>English</option>
        <option value="fr" <?php
                            if (in_array('fr', $languages)) {
                                echo ' selected';
                            }
                            ?>>French</option>
        <option value="it" <?php
                            if (in_array('it', $languages)) {
                                echo ' selected';
                            }
                            ?>>Italian</option>
    </select><br>
    <!-- prefills the comments with the previous data if it is submitted and not accepted due to unfilled fields -->
    comments:
    <textarea name="comments">

        <?php
        echo htmlspecialchars($comments, ENT_QUOTES);
        ?>
    </textarea><br>

    <input type="checkbox" name="tc" value="ok" <?php
                                                // only checks if it was previously checked
                                                if ($tc === "ok") {
                                                    echo ' checked';
                                                } ?>>I accept the terms&amp;conditions<br>

    <input type="submit" value="register" name="submit">
</form>