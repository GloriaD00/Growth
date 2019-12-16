


<htlm>
    <head>
        <title>Growth Login</title>

        <link rel="stylesheet" href="/styles/login.css">
    </head>
    <body>
<div class="page">
    <div class="container">
        <?php if($first_visit==true) :?>
            <p>Hello <?= $nome?> you have been registered please log in</p>



        <?php endif; ?>
        <form action="/login/log" method="post" >
            <?php if($error==true) :?>
            <input type="text" name='email'placeholder='email' class="unmatching">
            <input type="password" name="password" placeholder="password" class="unmatching">
            <p class="unmatching-p">wrong email or password</p>
            <?php else :?>
            <input type="text" name='email'placeholder='email' >
            <input type="password" name="password" placeholder="password" >
            <?php endif; ?>
            <button type="submit">Log in!</button>
        </form>
    </div>
    <div class="container">
        <h1>GROWTH</h1>
        <h2>Log in</h2>
        <a href="/signup">Don't have an account? Sign up</a>
    </div>
</div>
    </body>
</htlm>

