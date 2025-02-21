<?php

namespace App\Controller;

use App\Entity\TVotePresident;
use App\Repository\TVotePresidentRepository;
use App\Repository\TVoteSecretaireGeneralAdjointRepository;
use App\Repository\TVoteSecretaireGeneralRepository;
use App\Repository\TVoteTresorierGeneralAdjointRepository;
use App\Repository\TVoteTresorierGeneralRepository;
use App\Repository\TVoteVicepresidentRepository;
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

        return $this->redirectToRoute('vote_vicepresident', ['id' => $user->getId()]);
    }
    //vice-president
    #[Route('/vote/vicepresident/{id}', name: 'vote_vicepresident')]
    public function voteVicePresident($id, TVoteVicepresidentRepository $tVoteVicepresidentRepository): Response
    {
        $user = $tVoteVicepresidentRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/vicepresident.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/vicepresident/{id}/submit', name: 'vote_vicepresident_vote')]
    public function submitVoteVP(Request $request, $id, TVoteVicepresidentRepository $tVoteVicepresidentRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVoteVicepresidentRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        $session->set('vicepresident',$vote);
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

        return $this->redirectToRoute('vote_secretaireadjoint', ['id' => $user->getId()]);
    }
    //vicesecretaire
    
    #[Route('/vote/secretaireadjoint/{id}', name: 'vote_secretaireadjoint')]
    public function voteSecretaireAdjoint($id, TVoteSecretaireGeneralAdjointRepository $tVoteSecretaireGeneralAdjointRepository): Response
    {
        $user = $tVoteSecretaireGeneralAdjointRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/secretaireadjoint.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/secretaireadjoint/{id}/submit', name: 'vote_secretaireadjoint_vote')]
    public function submitVoteSA(Request $request, $id,  TVoteSecretaireGeneralAdjointRepository $tVoteSecretaireGeneralAdjointRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVoteSecretaireGeneralAdjointRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $session->set('secretaireAdjoint',$vote);
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

        $session->set('tresorier',$vote);
        $user->setEtatVote(1); // L'électeur a voté
        $user->{'set'.$vote}(1);   // Met à jour le compteur du candidat choisi
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return $this->redirectToRoute('vote_tresorieradjoint', ['id' => $user->getId()]);
    }
    //tresorerieAdjoint
    #[Route('/vote/tresorieradjoint/{id}', name: 'vote_tresorieradjoint')]
    public function voteTresorierAdjoint($id, TVoteTresorierGeneralAdjointRepository $tVoteTresorierGeneralAdjointRepository): Response
    {
        $user = $tVoteTresorierGeneralAdjointRepository->find($id);
        if (!$user || $user->getEtatVote() == 1) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('vote/tresorierAdjoint.html.twig', [
            'user' => $user,
        ]);
    }
    #[Route('/vote/tresorieradjoint/{id}/submit', name: 'vote_tresorieradjoint_vote')]
    public function submitVoteTA(Request $request, $id, TVoteTresorierGeneralAdjointRepository $tVoteTresorierGeneralAdjointRepository, EntityManagerInterface $entityManagerInterface, SessionInterface $session, MailerInterface $mailer): Response
    {
        $vote = $request->request->get('vote');
        $user = $tVoteTresorierGeneralAdjointRepository->find($id);

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $user->setEtatVote(1); // L'électeur a voté
        $user->{'set'.$vote}(1);   // Met à jour le compteur du candidat choisi
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        $voterEmail = $user->getLoginEmail();
        $presidentChoice = $session->get('president');
        $vicepresidentChoice = $session->get('vicepresident');
        $secretaryChoice = $session->get('secretaire');
        $secretaryadjointChoice = $session->get('secretaireAdjoint');
        $tresorierChoice = $session->get('tresorier');
        $treasurerChoice = $vote;
        
        // Création du contenu de l'email
        $content = "Login : $voterEmail\n" .
                "Récapitulatif de votre vote.\n" .
                "Président : $presidentChoice\n" .
                "Vice-Président : $vicepresidentChoice\n" .
                "Secrétaire général(e) : $secretaryChoice\n" .
                "Trésorier(e) général(e) : $treasurerChoice";

        $email = (new Email())
            ->from('tapamotapamo5@gmail.com')
            ->to($voterEmail)
            ->subject('Votre vote a été validé')
            ->text($content)
            ->html("<p>$content</p>");

        // Envoi de l'email
        $mailer->send($email);

        return $this->redirectToRoute('app_login');
    }
}
