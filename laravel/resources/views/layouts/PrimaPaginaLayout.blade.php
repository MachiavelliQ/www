<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php require_once '/php/Parsedown.php';
$parsedown = new Parsedown();

//echo $parsedown->text($text);
 ?>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<?php //<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> ?>
<!-- Generic page styles -->

<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="/css/jquery.fileupload.css">
<link rel="stylesheet" href="/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- Progress bar  -->
<script src='/js/nprogress.js'></script>
<link href='/css/nprogress.css' rel='stylesheet' />
<!-- QTIP -->

<link href='/css/lightbox.css' rel='stylesheet' />

<link href='/css/chosen.css' rel='stylesheet' />

<link href="/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">






<script type="text/javascript">
 function progress(){
NProgress.start();
NProgress.done();
 }
 
window.onload  = progress;
</script>

<script>if(location.hostname.match(/ricostacruz\.com$/)){var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-20473929-1"]),_gaq.push(["_trackPageview"]),function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}()}</script>


	<meta charset="UTF-8">

@include ('js')
<script type="text/javascript">
$(document).ready(function(){
	$('#modal-open-button-a').click(function(e){
		$('#modal-open-button-a').prop('disabled',true);
		$('#overlay-bg').fadeIn();
		$('#LoginForm').slideDown();
		$('#LoginForm').focus();
		
	});

	$('#modal-close-button-a').click(function(e){
		$('#modal-open-button-a').prop('disabled',false);
		$('#LoginForm').slideUp();
		$('#overlay-bg').fadeOut();
	});

	$('#overlay-bg').click(function(){
		
		$('#modal-open-button-a').prop('disabled',false);
		$('#LoginForm').slideUp();
		$('#overlay-bg').fadeOut();
	
	});	
		$('#LoginSubmit').click(function(d){
		d.preventDefault();
		var a=0;
		var form = $('#LoginForm');
		var test = 'John';
		var username = $('#usernamel').val();
		var password = $('#passwordl').val();
		
			$.ajax({
				type: 'POST',
				url: '/login_process',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				success:function(data) {
					if(test == 'John')
					{
						$('#usernamel').css('border-color','green','border-style','solid;');
						$('#passwordl').css('border-color','green','border-style','solid;');
						$('#erusername').html('');
						$('#erpassword').html('');
						$('#formerror').html('');
						
						$('html').load('/');
						
					}
				},
				error:function(data) {
					if(test == 'John')
					{
						if(username == '')
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#erusername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
						}
						else if(username.length < 3)
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#erusername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
						}

						else 
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erusername').html('');
							$('#formerror').html('<span style="color:red;">Unul dintre campurile username sau parola este gresit! </span>');
						}

						if(password == '')
						{
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erpassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
						}
						else if(password.length < 5)
						{
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erpassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
						}
						else 
						{
							
							$('#passwordl').css('border-color','default');
							$('#erpassword').html('');
						}


					}


				},
				statusCode:{
				403: function() {
			      $('#formerror').html('<span style="color:red;">Acest user a fost banat!</span>');
						
			    }
					}
		});
			
	});
});

</script>
<script type="text/javascript">

$(document).ready(function(){
	$('#modal-open-button-i').click(function(e){
		$('#modal-open-button-i').prop('disabled',true);
		$('#RegisterForm').slideDown();
		$('#RegisterForm').focus();
		$('#overlay-bg').fadeIn();
	});

	$('#modal-close-button-i').click(function(e){
		$('#modal-open-button-i').prop('disabled',false);
		$('#RegisterForm').slideUp();
		$('#overlay-bg').fadeOut();
		$('#RegisterForm')[0].reset();
		$('#eusername').html('');
		$('#epassword').html('');
		$('#eemail').html('');
		$('#username').removeAttr( 'style' );
		$('#password').removeAttr( 'style' );
		$('#email').removeAttr( 'style' );
	});

	$('#overlay-bg').click(function(){
		
		$('#modal-open-button-i').prop('disabled',false);
		$('#RegisterForm').slideUp();
		$('#overlay-bg').fadeOut();
		$('#RegisterForm')[0].reset();
		$('#eusername').html('');
		$('#epassword').html('');
		$('#eemail').html('');
		$('#username').removeAttr( 'style' );
		$('#password').removeAttr( 'style' );
		$('#email').removeAttr( 'style' );
	
	});	


	
	$('#RegisterSubmit').click(function(e){
		e.preventDefault();
		var form = $('#RegisterForm');
		var testt = 'John'
		var valid = '';
			var username = $('#username').val();
			var password = $('#password').val();
			var email = $('#email').val();
			var k = 0;
			$.ajax({
				type: 'POST',
				url: '/register_process',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				success:function(data) {
						$('html').load('/');	
				},
				error:function() {
					if(testt == 'John')
					{
						 if(username == '')
						{
							$('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
						}

						else if(username.length < 3)
						{
							$('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
						}

						else 
						{
							k++;
							$('#username').css('border-color','green','border-style','solid;');
							$('#eusername').html('');
						}

						if(password == '')
						{
							$('#password').css('border-color','red','border-style','solid;');
							$('#epassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
						}

						else if(password.length < 5)
						{
							$('#password').css('border-color','red','border-style','solid;');
							$('#epassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
						}

						else 
						{
							k++;
							$('#password').css('border-color','green','border-style','solid;');;
							$('#epassword').html('');
						}

						

						 if(email == '' || email.indexOf('@')==-1 || email.indexOf('.')==-1)
						{
							$('#email').css('border-color','red','border-style','solid;');
							$('#eemail').html('<span style="color:red;">Trebuie sa introduci un email valid</span>');
						}

						else
						{
							
							$('#email').css('border-color','green','border-style','solid;');
							$('#eemail').html('');
						}
					}
				},
				statusCode:{
				404: function() {
			      $('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Acest username deja a fost luat</span>');	
			    },
			    405: function() {
			      $('#email').css('border-color','red','border-style','solid;');
							$('#eemail').html('<span style="color:red;">Acest email deja a fost luat</span>');	
			    },
			    406: function() {
			      $('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Acest username deja a fost luat</span>');	
			      $('#email').css('border-color','red','border-style','solid;');
							$('#eemail').html('<span style="color:red;">Acest email deja a fost luat</span>');	
			    }
					
					}
				
				
			});
			
			

		

			//$('#RegisterForm')[0].reset();
		
	});
});



</script>



<link rel="stylesheet" type="text/css" href="/css.css">
<title></title>
</head>
<body >
	<script type="text/javascript" src="/js/jqueryqtip.js"></script>
	<link href='/css/jqueryqtip.css' rel='stylesheet' />
<nav>	
	<div class = "stanga">

 <a href = "/" value = "Acasa">Acasa</a>
 <a href = "/topicnou/" value = "TopicNou">Topic nou</a>
 <a href = "/toatetopicurile/" value = "ToateTopicurile">Toate Topicurile</a>
  <a href = "/cautaresite/" value = "ToateTopicurile">Cauta User</a>
	</div>
	<div class = "autreg">

@if (Auth::check())

<?php DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'1')); ?>


@if(Auth::user()->user_type == 'admin')
 <a  href = "/admin" id = "logout" name = "admin">Admin Page</a>
@endif
<?php echo '<a href="/profil/'.Auth::user()->username.'">Profil</a>'; ?>

  <a class = "log" href = "/logout" id = "logout" name = "logout">LogOut</a>
                        
@else
  <a class = "aut" value = "Autentificare" id = "modal-open-button-a">Autentificare</a>
  <a class = "reg" value = "Inregistrare" id = "modal-open-button-i">Inregistrare</a>
 
@endif
</div>
</nav>

<form style = "outline:0;"  id = "RegisterForm" class="form-horizontal" action = "register_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-i" type="button" value = "&#10006;">

	<div class="form-group">
		<label class = "col" for = "username" >Username:</label>
	 <div class = "col">
		<input  id = "username" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="eusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "password">Password:</label>
	 <div class = "col">
		<input id = "password" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="epassword"></div>
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "email">Email:</label>
	 <div class = "col">
		<input id = "email" class="{{ $errors->has('email') ? 'has-error' : '' }}" type = "email" name = "email"value="{{ Input::old('email') }}"></input><br>
		
		<div id="eemail"></div>
	 </div>
	</div>
		
		<input class = "btnNou" id= "RegisterSubmit" type = "submit" value = "Inregistrare"></input>
	</form>
<div id = "overlay-bg"></div>



<form style = "outline:0;"  id = "LoginForm" class="form-horizontal" action = "login_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-a" type="button" value = "&#10006;">
<div id = "formerror" class = "lol"></div>
	<div class="form-group">
		<label class = "col" for = "username" >Username:</label>
	 <div class = "col">
		<input id = "usernamel" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="erusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "password">Password:</label>
	 <div class = "col">
		<input id = "passwordl" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="erpassword"></div>
	 </div><br>
	 <input style = "cursor:pointer"name = "remember" id = "remember" type = "Checkbox">
<label style = "cursor:pointer" for = "remember">Remeber me</label><br>
	</div>

		<br>
		<input style = "margin-left:200px;"class = "btnNou" id= "LoginSubmit" type = "submit" value = "Autentificare"></input>
	<a class = "btnNou" href="recuperareparola">Ti-ai uitat parola ?</a>
	</form>



















<?php if(Request::segment(2))
{
	if(!Auth::check()){header('location:/');die();}
$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();


	if (count($snail)!= 0 )
{
	echo '<style>

	.nav-link2 .icon{color:red;}
	</style>';
}
if(Request::segment(2) == Auth::user()->username ){?>


<head>
@include ('js')
<link rel="stylesheet" type="text/css" href="/css.css">
<title>
	@if(Auth::check())
	<?php $user=Auth::user(); 
		  echo $user->username; 
	?>
	@else
	<?php header('location: /'); die(); ?>
	@endif
</title>

<script type="text/javascript">
$(document).ready(function (){
		
		$('.nav-link').hover(function () {
		$('.arrow-right').fadeIn(50);

	});
		/* $('.nav-link2').hover(function () {
			$('.arrow-right').animate({'marginTop' : "+=44px"});
		});*/
		$('.nav-link').mouseleave(function () {
		$('.arrow-right').hide(1);
	});
		$('.nav-link2').hover(function () {
		$('.arrow-right2').fadeIn(50);

	});
		$('.nav-link2').mouseleave(function () {
		$('.arrow-right2').hide(1);
	});
		$('.nav-link3').hover(function () {
		$('.arrow-right3').fadeIn(50);

	});
		$('.nav-link3').mouseleave(function () {
		$('.arrow-right3').hide(1);
	});
		$('.nav-link4').hover(function () {
		$('.arrow-right4').fadeIn(50);

	});
		$('.nav-link4').mouseleave(function () {
		$('.arrow-right4').hide(1);
	});
		$('.nav-link5').hover(function () {
		$('.arrow-right5').fadeIn(50);

	});
		$('.nav-link5').mouseleave(function () {
		$('.arrow-right5').hide(1);
	});
		$('.nav-link6').hover(function () {
		$('.arrow-right6').fadeIn(50);

	});
		$('.nav-link6').mouseleave(function () {
		$('.arrow-right6').hide(1);
	});
		$('.nav-link7').hover(function () {
		$('.arrow-right7').fadeIn(50);

	});
		$('.nav-link7').mouseleave(function () {
		$('.arrow-right7').hide(1);
	});

	
});


</script>
<?php $email = Auth::user()->email ?>

<script type="text/javascript">

	$(document).ready(function() {
		$('#SchimbareEmail').click(function() {
			$('#EmailForm').slideToggle(200);
		});

		$('#EmailSubmit').click(function (e){
		e.preventDefault();
			var NoulEmail = $('#NoulEmail').val();
			var ParolaActuala = $('#ParolaActuala').val();
			var test = 'John';
			var form = $('#EmailForm');
			var username = '<?php Auth::user()->username ?>';
			

			function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
 
			$.ajax({
				type: 'POST',
				url: '/EditEmail',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode: {
				    404: function() {
				     $('#NoulEmail').css('border-color','red','border-style','solid;');
							$('#eNoulEmail').html('<span style="font-size:15px;color:red;">Acest email deja a fost luat</span>');
				    }
					
				},
				statusCode: {
				    403: function() {
				     $('#ParolaActuala').css('border-color','red','border-style','solid;');
							$('#eParolaActuala').html('<span style="font-size:15px;color:red;">Parola introdusa este gresita</span>');
				    }
					
				},
				error:function(data) {
						
						 if (!IsEmail(NoulEmail) )
						{
							$('#NoulEmail').css('border-color','red','border-style','solid;');
							$('#eNoulEmail').html('<span style="font-size:15px;color:red;">Trebuie sa introduci un email valid</span>');
						}

						else
						{
							
							$('#NoulEmail').css('border-color','green','border-style','solid;');
							$('#eNoulEmail').html('');
						}
				},
				success:function(data) {
					$('#NoulEmail').css('border-color','green','border-style','solid;');
							$('#eNoulEmail').html('');
					window.location.href=window.location.href;
				}	
		});
});
	});	



</script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#SchimbareParola').click(function () {
			$('.SchimbareParolaInputs').slideToggle(200);
	});

		$('#ParolaSubmit').click(function (p){
		p.preventDefault();
			var NouaParola = $('#NouaParola').val();
			var ParolaActuala2 = $('#ParolaActuala2').val();
			var form = $('#ParolaForm');
			var NouaParola2 = $('#NouaParola2').val();
			var k = 0;
			
			$.ajax({
				type: 'POST',
				url: '/EditParola',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode: {
				    403: function() {
				    	
				    	$('#ParolaActuala2').css('border-color','red','border-style','solid;');
						$('#eParolaActuala2').html('<span style="font-size:15px;color:red;">Parola introdusa este gresita</span>');
						
				    }
					
				},
				
				error:function(data) {
					

					if(NouaParola2 != NouaParola)
					{
						$('#eNouaParola2').css('border-color','red','border-style','solid;');
						$('#eNouaParola2').html('<span style="font-size:15px;color:red;">Noua parola nu este asemanatoare</span>');
					}

					if(NouaParola2 == NouaParola)
					{
						$('#eNouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
					}
				
					if(NouaParola.length < 5)
					{
						$('#NouaParola').css('border-color','red','border-style','solid;');
						$('#eNouaParola').html('<span style="font-size:15px;color:red;">Trebuie introduse cel putin 4 caractere</span>');
					
					}
					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
					
					}
				},
				success:function(data) {
					 if(data['status'] == "parola_buna") {
             			
						$('#ParolaActuala2').removeAttr('style');
						$('#eParolaActuala2').html('');
						k++;
        			}
        			if(NouaParola2 == NouaParola)
					{
						$('#NouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
						k++
					}

					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
						k++
					
					}
        			
        		
					
					if(k==3)
					{window.location.href=window.location.href;}
			}
		});
	});
});

</script>
<script type="text/javascript">
		
		$(document).ready(function() {

			$('.Compune').click(function() {
				$('#MesajeForm').slideToggle(300);
			});

			$('#MesajSubmit').click(function (a) {
				a.preventDefault();
				var form = $('#MesajeForm');
				var catre = $('#catre').val();
				var subiect = $('#subiect').val();
				var user = '<?php echo Auth::user()->username  ?>';


			$.ajax({
				type: 'POST',
				url: '/TrimiteMesaj',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				error:function(data) {

					
					if(user == catre)
					{
						$('#catre').css('border-color','red','border-style','solid;');
						$('#eCatre').html('<span style="font-size:15px;color:red;">Nu iti poti trimite mesaj tie insuti</span>');
					}

					else if (catre == '')
					{
						$('#catre').css('border-color','red','border-style','solid;');
						$('#eCatre').html('<span style="font-size:15px;color:red;">Trebuie sa introduci un destinatar</span>');
					}


					if(subiect == '')
					{
						$('#subiect').css('border-color','red','border-style','solid;');
						$('#eSubiect').html('<span style="font-size:15px;color:red;">Trebuie sa intrduci un subiect</span>');
					
					}
				},
				success:function(data) {
					window.location.href=window.location.href;
				}

			});


			});
});




</script>
<script type="text/javascript">

$(document).ready(function() {

	var destinatar = '<?php 
if(Request::segment(5))
	{ $segment = Request::segment(5);
	 $mesaj = DB::table("mesaje")->where("mesaj_id",$segment)->first();
	 $expeditor_id = $mesaj->expeditor_id;
	 $user = DB::table("users")->where("user_id",$expeditor_id)->first();
	echo $user->username;}



	?>';

	$('#Raspunde').click(function() {
		$('#MesajeForm').slideToggle(200);
		$('#catre').val(destinatar);
	});
});



</script>
</head>

<body>


<div class = "PanouControl">
	
	
<?php if(Auth::user()){?>
<?php if(Auth::user()->image ){?>
<script src='/js/lightbox.js'></script>
	<a  data-lightbox="image-1" href = "/<?php echo Auth::user()->image; ?>"><img  style = "padding:8px;
border:solid;
border-color: #dddddd #aaaaaa #aaaaaa #dddddd;
border-width: 1px 2px 2px 1px;
background-color:white;position:relative;left:40px;"width= "278" height = "230" src="/<?php echo Auth::user()->image; ?>"></a>


<?php } else {?>


<img width = "300px" height = "300px" id = "thumb" src="/images/noimage.jpg">

<?php }?>
<?php } else {header('location:/');die();}?>
	<ul>

		<?php 
		//$huser = DB::table('users')
		$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();
	?>
		<li><a class = "nav-link" href = "/profil/{{Auth::user()->username}}/setarilecontului"><span class = "icon">&#128295;</span><span class = "separator"></span>Setarile contului</a></li>
		<li><a class = "nav-link2" href = "/profil/{{Auth::user()->username}}/mesaje"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Mesaje <?php if(count($snail) != 0)echo '('.count($snail).' noi)'; ?></a></li>
		<li><a class = "nav-link3" href = "/profil/{{Auth::user()->username}}/trimite-mesaj"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Trimite Mesaj</a></li>
		<li><a class = "nav-link4" href = "/profil/{{Auth::user()->username}}/modificareimagine"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span>Modificare imagine</a></li>
		<li><a class = "nav-link5" href = "/profil/{{Auth::user()->username}}/datepersonale"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Datele Personale</a></li>
		<li><a class = "nav-link6" href = "/profil/{{Auth::user()->username}}/topicuriproprii"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Topicurile Mele</a></li>
		<li><a class = "nav-link7" href = "/profil/{{Auth::user()->username}}/raspunsuriproprii"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Raspunsurile Mele</a></li>
	
	<div class = "arrow-right"></div>
		<div class = "arrow-right2"></div>
		<div class = "arrow-right3"></div>
		<div class = "arrow-right4"></div>
		<div class = "arrow-right5"></div>
		<div class = "arrow-right6"></div>
		<div class = "arrow-right7"></div>
	</ul>
</div>

@yield('SetarileContului')

@yield('Mesaje')

@yield('Mesaj')

@yield('SchimbareImagine')

@yield('DatePersonale')




<?php } }?>


@if(Auth::user() && Auth::user()->user_type == 'admin' && Request::segment(1) == 'admin')

<div class = "PanouControl">
	<ul>

		<?php //else if( Request::segment(1) != 'admin') {header('location: /');die();}
		//$huser = DB::table('users')
		$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();
	?>
		<li><a class = "nav-link" href = "/admin/totiuserii"><span class = "icon">&#128295;</span><span class = "separator"></span>Toti userii</a></li>
		<li><a class = "nav-link2" href = "/admin/introducerecategorii"><span style = "color:black;display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Introducere categorii</a></li>
		<li><a class = "nav-link3" href = "/profil/{{Auth::user()->username}}/modificareimagine"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span>Modificare imagine</a></li>
		<li><a class = "nav-link4" href = "/profil/{{Auth::user()->username}}/datepersonale"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Datele Personale</a></li>
	<div class = "arrow-right"></div>
		<div class = "arrow-right2"></div>
		<div class = "arrow-right3"></div>
		<div class = "arrow-right4"></div>
	</ul>
</div>

@yield('IntroducereCategorii')
@endif

@if(Auth::user() && Request::segment(1) == 'topicnou')

@yield('TopicNou')

@endif

@if(Auth::user() && Request::segment(1) == 'toatetopicurile')

@yield('ToateTopicurile')

@endif

@if(Auth::user() && Request::segment(1) == 'cauta')

@yield('TopicSearch')

@endif

@if(Auth::user() && Request::segment(1) == 'topic')

@yield('Topic')

@endif

@if(Auth::check() && Request::segment(3) == 'topicuriproprii')

@yield('TopicurileMele')

@endif

@if(Auth::check() && Request::segment(3) == 'raspunsuriproprii')

@yield('RaspunsurileMele')

@endif

@if(Auth::check() && Request::segment(1) == 'cautaresite')

@yield('CautareSite')

@endif

@if(Auth::check() && Request::segment(1) == 'cautare')

@yield('RezultateCautare')

@endif

@if(Auth::check() && Request::segment(3) == 'trimite-mesaj')

@yield('TrimiteMesaj')

@endif
</body>
</html>
