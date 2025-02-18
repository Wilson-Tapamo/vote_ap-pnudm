<?php

namespace App\Controller;

use App\Entity\TVotePresident;
use App\Repository\TVotePresidentRepository;
use App\Repository\TVoteSecretaireGeneralRepository;
use App\Repository\TVoteTresorierGeneralRepository;
use Doctrine\ORM\EntityManagerInterface;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\TextPart;

class SecurityController extends AbstractController
{
    #[Route('/', name: 'app_login')]
    public function login(Request $request, TVotePresidentRepository $tVotePresidentRepository, SessionInterface $session): Response
    {

        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $user = $tVotePresidentRepository->findOneBy(['login_email' => $email]);
        $error = '';
        if($user == null){
            if($email != null){
                $error = 'Login erroné, corrigez ou contactez l’administrateur';
            }
        }else{
            if($password != $user->getMotPasse()){
                $error = 'Mot de passe erroné, corrigez ou contactez l’administrateur';
            }
        }
        if ($user && $password == $user->getMotPasse()) {
            if ($user->getEtatVote() == 1) {
                return $this->render('login/already_voted.html.twig');
            }
            $session->set('user_id', $user->getId());
            $session->set('user_email', $user->getLoginEmail());
            return $this->redirectToRoute('vote_president', ['id' => $user->getId()]);
        }

        return $this->render('login/login.html.twig', [
            'error' => $error,
        ]);
    }

    #[Route('/vote/president/{id}', name: 'vote_president')]
    public function votePresident($id, TVotePresidentRepository $tVotePresidentRepository): Response
    {
        $user = $tVotePresidentRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/president.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/president/{id}/submit', name: 'vote_president_vote')]
    public function submitVote(Request $request, $id, TVotePresidentRepository $tVotePresidentRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVotePresidentRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $session->set('president',$vote);
        $user->setEtatVote(1); // L'électeur a voté
        $user->{'set'.$vote}(1);   // Met à jour le compteur du candidat choisi
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return $this->redirectToRoute('vote_secretaire', ['id' => $user->getId()]);
    }

    //secretaire

    #[Route('/vote/secretaire/{id}', name: 'vote_secretaire')]
    public function voteSecretaire($id, TVoteSecretaireGeneralRepository $tVoteSecretaireGeneralRepository): Response
    {
        $user = $tVoteSecretaireGeneralRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/secretaire.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/secretaire/{id}/submit', name: 'vote_secretaire_vote')]
    public function submitVoteS(Request $request, $id, TVoteSecretaireGeneralRepository $tVoteSecretaireGeneralRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVoteSecretaireGeneralRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $session->set('secretaire',$vote);
        $user->setEtatVote(1); // L'électeur a voté
        $user->{'set'.$vote}(1);   // Met à jour le compteur du candidat choisi
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return $this->redirectToRoute('vote_tresorier', ['id' => $user->getId()]);
    }

    //tresorerie
    #[Route('/vote/tresorier/{id}', name: 'vote_tresorier')]
    public function voteTresorier($id, TVoteTresorierGeneralRepository $tVoteTresorierGeneralRepository): Response
    {
        $user = $tVoteTresorierGeneralRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/tresorier.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/tresorier/{id}/submit', name: 'vote_tresorier_vote')]
    public function submitVoteT(Request $request, $id, TVoteTresorierGeneralRepository $tVoteTresorierGeneralRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session, MailerInterface $mailer): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVoteTresorierGeneralRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->setEtatVote(1); // L'électeur a voté
        $user->{'set'.$vote}(1);   // Met à jour le compteur du candidat choisi
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        $voterEmail = $user->getLoginEmail();
        $presidentChoice = $session->get('president');
        $secretaryChoice = $session->get('secretaire');
        $treasurerChoice = $vote;
        dd("Récapitulatif de votre vote.\n" .
                "Président : $presidentChoice\n" .
                "Secrétaire général(e) : $secretaryChoice\n" .
                "Trésorier(e) général(e) : $treasurerChoice");
        // Création du contenu de l'email
        $email = (new Email())
            ->from('noreply@vote_ap-pnudm')
            ->to($voterEmail)
            ->subject('Votre vote a été validé')
            ->text(
                "Login : $voterEmail\n" .
                "Récapitulatif de votre vote.\n" .
                "Président : $presidentChoice\n" .
                "Secrétaire général(e) : $secretaryChoice\n" .
                "Trésorier(e) général(e) : $treasurerChoice"
            );

        // Envoi de l'email
        $mailer->send($email);

        return $this->redirectToRoute('app_login');
    }
}
