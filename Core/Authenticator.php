<?php

namespace Core;
use Core\Database;
use Core\Session;

class Authenticator {

    public function attempt($email, $password) {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
            ])->find();

            if($user) {

                if(password_verify($password, $user['password'])) {
                    $this->login([
                        'email' => $email
                    ]);
                
                    return true;
                }
            }
        }

        public static function login($user) {
                $_SESSION['user'] = [
                    'user' => $user['email']
                ];
            
                session_regenerate_id(true);
            }
            
        public static function logout() {
                Session::destroy();
            }
    }