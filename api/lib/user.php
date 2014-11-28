<?php
/**
 * Created by PhpStorm.
 * User: azaejae
 * Date: 28/11/2014
 * Time: 11:16
 */

class User {
//Property

    private $_username;
    private $_password;
    private $_nama;
    private $_email;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    /**
     * @return mixed
     */
    public function getNama()
    {
        return $this->_nama;
    }

    /**
     * @param mixed $nama
     */
    public function setNama($nama)
    {
        $this->_nama = $nama;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }



} 