<html>

<head>
    <title id="<?=$usr->getId()?>">Settings</title>
    <link rel="stylesheet" href="/styles/settings.css">
    <script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="module" src="/dist/settings.js"></script>
</head>

<body>
<div class="navbar">
    <p><a href="/user/home"><?= $usr->getName()?></a></p>
    <a href="/logout">Logout</a>


</div>
<div class="splitter">
<div class="form-container">
<h1>Change Password</h1>
<form class="pass-change" action="/change-pass" method="post">

        <?php if($errors['empty_ps']==true):?>
            <input name="old-pass" class="fail"  placeholder="old password">

            <input name="new-pass"  class="fail" placeholder="new password">

            <input name="confirm-pass"   class="fail" placeholder="confirm password">
            <p class="p-fail">Please fill all the fields</p>

        <?php elseif($errors['old_fail']==true):?>
        <input name="old-pass" class='fail' placeholder="old password">
        <p class="p-fail" >Please type the your old password correctly</p>
        <input name="new-pass"  placeholder="new password">

        <input name="confirm-pass"  placeholder="confirm password">
        <?php elseif($errors['unmatching_fail']==true):?>
        <input name="old-pass"  placeholder="old password">

        <input name="new-pass" class='fail' placeholder="new password">

        <input name="confirm-pass" class='fail' placeholder="confirm password">
        <p class="p-fail" >Passwords don't match</p>

    <?php elseif($errors['weak_fail']==true):?>
    <input name="old-pass"  placeholder="old password">

    <input name="new-pass" class='fail' placeholder="new password">
    <p class="p-fail" >Weak password</p>
    <input name="confirm-pass"  placeholder="confirm password">
    <?php else :?>

    <input name="old-pass"  placeholder="old password">

    <input name="new-pass"  placeholder="new password">

    <input name="confirm-pass"  placeholder="confirm password">

    <?php endif ?>
    <input name="usr"  type="hidden" value="<?=$usr->getId()?>">
    <button type="submit">Change Password</button>
</form>

<h1>Change email</h1>

<form class="email-change" action="/change-email" method="post">

    <?php if($errors['empty_em']==true):?>
    <input name="new-email"  class='fail' placeholder="new email">
    <input name="confirm-email"  class='fail' placeholder="confirm email">
    <p class="'p-fail">Please fill all the fields</p>
    <?php elseif($errors['unm_email']==true):?>
    <input name="new-email"  class='fail' placeholder="new email">
    <input name="confirm-email"  class='fail' placeholder="confirm email">
    <p class="'p-fail">Unmatching emails</p>
    <?php elseif($errors['is_email']==true):?>
    <input name="new-email"  class='fail' placeholder="new email">
    <p class="'p-fail">Please type a valid email</p>

    <input name="confirm-email"   placeholder="confirm email">
    <?php else:?>

    <input name="new-email"  placeholder="new email">
    <input name="confirm-email"  placeholder="confirm email">
    <?php endif ?>

    <input name="usr"  type="hidden" value="<?=$usr->getId()?>">
    <button type="submit">Change Email</button>
</form>
</div>

<div class="user">
    <p><strong>First Name:</strong><?=$usr->getName()?></p>
    <p><strong>Last Name:</strong><?=$usr->getLN()?></p>
    <p><strong>Email:</strong><?=$usr->getEmail()?></p>

    <button id="deleteAcc">Delete account</button>


</div>

</div>
</body>

</html>