<?php




class User
{
    private $_id;
    public $_login;
    public $_email;
    public $_firstname;
    public $_lastname;
    public $_password;


    public function register( $login, $password, $email, $firstname,
    $lastname)
    {#Crée l’utilisateur en base de données. Retourne un tableau contenant l’ensemble des informations concernant l’utilisateur créé.


        $this->_login = $login;
        $this->_email = $email;
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_password= $password;

        $connect = mysqli_connect('localhost', 'root', '' , 'classes');
        $request = "INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES ('$login', '$password', '$email', '$firstname', '$lastname')";
        $query = mysqli_query($connect, $request);
    }
    public function connect($login, $password){
        $this->_login = $login;
        $this->_password = $password;

        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs";

        $query = mysqli_query($connect, $request); 
        $result = mysqli_fetch_all($query,MYSQLI_ASSOC);
        
        for ($i=0; isset($result[$i]); $i ++){
            $passwordcheck = $result[$i]['password'];
            $logincheck = $result[$i]['login'];
            if ($login == $logincheck && $password == $passwordcheck){
            echo "Vous êtes connecté ";
            }
            }
            if ($passwordcheck == FALSE) {
            echo "Erreur";
            }
}

    public function update($login, $password, $email, $firstname, $lastname){
    $log = $login;
    $this->login = $login;
    $this->password = $password;
    $this->email = $email;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $connect = mysqli_connect('localhost', 'root', '', 'classes');
    $request ="UPDATE utilisateurs SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login = '".$log."'";
    $query = mysqli_query($connect, $request);
    
    echo "L'utilisateur a bien été mis à jour";
    }

    public function disconnect(){
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs";
        mysqli_close($connect);
        echo "Vous êtes déconnecté";
    #déconnecte l'utilisateur
}

    public function delete(){
        
        $login = $this->login;
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "DELETE FROM utilisateurs WHERE login = '".$login."'"; #!mysql conq
        $query = mysqli_query($connect, $request);
}       #Supprime et déconnecte l’utilisateur.


    public function isConnected(){  

    #Retourne un booléen permettant de savoir si un utilisateur est connecté ou non.

}
public function refresh(){
 
}

    public function getAllInfos(){
        $login = $this->login;        
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_assoc($query);
        var_dump($result);
        return ($result);
    #Retourne un tableau contenant l’ensemble des informations de l’utilisateur.

}
    public function getLogin(){
        $login = $this->login; 
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_assoc($query);
        echo $login ;
        #Retourne le login de l’utilisateur connecté.   

}
    public function getEmail(){
        $login = $this->login; 
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_assoc($query);
        echo $result['email'] ;
    #Retourne l’adresse email de l’utilisateur connecté.

}
    public function getFirstname(){
        $login = $this->login; 
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_assoc($query);
        echo $result['firstname'] ;
    #Retourne le firstname de l’utilisateur connecté.

}
public function getLastname(){
        $login = $this->login; 
        $connect = mysqli_connect('localhost', 'root', '', 'classes');
        $request = "SELECT * FROM utilisateurs WHERE login = '$login'";
        $query = mysqli_query($connect, $request);
        $result = mysqli_fetch_assoc($query);
        echo $result['lastname'] ;
    #Retourne le lastname de l’utilisateur connecté.

}
}


