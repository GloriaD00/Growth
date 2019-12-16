

<htlm>
    <head>
        <title>Growth signUp</title>

        <link rel="stylesheet" href="styles/signup.css">
    </head>
    <body>
<div class="page">
    <div class="container">
        <form action="/register" method="post" >


            <?php if($empty==true):?>
            <input type="text" class='fail' name='Nome'placeholder='first name'>
            <input type="text" class='fail' name="Cognome" placeholder="last name">
            <input type="text" class='fail' name="email" placeholder="email">
            <input type="password" class='fail' name="Password" placeholder="password" >
            <input type="password" class='fail' name='confirm_password' placeholder="confirm password" >
            <p class="fail-p">You have to fill all the fields!</p>



            <?php elseif($unmatching==true ):?>
                <input type="text" name='Nome'placeholder='first name'>
                <input type="text" name="Cognome" placeholder="last name">
                <input type="text" name="email" placeholder="email">
            <input type="password" name="Password" placeholder="password" class="unmatching">
            <input type="password" name='confirm_password' placeholder="confirm password" class="unmatching">
            <p class="unmatching-p">Le password non combaciano</p>

            <?php elseif($weak==true) : ?>
                <input type="text" name='Nome'placeholder='first name'>
                <input type="text" name="Cognome" placeholder="last name">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="Password" placeholder="password" class="weak">
            <p class="weak-p">The password must be at least 8 chracters long, contain at least a number and an uppercase character</p>
                <input type="password" name='confirm_password' placeholder="confirm password">

            <?php elseif($exists==true ):?>
                <input type="text" name='Nome'placeholder='first name'>
                <input type="text" name="Cognome" placeholder="last name">
                <input type="text" name="email" placeholder="email" class="exists">
                <p class="exists-p">user already exists</p>
                <input type="password" name="Password" placeholder="password" >
                <input type="password" name='confirm_password' placeholder="confirm password">
            <?php elseif($isEmail==true):?>
                <input type="text" name='Nome'placeholder='first name'>
                <input type="text" name="Cognome" placeholder="last name">
                <input type="text" class="exists" name="email" placeholder="email">
                <p class="exists-p">Please insert a valid email</p>

                <input type="password" name="Password" placeholder="password" >
                <input type="password" name='confirm_password' placeholder="confirm password" >


            <?php else: ?>
                <input type="text" name='Nome'placeholder='first name'>
                <input type="text" name="Cognome" placeholder="last name">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="Password" placeholder="password" >
                <input type="password" name='confirm_password' placeholder="confirm password" >

            <?php endif; ?>
            <button type="submit">Join us!</button>
        </form>
    </div>
    <div class="container">
        <h1>GROWTH</h1>
        <h2>Sign up</h2>
        <a href="/login">Already have an account? Log in</a>
    </div>
</div>
    </body>
</htlm>