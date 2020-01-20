<fieldset>

<legend>| Formulaire d'insertion en Base de données |</legend>

  <!-- L'attribut 'action' de la balise <form>, permet d'envoyer les données à traiter dans le fichier passé en valeur. -->
  <form action=".\Controlers\CheckDatasFormInsert_ctrl.php" method="POST">

    <label for="name">your name : 
      <input type="text" name="username" id="name" placeholder="votre nom" required >
    </label>

    <label for="password">password : 
      <input type="password" name="password" id="password" placeholder="mot de passe">
    </label>

    <label for="age">age : 
      <input type="number" name="age" min="0" max="99" id="age" placeholder="age">
    </label>
    
    <label for="mail">adresse mail : 
      <input type="email" name="email" id="mail" placeholder=".........@---.--">
    </label>

    <button class="btn_send">Envoyer</button>

  </form>

  </fieldset>
<br>
