<!DOCTYPE html>
<html>
<head>
    <title>Title of the test task</title>
    <link href="/favicon.png" rel="shortcut icon" type="image/x-icon">
</head>
<body>
    <h1>WELCOME</h1>
    <main id='main'>
        <p id='saved_data'></p>
        <form  name="something_form" action='/save_input_value' method="post">
        <textarea name="something" rows="4" cols="50" maxlength="255" placeholder="Write here ..."></textarea>
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="submit" id='button' name="something_form" value="SAVE"/>
        </form>
    </main>
    <footer id="footer_conteiner">
		<div id="footer">
			<p style="text-align:center">Copyright © 2023 Miestiechkin Oleg. Open sourse code is <a style="color:#fc6d26" href="https://github.com/Yurservice/SimpleMVC">here</a></p>
		</div>
	</footer>
</body>
</html>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); 
        let value = event.target.elements['something'].value;
        let csrf = event.target.elements['csrf_token'].value;
        if(value.length > 2) {
            event.target.elements['something'].value = '';
            sendRequest('POST', "../save_input_value", {value:value,csrf:csrf}).then(data => {
                if(data !== false) {
                    document.getElementById('saved_data').textContent = 'Saved: ' + data;
                }
            });   
        }
    }); 

    async function sendRequest(method, url, body = null) {
        const headers = {
            'Content-Type': 'application/json',
            'SameSite': 'Strict'
        }
        const response = await fetch(url,{method:method,body:JSON.stringify(body),headers: headers})
        if(response.ok) {
            var data = await response.json();
            return data;
        }
        else {
            console.log(await response.json());
            return false;
        }
    }
</script>

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
        height: 70vh;
        overflow: auto;
        margin: 0 auto 10px;
        width:100%;
        flex: 1 1 auto;
        position:relative;
        z-index:0;
    }

    form {
        width:250px;;
        margin: 50px auto;
        display: flex;
        flex-direction: column;
    }

    #button {
        cursor:pointer;
        margin-top:15px;
    }

    p {
        text-align:center;
	}

    #saved_data {
        margin-top:50px;
        min-height:50px;
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