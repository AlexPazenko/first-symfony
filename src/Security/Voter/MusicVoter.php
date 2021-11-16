<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class MusicVoter extends Voter
{
    protected function supports($attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, ['MUSIC_DELETE', 'MUSIC_VIEW'])
            && $subject instanceof \App\Entity\Music;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        $music = $subject;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case 'MUSIC_DELETE':
                return $user === $music->getSecurityUser();
                break;
            case 'MUSIC_VIEW':
                return $user === $music->getSecurityUser();
                break;
        }

        return false;
    }
}
