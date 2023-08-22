<?php


namespace app\controllers;
use models\Database;
use models\User;

class AuthController extends Database
{
    /**
     * Méthode pour enregistrer un nouvel utilisateur
     * @param string $firstnameInput Prénom de l'utilisateur
     * @param string $lastnameInput Nom de l'utilisateur
     * @param string $nicknameInput Surnom de l'utilisateur
     * @param string $emailInput Adresse e-mail de l'utilisateur
     * @param string $passwordInput Mot de passe de l'utilisateur
     */
    public function register(string $firstnameInput, string $lastnameInput, string $nicknameInput, string $emailInput, string $passwordInput)
    {
        try {
            // Validation des entrées utilisateur
            if (empty($firstnameInput) || empty($lastnameInput) || empty($nicknameInput) || empty($emailInput) || empty($passwordInput)) {
            throw new FormValidationException('Formulaire non complet');
            }

            // Nettoyage et traitement des entrées
            $firstname = htmlspecialchars($firstnameInput);
            $lastname = htmlspecialchars($lastnameInput);
            $nickname = htmlspecialchars($nicknameInput);
            $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
            $passwordHash = password_hash($passwordInput, PASSWORD_DEFAULT);

            // Enregistrement de l'utilisateur dans la base de donées
            Database::query(
            "INSERT INTO Users (firstname, lastname, nickname, email, password) VALUES (?, ?, ?, ?, ?)",
            [$firstname, $lastname, $nickname, $email, $passwordHash]
            );

            // Envoie de l'e-mail de confirmation
            EmailService::sendConfirmationEmail($email, $nickname);

            // Enregistrement de l'utilisateur dans la session
            $_SESSION['Users']=[
                'id' => Database::lastInsertId(),
                'nickname' => $nickname,
                'email' => $email
            ];

            // Redirection réussie
            http_response_code(302);
            header('Location: /');
            exit;

        } catch (FormValidationException $e) {
            ErrorHandler::handleError($e, "Erreur de validation de formulaire : " . $e->getMessage());
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Exception inattendue : " . $e->getMessage());
        } 
    }

    /**
     * Méthode pour afficher le formulaire d'inscription
     */
    public function showRegistrationForm()
    {
        try {
            // Inclusion des vues nécessaires pour le formulaire d'inscription
            include '../app/views/layout/header.view.php';
            include '../app/views/components/register.view.php';
            include '../app/views/layout/footer.view.php';

        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de l'affichage du formulaire d'inscription");
        }
    }

    /**
     * Méthode pour connecter un utilisateur
     * @param string $nicknameInput Surnom de l'utilisateur
     * @param string $passwordInput Mot de passe de l'utilisateur
     */
    public function login(string $nicknameInput, string $passwordInput)
    {
        try {
            // Validation des entrées utilisateur
            if (empty($nicknameInput) || empty($passwordInput)) {
                throw new FormValidationException('Formulaire incomplet');
            }

            $nickname = htmlspecialchars($nicknameInput);

            // Récupération de l'utilisateur depuis la base de données
            $stmt = Database::query(
                "SELECT * FROM Users WHERE nickname = ?",
                [$nickname]
            );

            $user = $stmt->fetch();

            // Vérification de l'existence de l'utilisateur
            if (empty($user)) {
                throw new AuthException("Mauvais nom d'utilisateur");
            }

            // Vérification du mot de passe
            if (password_verify($passwordInput, $user['password']) === false) {
                throw new AuthException("Mauvais mot de passe");
            }

            // Enregistrement de l'utilisateur dans la session
            $_SESSION['Users'] = [
                'id' => $user['id'],
                'nickname' => $nickname,
                'email' => $user['email']
            ];

            // Redirection réussie
            http_response_code(302);
            header('Location: /');
            exit;

        } catch (FormValidationException $e) {
            ErrorHandler::handleError($e, "Erreur de validation du formulaire : " . $e->getMessage());
        } catch (AuthException $e) {
            ErrorHandler::handleError($e, "Erreur d'authentification : " . $e->getMessage());
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Exception inattendue : " . $e->getMessage());
        }
    }

    /**
     * Méthode pour afficher le formulaire de connexion
     */
    public function showLoginForm()
    {
        try {
            // Inclusion des vues nécessaires pour le formulaire de connexion
            include '../app/views/layout/header.view.php';
            include '../app/views/components/login.view.php';
            include '../app/views/layout/footer.view.php';
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de l'affichage du formulaire de connexion");
        }
    }

    /**
     * Méthode pour déconnecter l'utilisateur
     */
    public function logout()
    {
        try {
            // Supprimer les données de session de l'utilisateur
            unset($_SESSION['Users']);
            
            // Redirection vers la page d'accueil
            http_response_code(302);
            header('Location: /');
            exit;
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de la déconnexion : " . $e->getMessage());
        }
    }

    /**
     * Méthode pour afficher le formulaire de mise à jour du profil
     */
    public function showUpdateProfileForm()
    {
        try {
            // Instanciation du modèle d'utilisateur
            $userModel = new User();

            // Récupération des données utilisateur
            $userData = $userModel->getByUsername($_SESSION['Users']['nickname']);

            // Inclusion des vues pour le formulaire de mise à jour du profil
            include '../app/views/layout/header.view.php';
            include '../app/views/components/updateProfile.view.php';
            include '../app/views/layout/footer.view.php';
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de l'affichage du formulaire de mise à jour du profil");
        }
    }


    /**
     * Méthode pour mettre à jour le profil de l'utilisateur
     * @param string $firstname Prénom de l'utilisateur
     * @param string $lastname Nom de l'utilisateur
     * @param string $nickname Surnom de l'utilisateur
     * @param string $email Adresse e-mail de l'utilisateur
     * @param string $password Mot de passe de l'utilisateur
     */
    public function updateProfile(string $firstname, string $lastname, string $nickname, string $email, string $password)
    {
        try {
            // Instanciation du modèle d'utilisateur
            $userModel = new User();
            
            // Récupération des données utilisateur
            $userData = $userModel->getByUsername($_SESSION['Users']['nickname']);

            // Vérification du mot de passe
            if (password_verify($password, $userData['password'])) {
                // Mot de passe correct, mettre à jour les données du profil
                $userModel->updateProfile($_SESSION['Users']['nickname'], $firstname, $lastname, $nickname, $email);

                // Mettre à jour les données de session
                $_SESSION['Users']['nickname'] = $nickname;
                $_SESSION['Users']['email'] = $email;

                // Redirection vers la page de profil mise à jour
                http_response_code(302);
                header('Location: /profile');
                exit;
            } else {
                // Mot de passe incorrect, afficher une erreur
                $error = "Le mot de passe actuel est incorrect. Veuillez réessayer.";

                // Inclusion des vues pour le formulaire de mise à jour du profil avec l'erreur
                include '../app/views/layout/header.view.php';
                include '../app/views/components/updateProfile.view.php';
                include '../app/views/layout/footer.view.php';
            }
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de la mise à jour du profil : " . $e->getMessage());
        }
    }

    public function showProfile()
    {
        try {
            // Instanciation du modèle d'utilisateur
            $userModel = new User();

            // Récupération des données utilisateur
            $userData = $userModel->getByUsername($_SESSION['Users']['nickname']);

            // Inclusion de la vue du profil
            include '../app/views/layout/header.view.php';
            include '../app/views/components/profile.view.php';
            include '../app/views/layout/footer.view.php';
        } catch (\Exception $e) {
            ErrorHandler::handleError($e, "Erreur lors de l'affichage du profil");
        }
    }


    /**
     * Méthode pour afficher la page d'erreur 404
     */
    public function showError404()
    {
        include '../app/views/pages/error-404.view.php';
    }

    /**
     * Méthode pour afficher la page d'erreur 500
     */
    public function showError500()
    {
        include_once '../app/views/pages/error-500.view.php';
    }

    /**
     * Méthode de gestion des erreurs
     * @param \Throwable $e L'exception ou l'erreur rencontrée
     * @param string $message Le message d'erreur
     */
    private function handleError(\Throwable $e, string $message)
    {
        // Enregistrement de l'erreur dans les logs
        error_log($message);
        // Afficher un message d'erreur à l'utilisateur si nécessaire
        // Par exemple, vous pourriez rediriger l'utilisateur vers une page d'erreur spécifique.
        $this->showError500();
    }    
}