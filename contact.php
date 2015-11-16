<?php
$subjectPrefix = '[Contact du Site]';
$emailTo = 'yann@omnireso.com';
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name    = stripslashes(trim($_POST['nom']));
    $email   = stripslashes(trim($_POST['email']));
    $phone   = stripslashes(trim($_POST['tel']));
      $agenda   = stripslashes(trim($_POST['agenda']));
    $site   = stripslashes(trim($_POST['site']));
    $subject = stripslashes(trim($_POST['sujet']));
    $message = stripslashes(trim($_POST['message']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';
    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }
    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);
    if($name && $email && $emailIsValid && $subject && $message){
        $subject = "$subjectPrefix $subject";
        $body = "Nome: $name <br /> Email: $email <br /> Telefone: $phone <br /> Mensagem: $message";
        $headers  = "MIME-Version: 1.1" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
        $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
        $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
        $headers .= "From: " . "=?UTF-8?B?".base64_encode($name)."?=" . "<$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
        $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;
        mail($emailTo, "=?utf-8?B?".base64_encode($subject)."?=", $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="fr" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# profile: http://ogp.me/ns/profile#">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" media="screen">
 <title>Contactez Philippe Morel artiste peintre amateur Auvergnat</title>
 <meta name="description" content="Si un des tableaux de la galerie de peinture du peintre amateur Philippe Morel vous intéresse, vous pouvez communiquez avec l'auteur sur cette page.">
<link rel="icon" href="favicon.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="publisher" href="https://plus.google.com/+Philmorel63"/>
<meta property="og:locale" content="fr_FR" />
<meta property="og:locale:alternate" content="en_GB" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Peintre" />
<meta property="og:description" content="Tableaux et peintures" />
<meta property="og:url" content="http://www.philmorel.com/" />
<meta property="og:site_name" content="Philippe Morel" />
<meta property="article:publisher" content="https://www.facebook.com/Philippe-Morel-1426386287685982/" />
<meta name="twitter:card" content="summary"/>
<meta name="twitter:description" content="Peintures et tableaux de paysages"/>
<meta name="twitter:title" content="Peintures d'Auvergne"/>
<meta name="twitter:site" content="@philmorel"/>

<link rel="next" href="http://www.philmorel.com/actu.php" />
<link rel="canonical" href="http://www.philmorel.com/presse.php" />

<!-- nom prenom tel email agenda message site //-->


<link href="css/bootstrap.min.css" rel="stylesheet">

<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- <script src="https://github.com/twbs/bootstrap/blob/master/docs/assets/js/ie-emulation-modes-warning.js></script> -->

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="philmorel.css" rel="stylesheet" type="text/css">

  </head>


  <body id="philmorel">

   <div class="jumbotron">

  <section>

  <header>

      
                 
          <div id="logo">
            <a href="/">
                              <img src="logo.jpg" alt="Accueil philmorel.com" width="120" height="118">
            </a>
          </div>
          </header>
          
          </section>
          
          <nav>


              <ul><li><a href="http://www.philmorel.com/philippe-morel.php" hreflang="fr">A propos</a>
                   </li>
	                 <li><a href="http://www.philmorel.com/tableaux.php" hreflang="fr" title="galerie de tableaux" class="active">Tableaux et peintures</a></li>
	     	            <li><a href="http://www.philmorel.com/actu.php" hreflang="fr" title="expositions passées et à venir">Actualité et expositions</a></li>
		                <li><a href="http://www.philmorel.com/presse.php" hreflang="fr" title="article de presse et récompenses">Revue de presse</a></li>
                    <li><a href="http://www.philmorel.com/contact.php" hreflang="fr" title="formulaire de contact">Contactez Philippe Morel</a></li>
                     <li><a href="http://www.philmorel.com/livredor.php" hreflang="fr" title="Laissez vos impressions">Livre d'Or</a></li>
                     <li><a href="http://www.philmorel.com/mentions.php" hreflang="fr" title="éditeur et hebergeur du site et CGU">Mentions légales du site</a></li>
                   <li><a href="http://www.philmorel.com/en/" hreflang="en" title="version anglaise">English Version</a></li></ul>



        </nav>


 <main>

<section>



 
               
                          
  <article>
  
  
  <h1>Contact</h1>
 

 
 <script language="JavaScript" type="text/javascript">
  function decode(a) {
       return a.replace(/[a-zA-Z]/g, function(c){
      return String.fromCharCode((c <= "Z" ? 90 : 122) >= (c = c.charCodeAt(0) + 13) ? c : c - 26);
    })
  }; 
 
 document.write("<a href=" + decode("cuvyvccrzbery@ahzrevpnoyr.se") + ">" + "Cliquez pour l'adresse" + "</a>" + "<br>");
 
</script>

<p>(Système de protection antispam)</p>

<?php if(!empty($emailSent)): ?>

 <div class="alert alert-success text-center">Votre message a bien été envoyé, merci ! Nous vous répondrons dans les meilleurs délais.</div> 


  <?php else: ?>
        <?php if(!empty($hasError)): ?>
        <div class="col-md-5 col-md-offset-4">
            <div class="alert alert-danger text-center">Le serveur a rencontré un problème et votre formulaire n'a pas pu être envoyé. Merci de ré-essayer ultérieurement.</div>
        </div>
        <?php endif; ?>

<div class="col-md-6 col-md-offset-3">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contactform" class="form-horizontal" role="form" method="post">
<p>Vous souhaitez contacter l'artiste peintre amateur Philippe Morel, pour connaître le prix d'un tableau, organiser une exposition, ou pour poser une question liée à la peinture ? Merci de remplir les champs ci-dessous. Les zones de saisies suivies d'une astérisque sont obligatoires.</p>

    

<fieldset>
  
<legend>Informations personnelles</legend>

<p><label for="nom">Votre nom : </label>
<input id="nom" type="text" placeholder="votre nom">
<label for="prenom">Votre prénom : </label>
<input id="prenom" type="text" placeholder="votre prenom"></p>
<p><label for="email">Email <sup>*</sup>: <input type="email" placeholder="email" id="email" required></label>

<label for="tel">Tel : <input type="tel" placeholder="0473102030" id="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" maxlength="10"></label></p>

<label for="agenda">Votre jour de contact préféré : <input type="date" id="agenda"></label>

<p>Si vous possédez un site et souhaitez m'en informer : <label for="site"><input type="url" name="website" placeholder="http://philmorel.com/" id="site"></label></p>

Votre message ci-dessous *<br />
<textarea name="message" placeholder="Votre message ici" autocomplete="on" wrap="hard" rows="10" cols="50" spellcheck="on" required="1"></textarea>


<input type="submit" value="envoyer" class="btn btn-default">


</fieldset>


    </form>
        Votre email ne sera pas revendu ou cédé à un tiers.
        Conformément à la loi informatique et libertés modifiée (voir nos <a href="mentions.php" hreflang="fr">mentions légales</a>), vous avez un droit de...




 
 
                
          
      </article>
      
      
         
      


<aside></aside>

</section>

</main>



      <footer>
      <div id="pied">
  <p id="breadcrumbs"><a href="http://philmorel.com/">Artiste peintre</a></p>
   <p>&copy; Philmorel.com 2015 Recueil des travaux artistiques de Philippe Morel</p>
      </div>

     
  </footer>

   <?php endif; ?>

    <!--[if lt IE 9]>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!--<![endif]-->
 <!--   <script type="text/javascript" src="contactform.js"></script> -->

 </div>
    
  </body>
</html>