<!DOCTYPE html>
<html>
<head>
    <title>Page not found</title>
    <link href="/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
    <h1>Sorry, but the required page was not found!</h1>
    <main id='main'>
        <p><a href='/'>Go To The Main Page</a></p>
    </main>
    <footer id="footer_conteiner">
		<div id="footer">
			<p style="text-align:center">Copyright © 2023 Miestiechkin Oleg. Open sourse code is <a style="color:#fc6d26" href="https://github.com/Yurservice/SimpleMVC">here</a></p>
		</div>
	</footer>
</body>
</html>

<style>
    html{
        height: 100%;
    }

    body {
        font-family:Montserrat-Medium;
        width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction:column;
        min-width:370px;
            min-height:100vh;
            height: auto;
        color:#514f4f;
            overflow-x:hidden;
            position:relative;
    }
    
    h1, h2 {
        color: #514f4f;
        font-size: 36px;
        text-align:center;
	}

    main {
        flex: 1 1 auto;
        padding-bottom:50px;
    }

    #main {
        background-color: white;
        box-shadow: 0 -1px 4px 0px black;
        -webkit-box-shadow: 0 0 4px 0px black; 
        -moz-box-shadow: 0 0 4px 0px black; 
        padding-top: 10px;
        height: 65vh;
        overflow: auto;
        margin: 0 auto 10px;
        width:98%;
        flex: 1 1 auto;
        position:relative;
        z-index:0;
    }

    p {
        text-align:center;
	}

    #footer_conteiner {
        width: 100%;
        min-height: 55px;
        overflow: hidden;
    }

    #footer {
        box-shadow: 0 -1px 4px 0 #2e3232;
        margin: 1px auto;
        width: 100%;
        height: 100%;
        padding: 5px 0;
        font-weight: bold;
        font-size: 13px;
        align-items: center;
    }


</style>