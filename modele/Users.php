<?php

// ------ CREATION DE L'OBJET --------

class User{
    private int $id;
    private string $email;
    private string $username;
    private string $MdP;
    private string $role;
    



    // ------ method magique construct --------
    
    public function __construct($id, $email, $username, $MdP){
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->MdP = $MdP;
        
    }

    // ------ GETTER ET SETTER --------
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

  
    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

        /**
         * Get the value of MdP
         */ 
        public function getMdP()
        {
                return $this->MdP;
        }

        /**
         * Set the value of MdP
         *
         * @return  self
         */ 
        public function setMdP($MdP)
        {
                $this->MdP = $MdP;

                return $this;
        }


    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
}